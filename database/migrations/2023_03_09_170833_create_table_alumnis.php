<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateTableAlumnis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tahun_lulus');
            $table->string('kelas');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('teman_sebangku');
            $table->string('alamat');
            $table->enum('jenkel',['male','female']);
            $table->enum('ukuran_baju',['S','M','L','XL','XXL', 'XXXL']);
            $table->enum('pendidikan_terakhir',['SMA','D1', 'D2','D3', 'D4','S1','S2','S3']);
            $table->string('universitas');
            $table->string('jurusan');
            $table->string('pekerjaan');
            $table->string('no_hp');
            $table->string('email');
            $table->string('foto');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
}
