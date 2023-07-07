<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Models\Course;
use App\Models\Student;
use App\Models\Borrower;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Mail\Websitemail;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index(){
        $total_students = Student::count();
        $total_courses = Course::count();
        $total_books = Book::count();
        $total_borrower = Borrower::count();
        $total_user = User::count();

        // $data = Borrower::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

       $result = DB::table('borrowers')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as total_borrower'))
      ->groupBy('date')
      ->get();

      $result1 = DB::table('students')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(stgender) as total_student'))
      ->groupBy('date')
      ->get();

      $data = "";
      $stdata = "";
      foreach($result as $val){
        $data.="['".$val->date."','".$val->total_borrower."'],";
      }

      foreach($result1 as $val){
        $stdata.="['".$val->date."','".$val->total_student."'],";
      }

        $borrower_report = $data;
        $student_report = $stdata;


        // dd($borrower_report);
        // dd($student_report);

        return view('backend.dashboard', compact(
            'total_students',
            'total_courses',
            'total_books',
            'borrower_report',
            'student_report',
            'total_borrower',
            'total_user'
        ));
    }

    public function register(){
        $staff_id = IdGenerator::generate(['table' => 'users','field'=>'staff_id', 'length' => 8, 'prefix' =>('U')]);
        return view('backend.register', compact('staff_id'));
    }

    public function register_submit(Request $request){
        $staff_id = IdGenerator::generate(['table' => 'users','field'=>'staff_id', 'length' => 8, 'prefix' =>('U')]);
        $request->validate([
            'username' => 'required',
            'user_contact' => 'required',
            'user_email' => 'required|email',
            'user_address' => 'required',
            'user_password' => 'required',
            'user_role' => 'required'
        ]);

        $user = new User();

        $token = hash('sha256',time());

        $user->staff_id = $staff_id;
        $user->name = $request->username;
        $user->phone = $request->user_contact;
        $user->email = $request->user_email;
        $user->address = $request->user_address;
        $user->password = bcrypt($request->user_password);
        $user->status = 'Pending';
        $user->role = $request->user_role;
        $user->token = $token;
        if($request->hasFile('user_photo')){
            $request->validate([
                'user_photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);
            $ext = $request->file('user_photo')->extension();
            $final_name = date('YmdHis').'.'.$ext;
            $request->file('user_photo')->move(public_path('uploads/users/'),$final_name);
            $user->photo = $final_name;
        }

        $user->save();

        $verification_link = url('registration/verify/'.$token.'/'.$request->user_email);
        $subject = 'Registration confirmation';
        $message = 'Please click on this link: <br><a href="'.$verification_link.'">Confirm Email</a>';

        Mail::to($request->user_email)->send(new Websitemail($subject, $message));
        
        return redirect()->route('register')->with('info','អុីម៉ែលបានផ្ញើរួច! សូមធ្វើការពិនិត្យដើម្បីផ្ទៀងផ្ទាត់!');
    }

    public function registration_verify($token, $email){
        
        $user = User::where('token',$token)->where('email',$email)->first();
        if(!$user){
            return redirect()->route('login');
        }

        $user->status = 'Active';
        $user->token = '';
        $user->update();

        return redirect()->route('login')->with('success','អ្នកបានធ្វើការផ្ទៀងផ្ទាត់ជោគជ័យ!');
    }
    
    public function login(){
        return view('frontend.login');
    }

    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login')->with('error','អ៊ីមែលរបស់អ្នកមិនត្រូវគ្នាទេ។!');
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
