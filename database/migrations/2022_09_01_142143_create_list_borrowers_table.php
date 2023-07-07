<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_borrowers', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('borrower_id');
            $table->string('book_id');
            $table->string('student_id');
            $table->string('staff_id');
            $table->string('student_NOcopies');
            $table->string('releaseDate');
            $table->string('dueDate');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_borrowers');
    }
}
