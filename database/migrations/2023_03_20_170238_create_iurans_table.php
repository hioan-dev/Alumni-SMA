<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iurans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->date('tanggal_pembayaran');
            $table->string('nominal');
            $table->string('no_rekening');
            $table->string('bukti_pembayaran');
            $table->boolean('approved')->default(false);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('iurans');
    }
}
