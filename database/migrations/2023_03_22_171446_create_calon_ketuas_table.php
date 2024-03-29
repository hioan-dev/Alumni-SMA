<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonKetuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_ketuas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('foto_ktp');
            $table->string('pas_foto');
            $table->string('nik');
            $table->string('alamat');
            $table->string('no_ijazah');
            $table->string('ijazah');
            $table->string('pekerjaan');
            $table->longText('visi_misi');
            $table->longText('rencana_program');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('calon_ketuas');
    }
}
