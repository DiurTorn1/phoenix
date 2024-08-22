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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('detail');
            $table->timestamps('datetime_start');
            $table->timestamps('datetime_stop');
            $table->string('type');
            $table->string('country');
            $table->string('valute');
            $table->integer('period_job');
            $table->integer('prob_period');
            $table->integer('prob_price');
            $table->timestamps('datetime_start_sell');
            $table->integer('price');
            $table->integer('old_price');
            $table->timestamps('datetime_start_access');
            $table->timestamps('datetime_stop_access');
            $table->timestamps('datetime_stop_sell');
            $table->string('img_main');
            $table->string('img_banner');
            $table->string('img_video_promo');
            $table->string('video_promo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
