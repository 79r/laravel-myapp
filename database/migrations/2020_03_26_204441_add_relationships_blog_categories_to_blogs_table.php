<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsBlogCategoriesToBlogsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('blogs', function (Blueprint $table) {
      $table->foreign('category_id')->references('id')->on('blog_categories')
				->onUpdate('set null')
				->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('blogs', function (Blueprint $table) {
      $table->dropForeign(['category_id']);
    });
  }
}
