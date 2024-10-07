<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('provinsi');
            $table->string('kota');
            $table->enum('jenkel', ['male', 'female']);
            $table->enum('ukuran_baju', ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']);
            $table->json('pendidikan')->nullable();
            $table->string('pekerjaan');
            $table->string('perusahaan');
            $table->string('jabatan');
            $table->string('no_hp');
            $table->string('email');
            $table->string('foto');
            $table->boolean('approved')->default(false);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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