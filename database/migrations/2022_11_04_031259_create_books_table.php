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
            $table->string('judul', 255);
            // $table->char('ISBN', 13)->unique();
            // $table->string('kategori', 255);
            $table->bigInteger('harga');
            $table->integer('halaman');
            $table->unsignedBigInteger('author_id');
            // $table->string('penerbit', 255);
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            // $table->softDeletes();


            ///https://glints.com/id/opportunities/jobs/it-web-programmer/f1b15daf-7f20-4197-b870-5bc6eed5b566
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
