<?php

use App\Models\Category;
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
        Category::create(['id' => '1', 'name' => 'Programming',]);
        Category::create(['id' => '2', 'name' => 'Marketing',]);
        Category::create(['id' => '3', 'name' => 'Web Design',]);
        Category::create(['id' => '4', 'name' => 'Accountancy',]);
    }
}
