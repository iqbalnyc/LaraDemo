<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Product::truncate();
        Contact::truncate();
        Review::truncate();
        
        User::factory()->create([
            'name' => 'habiba',
            'user_type' => 'Support'
        ]);

        $category = Category::factory()->create([
            'categoryName' => 'Wiring and Cable'
        ]);

        Product::factory(8)->create([
            'productCatId' => $category->id
        ]);
        
        
        // OrderMaster::create(['odrerDate' => now(), 'orderId' => '101', 'userName' => 'saad']);
        // OrderMaster::create(['odrerDate' => now(), 'orderId' => '102', 'userName' => 'hassan']);

        // OrderDetail::create(['odrerDate' => now(), 'orderId' => '101', 'userName' => 'saad', 'pId' => '1',
        // 'pName' => 'product name 1', 'pCatId' => '1', 'pPrice' => '99', 'pQty' => '2']);

        // OrderDetail::create(['odrerDate' => now(), 'orderId' => '101', 'userName' => 'haniya', 'pId' => '2',
        // 'pName' => 'product name 2', 'pCatId' => '1', 'pPrice' => '99', 'pQty' => '2']);
    }
}
