<?php

use Illuminate\Database\Seeder;
use Helix\Models\Event;
use Helix\Models\Terms;
use Carbon\Carbon;

class SeniorDesignTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $terms = Terms::whereDate('end_date', '>=', Carbon::today()->toDateString())->academicYear()->get();
        foreach($terms as $term){
        	        $event = new Event();
			        $event -> application = 'SeniorDesign';
			        $event -> originator = 'system';
			        $event -> event_name = $term->description;
			        $event -> start_date = $term->begin_date;
			        $event -> end_date = $term->end_date;
			        $event -> save();
        }
    }
}
