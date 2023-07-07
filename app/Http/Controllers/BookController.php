<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookAuthor;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BookController extends Controller
{
    public function index(){

        $book_id_generator = IdGenerator::generate(['table' => 'books','field'=>'book_id', 'length' => 6, 'prefix' =>('B')]);
        $book_categories = BookCategory::latest()->get();
        $book_authors = BookAuthor::latest()->get();
        return view('backend.create-book', compact('book_id_generator','book_categories','book_authors'));
    }
    public function store(Request $request){
        $book = new Book();
        $book_id_generator = IdGenerator::generate(['table' => 'books','field'=>'book_id', 'length' => 6, 'prefix' =>('B')]);
        $request->validate([
            'book_title' => 'required',
            'book_edition' => 'required',
            'book_categories' => 'required',
            'book_author' => 'required',
            'book_publisher' => 'required',
            'book_copies' => 'required',
            'book_source' => 'required',
            'book_cover' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        $book->book_id = $book_id_generator;
        $book->book_title = $request->book_title;
        $book->book_category_id = $request->book_categories;
        $book->book_author_id = $request->book_author;
        $book->book_edition = $request->book_edition;
        $book->book_publisher = $request->book_publisher;
        $book->book_copies = $request->book_copies;
        $request->book_source = strtolower($request->book_source);
        $book->book_source = str_replace(" ", "-", $request->book_source);
        if($book->book_copies == 0){
            $book->book_remark = "អស់ស្តុក";
        }else{
            $book->book_remark = "មានស្តុក";
        }
        $ext = $request->file('book_cover')->extension();
        $final_name = date('YmdHis').'.'.$ext;
        $request->file('book_cover')->move(public_path('uploads/book_covers/'),$final_name);
        $book->book_cover = $final_name;
        $book->save();
        return redirect()->route('manage_book')->with('success','អ្នកបានបញ្ចូលជោគជ័យ!');
    }

    public function show(){
        $books = Book::with('rBookAuthor')->with('rBookCategory')->latest()->get();

        return view('backend.manage-book', compact('books'));
    }

    public function edit($id){
        $book_detail = Book::where('id',$id)->get();
        $book_categories = BookCategory::latest()->get();
        $book_authors = BookAuthor::latest()->get();
        return view('backend.edit-book', compact('book_detail','book_categories','book_authors'));
    }

    public function update(Request $request, $id){
        $book = Book::where('id',$id)->first();
        $request->validate([
            'book_title' => 'required',
            'book_edition' => 'required',
            'book_categories' => 'required',
            'book_author' => 'required',
            'book_publisher' => 'required',
            'book_copies' => 'required',
            'book_source' => 'required'
        ]);
        if($request->hasFile('book_cover')){

            $request->validate([
                'book_cover' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);

            if(file_exists(public_path('uploads/book_covers/'.$book->book_cover)) AND !empty($book->book_cover)){
                unlink(public_path('uploads/book_covers/'.$book->book_cover));
            }

            $ext = $request->file('book_cover')->extension();
            $final_name = date('YmdHis').'.'.$ext;
            $request->file('book_cover')->move(public_path('uploads/book_covers/'),$final_name);
            $book->book_cover = $final_name;
        }

        $book->book_id = $book->book_id;
        $book->book_title = $request->book_title;
        $book->book_category_id = $request->book_categories;
        $book->book_author_id = $request->book_author;
        $book->book_edition = $request->book_edition;
        $book->book_publisher = $request->book_publisher;
        $book->book_copies = $request->book_copies;
        $request->book_source = strtolower($request->book_source);
        $book->book_source = str_replace(" ", "-", $request->book_source);

        if($book->book_copies == 0){
            $book->book_remark = "អស់ស្តុក";
        }else{
            $book->book_remark = "មានស្តុក";
        }
        
        $book->update();
        return redirect()->route('manage_book')->with('success','អ្នកបានធ្វើបច្ចប្បន្នភាពជោគជ័យ!');
    }

    public function delete($id){
        $book = Book::where('id',$id)->first();
        
        $book->delete();
        return redirect()->route('manage_book')->with('success','អ្នកបានលុបជោគជ័យ!');
    }

    public function trashed(){
        $trashed_books = Book::with('rBookAuthor')->with('rBookcategory')->onlyTrashed()->latest()->get();
        return view('backend.trashed-books', compact('trashed_books'));
    }

    public function restore($id){
        Book::where('id',$id)->restore();
        return redirect()->route('trashed_books')->with('success','អ្នកបានស្តារជោគជ័យ!');
    }

    public function force_delete($id){
        $book = Book::where('id',$id)->first();
        if(file_exists(public_path('uploads/book_covers/'.$book->book_cover)) AND !empty($book->book_cover)){
            unlink(public_path('uploads/book_covers/'.$book->book_cover));
        }
        $book->forceDelete();

        return redirect()->route('manage_book')->with('success','អ្នកបានលុបជោគជ័យ!');
    }
}
