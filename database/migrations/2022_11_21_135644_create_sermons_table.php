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
            $table->foreignId('user_id')->constrained();
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('preacher')->nullable();
            $table->string('bible_passage')->nullable();
            $table->string('location')->nullable();
            $table->string('media_link')->nullable();
            $table->enum('published', ['yes', 'no'])->default('no');
            $table->string('upload_image')->nullable();
            $table->text('content')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->date('date_preached')->nullable();
            $table->softDeletes();
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
