<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->date('target_date')->nullable();
            $table->double('bank_jpy', 15, 2)->nullable();
            $table->double('bank_usd', 15, 2)->nullable();
            $table->double('investigation_jpy', 15, 2)->nullable();
            $table->double('investigation_usd', 15, 2)->nullable();
            $table->double('stock', 15, 2)->nullable();
            $table->string('delete_flg', 1)->nullable()->comment('1:delete');
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
        Schema::dropIfExists('assets');
    }
};
