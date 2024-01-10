<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer("jabatan_id")->nullable();
            $table->date("tanggal_lhr")->nullable();
            $table->string("image_profile")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("ttl");
            $table->dropColumn("alamat");
            $table->dropColumn("jabatan_id");
            $table->dropColumn("tanggal_lhr");
            $table->dropColumn("image_profile");
        });
    }
};
