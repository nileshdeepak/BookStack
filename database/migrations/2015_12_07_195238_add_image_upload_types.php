<?php

use BookStack\Image;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageUploadTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('path', 400)->default('');
            $table->string('type')->default('gallery')->index();
        });

        Image::all()->each(function($image) {
            $image->path = $image->url;
            $image->type = 'gallery';
            $image->save();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('path');
        });

    }
}
