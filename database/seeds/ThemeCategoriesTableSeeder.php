<?php

use Illuminate\Database\Seeder;

class ThemeCategoriesTableSeeder extends Seeder {

  private $tableName = 'theme_categories';
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table($this->tableName)->delete();
    $theme_categories = array(
      array('id' => 1, 'name' => 'Uncategory', 'slug' => 'uncategory'),
      array('id' => 2, 'name' => 'Blogger', 'slug' => 'blogger'),
      array('id' => 3, 'name' => 'Workpress', 'slug' => 'wordpress'),
      array('id' => 4, 'name' => 'Ghost', 'slug' => 'ghost')
    );
    DB::table($this->tableName)->insert($theme_categories);
  }
}
