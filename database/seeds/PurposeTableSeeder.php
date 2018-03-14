<?php

use Illuminate\Database\Seeder;
use Helix\Models\Purpose;
use Helix\Models\Attribute;

class PurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purpose::create([
            'system_name' =>"creative",
            'display_name' =>"Creative Work",
        ]);
        Purpose::create([
            'system_name' =>"project",
            'display_name' =>"Project",
        ]);
        Purpose::create([
            'system_name' =>"research",
            'display_name' =>"Research",
        ]);
        Purpose::create([
            'system_name' =>"service",
            'display_name' =>"Service",
        ]);

        /**
         * This seeds all project attributes that have null purposes with the default purpose.
         */
        Attribute::where('purpose_name', null)->update([
            'purpose_name'    =>  Purpose::defaultPurpose()
        ]);
    }
}
