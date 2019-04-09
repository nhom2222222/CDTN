<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensach');
            $table->string('tensach_slug');
            $table->string('hinhanh');
            $table->string('namxb');
            $table->integer('soluong');
            $table->integer('nxb_id')->unsigned();
            $table->foreign('nxb_id')->references('id')->on('nhaxuatban')->onDelete('CASCADE');
            $table->integer('tacgia_id')->unsigned();
            $table->foreign('tacgia_id')->references('id')->on('tacgia')->onDelete('CASCADE');
            $table->integer('theloai_id')->unsigned();
            $table->foreign('theloai_id')->references('id')->on('theloaisach')->onDelete('CASCADE');

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
        Schema::dropIfExists('sach');
    }
}
