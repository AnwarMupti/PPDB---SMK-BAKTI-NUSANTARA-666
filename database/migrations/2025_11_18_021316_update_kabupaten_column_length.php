<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendaftar_asal_sekolah', function (Blueprint $table) {
            $table->string('kabupaten', 255)->change();
        });
    }

    public function down()
    {
        Schema::table('pendaftar_asal_sekolah', function (Blueprint $table) {
            $table->string('kabupaten', 100)->change();
        });
    }
};