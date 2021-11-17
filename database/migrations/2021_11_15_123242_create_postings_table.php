<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->id('id');
            $table->string('judul', 100);
            $table->string('deskripsi', 500);
            $table->string('gambar');
            $table->date('created_at_date')->nullable();
            $table->time('created_at_time')->nullable();
            $table->date('updated_at_date')->nullable();
            $table->time('updated_at_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postings');
    }
}
