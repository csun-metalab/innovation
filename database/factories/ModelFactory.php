<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
//We do not actually make new users. this is for testing purposes only.
$factory->define(Helix\Models\Person::class, function (Faker\Generator $faker) {
    return [
        'display_name' => $faker->name,
    ];
});

// $factory->define(Helix\Models\Research::class, function(Faker\Generator $faker){
//   return [
//     'attribute_id' => generateNewResearchId()
//   ];
// });

$factory->define(Helix\Models\FrescoExpertiseEntity::class, function (Faker\Generator $faker){
  // No default values needed.
  return [];
});

$factory->define(Helix\Models\Project::class, function (Faker\Generator $faker){
    $testProjectTitle = 'Test Project: ' . $faker->words(3, true);
    return [
        'project_id'        => generateNewProjectId(),
        'project_title'     => $testProjectTitle,
        'project_begin_date'=> \Carbon\Carbon::today()->format('Y-m-d'),
        'project_end_date'  => \Carbon\Carbon::tomorrow()->format('Y-m-d'),
        'abstract'          => $faker->paragraphs(4, true),
        'is_publishable'    => true,
        'slug'              => slugify($testProjectTitle),
      ];
});

$factory->define(Helix\Models\Purpose::class, function (Faker\Generator $faker){
	return [
	       	'display_name' => $faker->word
	];
});

$factory->define(Helix\Models\Attribute::class, function (Faker\Generator $faker){
    return [
        'is_featured'           => 0,
        'seeking_collaborators' => 0,
        'seeking_students'      => 0,
        'purpose_name'          => Helix\Models\Purpose::defaultPurpose(),
    ];
});
