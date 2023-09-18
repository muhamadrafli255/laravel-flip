<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'  =>  'Keyboard Keychron Q1',
            'price' =>  1500000,
            'image' =>  'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-Q1-QMK-VIA-custom-mechanical-keyboard-75-percent-layout-full-aluminum-black-frame-for-Mac-Windows-iOS-RGB-backlight-with-hot-swappable-Gateron-G-Pro-switch-blue_360x.jpg?v=1671529108',
        ]);
        Product::create([
            'name'  =>  'Keycaps OEM Dye',
            'price' =>  200000,
            'image' =>  'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/OEM-Dye-Sub-PBT-Keycap-Set-Iceberg-Version-B_124cd6a5-7125-441e-b157-91306770d4c1_360x.jpg?v=1667385279',
        ]);
        Product::create([
            'name'  =>  'Gateron CJ Switch',
            'price' =>  650000,
            'image' =>  'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Gateron-CJ-Switch-Dark-Blue_360x.jpg?v=1658997372',
        ]);
    }
}
