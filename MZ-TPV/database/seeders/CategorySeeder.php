<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $foods = Category::create([
            'name'       => 'Foods',
            'image_url'  => 'https://res.cloudinary.com/dandumvvy/image/upload/v1750329200/foodsG_ykobnq.png',
            'parent_id'  => null,
        ]);

        Category::create([
            'name'       => 'Meats',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026721/image_for_meats_u9azrv.png',
            'parent_id'  => $foods->id,
        ]);

        Category::create([
            'name'       => 'Fish',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026709/image_for_fish_s9hec0.png',
            'parent_id'  => $foods->id,
        ]);

        Category::create([
            'name'       => 'Pasta',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026709/image_for_pasta_j9fsd3.png',
            'parent_id'  => $foods->id,
        ]);

        Category::create([
            'name'       => 'Desserts',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026708/image_for_desserts_zta6sz.png',
            'parent_id'  => $foods->id,
        ]);

        Category::create([
            'name'       => 'Vegetables',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026708/image_for_vegetables_qysjuq.png',
            'parent_id'  => $foods->id,
        ]);

        $drinks = Category::create([
            'name'       => 'Drinks',
            'image_url'  => 'https://res.cloudinary.com/dandumvvy/image/upload/v1750329199/drinksG_xdms0r.png',
            'parent_id'  => null,
        ]);

        Category::create([
            'name'       => 'Cocktails',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026140/image_for_cocktails_ztdlkh.png',
            'parent_id'  => $drinks->id,
        ]);

        Category::create([
            'name'       => 'Soft Drinks',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026140/image_for_soft_drinks_wtzoqd.png',
            'parent_id'  => $drinks->id,
        ]);

        Category::create([
            'name'       => 'Liquors',
            'image_url'  => 'https://res.cloudinary.com/duhatfjms/image/upload/v1748026141/image_for_liquors_dbllfi.png',
            'parent_id'  => $drinks->id,
        ]);
    }
}