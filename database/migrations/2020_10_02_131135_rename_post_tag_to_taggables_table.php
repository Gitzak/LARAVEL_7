<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePostTagToTaggablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag', function (Blueprint $table) {
            // drop Foreign
            $table->dropForeign(['post_id']);
            // drop column
            $table->dropColumn('post_id');
        });
        // rename table
        Schema::rename('post_tag','taggables');

        Schema::table('taggables', function (Blueprint $table) {
            $table->morphs('taggable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropMorphs('taggable');
        });

        Schema::rename('taggables', 'post_tag');

        // disable foreign key
        Schema::disableForeignKeyConstraints();

        Schema::table('post_tag', function (Blueprint $table) {
            $table->foreignId('post_id')
                ->constrained()
                ->onDelete('cascade');
        });

        // enable foreign key
        Schema::enableForeignKeyConstraints();

    }

}
