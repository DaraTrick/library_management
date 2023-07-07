<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCategory;

class BookCategoryController extends Controller
{
    public function index(){
        $bookCategories = BookCategory::latest()->get();
        return view('backend.manage-book-category', compact('bookCategories'));
    }

    public function store(Request $request){
        $bcategory = new BookCategory();
        $request->validate([
            'book_category' => 'required'
        ]);
        $bcategory->book_category = $request->book_category;
        $bcategory->save();
        return redirect()->route('manage_book_category')->with('success','អ្នកបានបញ្ជូលជោគជ័យ!');
    }

    public function edit($id){
        $book_category_detail = BookCategory::where('id',$id)->get();
        return view('backend.edit-book-category', compact('book_category_detail'));
    }
    public function update(Request $request, $id){
        $book_category = BookCategory::where('id',$id)->first();
        $request->validate([
            'book_category' => 'required'
        ]);

        $book_category->book_category = $request->book_category;
        $book_category->update();

        return redirect()->route('manage_book_category')->with('success','អ្នកបានធ្វើបច្ចប្បន្នភាពជោគជ័យ!');
    }

    public function delete($id){
        $book_category = BookCategory::where('id',$id)->first();
        $book_category->delete();

        return redirect()->route('manage_book_category')->with('success','អ្នកបានលុបជោគជ័យ!');
    }
}
