<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBerkasMuridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_murids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('kartu_keluarga')->nullable();
            $table->string('akte_kelahiran')->nullable();
            // $table->string('surat_kelakuan_baik')->nullable();
            // $table->string('surat_sehat')->nullable();
            // $table->string('surat_tidak_buta_warna')->nullable();
            $table->string('rapor')->nullable();
            $table->string('foto')->nullable();
            $table->string('ijazah')->nullable();

            $table->integer('user_created')->nullable();
            $table->timestamps();
            $table->integer('user_updated')->nullable();
            $table->softDeletes();
            $table->integer('user_deleted')->nullable();
            $table->integer('deleted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_murids');
    }
}
