<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id',6)->uniqid();
            $table->string('stfname');
            $table->string('stlname');
            $table->date('stDOB');
            $table->integer('course_id');
            $table->text('stgender');
            $table->integer('grade_id');
            $table->string('stphone');
            $table->string('stemail')->uniqid();
            $table->string('stpassword')->nullable();
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
        Schema::dropIfExists('students');
    }
}
