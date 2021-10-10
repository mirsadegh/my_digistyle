<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->data() as $item){
            Province::create($item);
        }
    }

    private function data()
    {
       return [
            ['name' => 'آذربايجان شرقي'],
            ['name' => 'آذربايجان غربي' ],
            ['name' => 'اردبيل'],
            ['name' => 'اصفهان'],
            ['name' => 'البرز'],
            ['name' => 'ايلام'],
            ['name' => 'بوشهر'],
            ['name' => 'تهران'],
            ['name' => 'چهارمحال و بختياري'],
            ['name' => 'خراسان جنوبي'],
            ['name' => 'خراسان رضوي'],
            ['name' => 'خراسان شمالي'],
            ['name' => 'خوزستان'],
            ['name' => 'زنجان'],
            ['name' => 'سمنان'],
            ['name' => 'سيستان و بلوچستان'],
            ['name' => 'فارس'],
            ['name' => 'قزوين'],
            ['name' => 'قم'],
            ['name' => 'كردستان'],
            ['name' => 'كرمان'],
            ['name' => 'كرمانشاه'],
            ['name' => 'كهگيلويه و بويراحمد'],
            ['name' => 'گلستان'],
            ['name' => 'گيلان'],
            ['name' => 'لرستان'],
            ['name' => 'مازندران'],
            ['name' => 'مركزي'],
            ['name' => 'هرمزگان'],
            ['name' => 'همدان'],
            ['name' => 'يزد'],

       ];
    }
}



