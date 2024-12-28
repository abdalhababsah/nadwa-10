<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'title' => 'Architecture Design',
                'description' => 'Creating innovative and sustainable structures tailored to client needs, seamlessly blending functionality with aesthetic appeal.',
                'image_path' => 'assets/images/service/inner-icon-1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '3D Modelling Design',
                'description' => 'Bringing ideas to life with detailed and realistic 3D models, ensuring precise visualization and effective planning.',
                'image_path' => 'assets/images/service/inner-icon-2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Blueprint Design',
                'description' => 'Providing comprehensive architectural plans that ensure accurate construction and facilitate seamless project execution.',
                'image_path' => 'assets/images/service/inner-icon-3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Industrial Design',
                'description' => 'Developing functional and stylish products that meet market demands and significantly enhance user experiences.',
                'image_path' => 'assets/images/service/inner-icon-4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Interior Design',
                'description' => 'Transforming spaces into harmonious environments with optimized layouts and beautifully styled furnishings.',
                'image_path' => 'assets/images/service/inner-icon-5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Furniture Design',
                'description' => 'Crafting custom furniture pieces that seamlessly combine form and function to enhance any space.',
                'image_path' => 'assets/images/service/inner-icon-6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
