<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Example;

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonContent = file_get_contents(database_path('output.json'));
        $multipolygons = json_decode($jsonContent, true);

        foreach($multipolygons as $multipolygon){
            Example::create([
                "name_borough" => $multipolygon['name_borough'],
                "code_borough" =>  $multipolygon['code_borough'],
                "name_district" => $multipolygon['name_district'],
                "code_district" => $multipolygon['code_district'],
                "action_index" => $multipolygon['action_index'],
                "vegetation_index" => $multipolygon['vegetation_index'],
                "vulnerability_index" => $multipolygon['vulnerability_index'],
                "coords" => json_encode($multipolygon['coords']),
            ]);
        }
    }
}
