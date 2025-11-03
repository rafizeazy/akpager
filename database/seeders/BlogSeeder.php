<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user first
        $user = User::create([
            'name' => 'Admin',
            'email' => 'chivalrain1@gmail.com',
            'password' => bcrypt('smartplus2025'),
            'email_verified_at' => now(),
        ]);

        // Categories
        $cat1 = Category::create([
            'name' => 'IoT Solutions',
            'slug' => 'iot-solutions',
            'description' => 'Internet of Things solutions and services',
            'color' => '#3B82F6',
        ]);

        $cat2 = Category::create([
            'name' => 'Smart Manufacturing',
            'slug' => 'smart-manufacturing',
            'description' => 'Smart factory and industry 4.0',
            'color' => '#10B981',
        ]);

        $cat3 = Category::create([
            'name' => 'IT Services',
            'slug' => 'it-services',
            'description' => 'IT consulting and support',
            'color' => '#F59E0B',
        ]);

        // Tags
        $tag1 = Tag::create(['name' => 'IoT', 'slug' => 'iot']);
        $tag2 = Tag::create(['name' => 'Smart City', 'slug' => 'smart-city']);
        $tag3 = Tag::create(['name' => 'Industry 4.0', 'slug' => 'industry-40']);
        $tag4 = Tag::create(['name' => 'Technology', 'slug' => 'technology']);

        // Posts
        $post1 = Post::create([
            'user_id' => $user->id,
            'title' => 'Transformasi Digital dengan IoT di Indonesia',
            'slug' => 'transformasi-digital-iot-indonesia',
            'category_id' => $cat1->id,
            'excerpt' => 'Bagaimana teknologi IoT mengubah landscape bisnis di Indonesia',
            'content' => '<p>Internet of Things (IoT) telah menjadi kunci transformasi digital di berbagai sektor industri Indonesia. Dari manufaktur hingga smart city, IoT memberikan solusi yang efisien dan terukur.</p><h2>Keuntungan IoT untuk Bisnis</h2><p>Implementasi IoT memberikan berbagai manfaat seperti monitoring real-time, efisiensi operasional, dan pengambilan keputusan berbasis data.</p>',
            'featured_image' => 'assets/images/blog/blog-2.jpg',
            'published_at' => now(),
            'is_published' => true,
        ]);
        $post1->tags()->attach([$tag1->id, $tag4->id]);

        $post2 = Post::create([
            'user_id' => $user->id,
            'title' => 'Smart Manufacturing: Masa Depan Industri Indonesia',
            'slug' => 'smart-manufacturing-masa-depan-industri',
            'category_id' => $cat2->id,
            'excerpt' => 'Mengenal konsep smart factory dan implementasinya di Indonesia',
            'content' => '<p>Smart Manufacturing merupakan integrasi teknologi digital dalam proses produksi untuk meningkatkan efisiensi dan produktivitas.</p><h2>Komponen Utama Smart Factory</h2><ul><li>Sensor dan IoT devices</li><li>Big Data Analytics</li><li>Artificial Intelligence</li><li>Cloud Computing</li></ul><p>Dengan teknologi ini, pabrik dapat beroperasi lebih efisien dan responsif terhadap perubahan pasar.</p>',
            'featured_image' => 'assets/images/services/smt-3.jpg',
            'published_at' => now(),
            'is_published' => true,
        ]);
        $post2->tags()->attach([$tag3->id, $tag4->id]);

        $post3 = Post::create([
            'user_id' => $user->id,
            'title' => 'Implementasi Smart City di Jakarta',
            'slug' => 'implementasi-smart-city-jakarta',
            'category_id' => $cat1->id,
            'excerpt' => 'Bagaimana Jakarta menggunakan teknologi IoT untuk menjadi kota pintar',
            'content' => '<p>Jakarta sedang bertransformasi menjadi smart city dengan memanfaatkan teknologi IoT untuk berbagai aspek kehidupan kota.</p><h2>Aplikasi Smart City</h2><p>Beberapa implementasi meliputi:</p><ul><li>Smart transportation dan traffic management</li><li>Smart parking system</li><li>Smart lighting</li><li>Environmental monitoring</li></ul><p>Teknologi ini membantu meningkatkan kualitas hidup warga dan efisiensi pengelolaan kota.</p>',
            'featured_image' => 'assets/images/services/iot-1.jpg',
            'published_at' => now(),
            'is_published' => true,
        ]);
        $post3->tags()->attach([$tag1->id, $tag2->id, $tag4->id]);
    }
}
