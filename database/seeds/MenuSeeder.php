<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = new Menu(['item_name' => 'Pizza Roll', 'img_path' => 'menu_snack1.png', 'price' => 4.70, 'category_id' => 1]);
        $item->save();
        $item = new Menu(['item_name' => 'Fries', 'img_path' => 'menu_snack2.png', 'price' => 2.80, 'category_id' => 1]);
        $item->save();
        $item = new Menu(['item_name' => 'Bruschetta with Warm Tomatoes', 'img_path' => 'menu_snack3.png', 'price' => 6.30, 'category_id' => 1]);
        $item->save();
        $item = new Menu(['item_name' => 'Beef & Potato Croquettes', 'img_path' => 'menu_snack4.png', 'price' => 5.90, 'category_id' => 1]);
        $item->save();
        $item = new Menu(['item_name' => 'Brazilian Skirt Steak with Golden Garlic Butter', 'img_path' => 'menu_steak1.png', 'price' => 14.80, 'category_id' => 2]);
        $item->save();
        $item = new Menu(['item_name' => 'Cola- Marinated Flank Steak', 'img_path' => 'menu_steak2.png', 'price' => 12.60, 'category_id' => 2]);
        $item->save();
        $item = new Menu(['item_name' => 'Home-Cooked Meal of Steak and Potatoes', 'img_path' => 'menu_steak3.png', 'price' => 13.50, 'category_id' => 2]);
        $item->save();
        $item = new Menu(['item_name' => 'Stewed Steak', 'img_path' => 'menu_steak4.png', 'price' => 9.80, 'category_id' => 2]);
        $item->save();
        $item = new Menu(['item_name' => 'Beef Noodles', 'img_path' => 'menu_noodle1.png', 'price' => 7.80, 'category_id' => 3]);
        $item->save();
        $item = new Menu(['item_name' => 'Cold Noodles', 'img_path' => 'menu_noodle2.png', 'price' => 5.60, 'category_id' => 3]);
        $item->save();
        $item = new Menu(['item_name' => 'Wok Noodles', 'img_path' => 'menu_noodle3.png', 'price' => 6.90, 'category_id' => 3]);
        $item->save();
        $item = new Menu(['item_name' => 'Hot Oil Noddles', 'img_path' => 'menu_noodle4.png', 'price' => 6.40, 'category_id' => 3]);
        $item->save();
        $item = new Menu(['item_name' => 'Fried Dumplings', 'img_path' => 'menu_dumpling1.png', 'price' => 5.40, 'category_id' => 4]);
        $item->save();
        $item = new Menu(['item_name' => 'Dumplings Regular', 'img_path' => 'menu_dumpling2.png', 'price' => 5.20, 'category_id' => 4]);
        $item->save();
        $item = new Menu(['item_name' => 'Soup Dumplings', 'img_path' => 'menu_dumpling3.png', 'price' => 6.30, 'category_id' => 4]);
        $item->save();
        $item = new Menu(['item_name' => 'Dumplings Vegeterian', 'img_path' => 'menu_dumpling4.png', 'price' => 4.80, 'category_id' => 4]);
        $item->save();
    }
}
