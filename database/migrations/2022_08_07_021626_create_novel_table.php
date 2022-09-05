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
        Schema::create('novel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alternative');
            $table->string('slug');
            $table->string('genre');
            $table->longText('description');
            $table->string('country');
            $table->string('published');
            $table->string('author');
            $table->string('total_chap');
            $table->tinyInteger('condition')->default('0');
            $table->tinyInteger('status')->default('0');
            $table->string('type');
            $table->string('image');
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
        Schema::table('novel', function(Blueprint $table)
		{
            $table->dropSoftDeletes();
		});
        
        Schema::dropIfExists('novel');

    }
};
