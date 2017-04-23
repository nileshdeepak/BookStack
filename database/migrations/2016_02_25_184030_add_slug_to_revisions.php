<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToRevisions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_revisions', function (Blueprint $table) {
            $table->string('slug')->default('');
            $table->index('slug');
            $table->string('book_slug')->default('');
            $table->index('book_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_revisions', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('book_slug');
        });
    }
}
