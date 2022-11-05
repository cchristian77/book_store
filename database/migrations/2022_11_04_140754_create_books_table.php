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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedDouble('price', 21, 5)->default(0);
            $table->date('release_date')->nullable();
            $table->boolean('is_published')->default(0);
            $table->integer('page');
            $table->longText('synopsis')->nullable();
            $table->text('cover_url')->nullable();
            $table->foreignId('publisher_id')->constrained('publishers');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
