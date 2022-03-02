<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Men',
            'Women'
        ];

        foreach ($categories as $category){
            if (!Category::where('name',$category)->exists()) {
                Category::create([
                    'is_active' => 1,
                    'name' => $category
                ]);
            }
        }
    }
}
