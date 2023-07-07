<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAuthor;

class BookAuthorController extends Controller
{
    public function index(){
        $book_authors = BookAuthor::latest()->get();
        return view('backend.manage-book-author', compact('book_authors'));
    }

    public function store(Request $request){
        $book_author = new BookAuthor();

        $request->validate([
            'book_author' => 'required'
        ]);

        $book_author->book_author = $request->book_author;
        $book_author->save();

        return redirect()->route('manage_book_author')->with('success','អ្នកបានបញ្ចូលជោគជ័យ!');
    }

    public function edit($id){
        $book_author_detail = BookAuthor::where('id',$id)->get();
        return view('backend.edit-book-author', compact('book_author_detail'));
    }

    public function update(Request $request, $id){
        $book_author = BookAuthor::where('id',$id)->first();

        $request->validate([
            'book_author' => 'required'
        ]);

        $book_author->book_author = $request->book_author;

        $book_author->update();

        return redirect()->route('manage_book_author')->with('success','អ្នកបានធ្វើបច្ចប្បន្នភាពជោគជ័យ!');
    }

    public function delete($id){
        $book_author = BookAuthor::where('id',$id)->first();
        $book_author->delete();
        return redirect()->route('manage_book_author')->with('success','អ្នកបានលុបជោគជ័យ!');
    }
}