<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

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
            'name' => 'Stylish Chair',
            'price' => 120.00,
            'description' => 'A very comfortable and stylish chair for your living room.',
            'image_path' => 'storage/products/chair1.png',
            'images' => [
                'storage/products/chair1.png',
                'storage/products/chair2.png',
                'storage/products/chair3.png',
            ],
        ]);

        Product::create([
            'name' => 'Modern Sofa',
            'price' => 499.99,
            'description' => 'A modern sofa that fits perfectly in any contemporary home.',
            'image_path' => 'storage/products/sofa1.png',
            'images' => [
                'storage/products/sofa1.png',
                'storage/products/sofa2.png',
                'storage/products/sofa3.png',
            ],
        ]);

        Product::create([
            'name' => 'Elegant Table',
            'price' => 250.50,
            'description' => 'An elegant dining table made from high-quality wood.',
            'image_path' => 'storage/products/table1.png',
            'images' => [
                'storage/products/table1.png',
                'storage/products/table2.png',
            ],
        ]);
    }
}
