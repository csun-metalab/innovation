<?php

use Illuminate\Database\Seeder;
use Helix\Models\Title;
class SeniorDesignTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['scrum_master'=>'Scrum Master', 'product_leader' => 'Product Leader', 'team_leader' => 'Team Leader', 'faculty_advisor' => 'Faculty Advisor'];
        foreach($titles as $title_name => $display_title){
            Title::create(
                [
                    'title_name' => $title_name,
                    'display_title' => $display_title,
                    'application' => 'SeniorDesign'
                ]
            );
        }

    }
}
