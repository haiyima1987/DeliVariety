<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Category(['category_name' => 'Snacks']);
        $category->save();
        $category = new Category(['category_name' => 'Steaks']);
        $category->save();
        $category = new Category(['category_name' => 'Noodles']);
        $category->save();
        $category = new Category(['category_name' => 'Dumplings']);
        $category->save();
    }
}
