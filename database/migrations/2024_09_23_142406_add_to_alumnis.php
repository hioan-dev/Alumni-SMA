<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToAlumnis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnis', function (Blueprint $table) {
            if (Schema::hasColumn('alumnis', 'foto')) {
                $table->dropColumn('foto');
            }

        });
        Schema::table('alumnis', function (Blueprint $table) {
            $table->string('foto')->nullable();
        });
        Schema::table('alumnis', function (Blueprint $table) {
            if (Schema::hasColumn('alumnis', 'teman_sebangku')) {
                $table->dropColumn('teman_sebangku');
            }

        });
        Schema::table('alumnis', function (Blueprint $table) {
            $table->string('teman_sebangku')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnis', function (Blueprint $table) {
            if (Schema::hasColumn('alumnis', 'foto')) {
                $table->dropColumn('foto');
            }

        });
        Schema::table('alumnis', function (Blueprint $table) {
            $table->string('foto')->nullable();
        });
        Schema::table('alumnis', function (Blueprint $table) {
            if (Schema::hasColumn('alumnis', 'teman_sebangku')) {
                $table->dropColumn('teman_sebangku');
            }

        });
        Schema::table('alumnis', function (Blueprint $table) {
            $table->string('teman_sebangku')->nullable();
        });
    }
}
