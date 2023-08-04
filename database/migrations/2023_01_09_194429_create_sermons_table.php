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
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('speaker_id')->nullable();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->string('service')->nullable();
            $table->text('manuscript')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('mp3')->nullable();
            $table->string('slides')->nullable();
            $table->string('handout')->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->date('date')->default('2019-10-02 00:00:00');
            $table->string('video_url')->nullable();
            $table->unsignedBigInteger('views')->default(0);
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
        Schema::dropIfExists('sermons');
    }
};
