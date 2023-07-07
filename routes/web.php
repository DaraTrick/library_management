<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookAuthorController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowerController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', [WebsiteController::class,'index'])->name('dashboard');

// Course Routes
Route::get('/courses',[CourseController::class,'index'])->name('courses');
Route::post('/course/store',[CourseController::class,'store'])->name('store_course');
Route::get('/course/edit/{id}',[CourseController::class,'edit'])->name('edit_course');
Route::post('/course/update/{id}',[CourseController::class,'update'])->name('update_course');
Route::get('/course/deelete/{id}',[CourseController::class,'delete'])->name('delete_course');

// Student
Route::get('all-students',[StudentController::class,'display'])->name('all_students');
Route::get('student/add-new-student-form',[StudentController::class,'index'])->name('add-new-student');
Route::post('student/store',[StudentController::class,'store'])->name('store_student');
Route::get('student/trash/{id}',[StudentController::class,'delete'])->name('delete_student');
Route::get('student/edit/{id}',[StudentController::class,'edit'])->name('edit_student');
Route::post('student/update/{id}',[StudentController::class,'update'])->name('update_student');
Route::get('students/view/trash',[StudentController::class,'trashed'])->name('trashed_students');
Route::get('student/restore/{id}',[StudentController::class,'restore'])->name('restore_student');
Route::get('student/delete/{id}',[StudentController::class,'force_delete'])->name('force_delete_student');

// Book
Route::get('manage-book',[BookController::class,'show'])->name('manage_book');
Route::get('create-book',[BookController::class,'index'])->name('create_book');
Route::post('book/store',[BookController::class,'store'])->name('store_book');
Route::get('book/edit/{id}',[BookController::class,'edit'])->name('edit_book');
Route::post('book/update/{id}',[BookController::class,'update'])->name('update_book');
Route::get('book/delete/{id}',[BookController::class,'delete'])->name('delete_book');
Route::get('book/trashed/',[BookController::class,'trashed'])->name('trashed_books');
Route::get('book/restore/{id}',[BookController::class,'restore'])->name('restore_book');
Route::get('book/force-delete/{id}',[BookController::class,'force_delete'])->name('force_delete_book');

// book category
Route::get('manage-book-category',[BookCategoryController::class,'index'])->name('manage_book_category');
Route::post('book-category/store',[BookCategoryController::class,'store'])->name('store_book_category');
Route::get('book-category/edit/{id}',[BookCategoryController::class,'edit'])->name('edit_book_category');
Route::post('book-category/update/{id}',[BookCategoryController::class,'update'])->name('update_book_category');
Route::get('book-category/delete/{id}',[BookCategoryController::class,'delete'])->name('delete_book_category');

// grade
Route::get('manage-grade',[GradeController::class,'index'])->name('manage_grade');
Route::post('grade/store',[GradeController::class,'store'])->name('store_grade');
Route::get('grade/edit/{id}',[GradeController::class,'edit'])->name('edit_grade');
Route::post('grade/update/{id}',[GradeController::class,'update'])->name('update_grade');
Route::get('grade/delete/{id}',[GradeController::class,'delete'])->name('delete_grade');

// book author
Route::get('manage-book-author',[BookAuthorController::class,'index'])->name('manage_book_author');
Route::post('book-author/store',[BookAuthorController::class,'store'])->name('store_book_author');
Route::get('book-author/edit/{id}',[BookAuthorController::class,'edit'])->name('edit_book_author');
Route::post('book-author/update/{id}',[BookAuthorController::class,'update'])->name('update_book_author');
Route::get('book-author/delete/{id}',[BookAuthorController::class,'delete'])->name('delete_book_author');

Route::get('register',[WebsiteController::class,'register'])->name('register');
Route::post('register/submit/',[WebsiteController::class,'register_submit'])->name('register_submit');

Route::get('/',[WebsiteController::class,'login'])->name('login');
Route::get('logout',[WebsiteController::class,'logout'])->name('logout')->middleware('auth');
Route::post('login_submit',[UserController::class,'login_submit'])->name('login_submit');
Route::get('forget_password',[WebsiteController::class,'forget_password'])->name('forget_password');
Route::post('forget_password_submit',[WebsiteController::class,'forget_password_submit'])->name('forget_password_submit');
Route::post('reset_password_submit',[WebsiteController::class,'reset_password_submit'])->name('reset_password_submit');
// Route::get('register',[WebsiteController::class,'register'])->name('register')->middleware('admin');
// Route::post('register_submit',[WebsiteController::class,'register_submit'])->name('register_submit');
Route::get('registration/verify/{token}/{email}',[WebsiteController::class,'registration_verify']);
Route::get('reset-password/{token}/{email}',[WebsiteController::class,'reset_password'])->name('reset_password');

// user or staff
Route::get('manage-staff',[UserController::class,'index'])->name('manage_staff');

//Borrower
Route::get('create-borrower',[BorrowerController::class, 'index'])->name('create_borrower');
Route::post('store-borrower',[BorrowerController::class,'store'])->name('store_borrower');
Route::get('edit-borrower/{id}',[BorrowerController::class,'edit'])->name('edit_borrower');
Route::get('borrower/approve/{id}/', [BorrowerController::class,'approve'])->name('approve_borrower');
Route::get('borrower/list/', [BorrowerController::class,'list'])->name('list_borrower');

Route::get('/home', function(){
    return view('frontend.home');
})->name('home');