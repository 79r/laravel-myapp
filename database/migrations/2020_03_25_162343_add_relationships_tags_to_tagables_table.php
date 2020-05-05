<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsTagsToTagablesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('tagables', function (Blueprint $table) {
      $table->foreign('tag_id')->references('id')->on('tags')
        ->onUpdate('cascade')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('tagables', function (Blueprint $table) {
      $table->dropForeign(['tag_id']);
    });
  }
}
