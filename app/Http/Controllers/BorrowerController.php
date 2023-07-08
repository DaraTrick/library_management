<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrower;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Book;
use App\Models\ListBorrower;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use KhmerDateTime\KhmerDateTime;
use App\Models\BorrowerBook;


class BorrowerController extends Controller
{
    public function index(){
        $releaseDate = null; // Initialize the $releaseDate variable
        $dueDate = null; // Initialize the $dueDate variable
        $borrower_id = IdGenerator::generate(['table' => 'borrowers','field'=>'borrower_id', 'length' => 6, 'prefix' =>('BR')]);
        $books = Book::latest()->get();
        $students = Student::orderBy('id', 'desc')->get();

        // $borrowers = Borrower::with('rBook')->with('rStudent')->with('rUser')->latest()->get();

        $borrowers = DB::table('borrowers')
        ->join('books', 'books.book_id', '=', 'borrowers.book_id')
        ->join('Students', 'students.student_id', '=', 'borrowers.student_id')
        ->join('Users', 'users.staff_id', '=', 'borrowers.staff_id')
        ->get();

        if($borrowers){
            foreach($borrowers as $borrower){
                $releaseDate = KhmerDateTime::parse($borrower->releaseDate)->format("LLLLT");
                $dueDate = KhmerDateTime::parse($borrower->dueDate)->format("LLLLT");
            }
        }
        return view('backend.create-borrower', compact(
            'borrower_id',
            'books',
            'students',
            'borrowers',
            'releaseDate',
            'dueDate'
        ));
    }

    public function store(Request $request){

        $borrower_id = IdGenerator::generate(['table' => 'borrowers','field'=>'borrower_id', 'length' => 6, 'prefix' =>('BR')]);

        $request->validate([
            'student_id' => 'required',
            'book_title' => 'required',
            'student_NOcopies' => 'required',
            'releaseDate' => 'required',
            'dueDate' => 'required'
        ]);

         // $borrowers = Borrower::with('rBook')->with('rStudent')->with('rUser')->latest()->get();
         $borrowers = DB::table('borrowers')
         ->join('books', 'books.book_id', '=', 'borrowers.book_id')
         ->join('Students', 'students.student_id', '=', 'borrowers.student_id')
         ->join('Users', 'users.staff_id', '=', 'borrowers.staff_id')
         ->get();

        $borrower = new Borrower();

        $borrower->borrower_id = $borrower_id;
        $borrower->student_id = $request->student_id;

        $borrower->staff_id = Auth::guard('web')->user()->staff_id;
        $borrower->student_NOcopies = $request->student_NOcopies;
        $borrower->releaseDate = $request->releaseDate;
        $borrower->dueDate = $request->dueDate;
        $borrower->book_id = $request->book_title;
        $borrower->save();

        // foreach($request->book_title as $item){
        //     $borrower_book = new BorrowerBook();

        //     $borrower_book->borrower_book_id = $borrower->id;
        //     $borrower_book->book_name = $item;
        //     $borrower_book->save();
        // }

        return redirect()->route('create_borrower')->with('success','បានបញ្ចូលដោយជោគជ័យ!');

    }

    public function approve($id){

        $borrowers = Borrower::where('id', $id)->with('rBook')->with('rStudent')->with('rUser')->first();

        // $borrowers = DB::table('borrowers')
        // ->join('books', 'books.book_id', '=', 'borrowers.book_id')
        // ->join('students', 'students.student_id', '=', 'borrowers.student_id')
        // ->join('users', 'users.staff_id', '=', 'borrowers.staff_id')
        // ->where('borrowers.id','=', $id)
        // ->get();


        $new_post = $borrowers->replicate();
        $new_post->setTable('list_borrowers');
        $new_post->save();

        $borrowers->forceDelete();

        return redirect()->route('create_borrower')->with('success', 'Approved successfully.');
    }

    public function list(){
        $list_borrower = DB::table('list_borrowers')
        ->join('books', 'books.book_id', '=', 'list_borrowers.book_id')
        ->join('Students', 'students.student_id', '=', 'list_borrowers.student_id')
        ->join('Users', 'users.staff_id', '=', 'list_borrowers.staff_id')
        ->get();

        return view('backend.list-borrower', compact('list_borrower'));
    }
}
