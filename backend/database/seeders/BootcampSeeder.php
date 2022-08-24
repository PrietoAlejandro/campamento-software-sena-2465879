<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\Bootcamp;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1.Conectarnos al archivo json
        $json = File::get("database/_data/bootcamps.json");
        $array_bootcamps=json_decode($json);
        //2.recorrer el archivo
        foreach( $array_bootcamps as $b)
        {
            //3. por cada instancia, crear un bootcamp
            $bootcamp = new Bootcamp();
            $bootcamp->name = $b->name;
            $bootcamp->description = $b->description;
            $bootcamp->website = $b->website;
            $bootcamp->phone = $b->phone;
            $bootcamp->user_id = $b->user_id;
            $bootcamp->average_rating = $b->average_rating;
            $bootcamp->average_cost = $b->average_cost;
            $bootcamp->save();
        }

    }
}
