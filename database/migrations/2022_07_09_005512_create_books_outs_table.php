<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_outs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id');
            $table->bigInteger('user_id');
            $table->date('date_out');
            $table->date('date_in')->nullable();
            $table->date('date_in_actual');
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
        Schema::dropIfExists('books_outs');
    }
}
