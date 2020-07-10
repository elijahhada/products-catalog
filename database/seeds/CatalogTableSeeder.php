<?php

use App\Catalog;
use Illuminate\Database\Seeder;

class CatalogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalog::truncate();
        Catalog::create(['title' => 'Milk Products']);
        Catalog::create(['title' => 'Milk', 'parent_id' => Catalog::where(['title' => 'Milk Products'])->first()->id]);
        Catalog::create(['title' => 'Ice Cream', 'parent_id' => Catalog::where(['title' => 'Milk Products'])->first()->id]);
        Catalog::create(['title' => 'Bakery Products']);
        Catalog::create(['title' => 'Cake', 'parent_id' => Catalog::where(['title' => 'Bakery Products'])->first()->id]);
        Catalog::create(['title' => 'Cookie', 'parent_id' => Catalog::where(['title' => 'Bakery Products'])->first()->id]);
        Catalog::create(['title' => 'Gadgets']);
        Catalog::create(['title' => 'Smartphone', 'parent_id' => Catalog::where(['title' => 'Gadgets'])->first()->id]);
        Catalog::create(['title' => 'Notebook', 'parent_id' => Catalog::where(['title' => 'Gadgets'])->first()->id]);
        
    }
}
