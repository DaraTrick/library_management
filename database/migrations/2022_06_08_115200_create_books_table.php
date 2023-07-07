<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_id', 6);
            $table->string('book_title');
            $table->string('book_category_id');
            $table->string('book_edition');
            $table->string('book_author_id');
            $table->string('book_publisher');
            $table->integer('book_copies');
            $table->string('book_source');
            $table->string('book_remark');
            $table->text('book_cover');
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
        Schema::dropIfExists('books');
    }
}
