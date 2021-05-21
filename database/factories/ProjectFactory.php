<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'created_by' => 1,
        'name' => $faker->name,
        'date_start' => $faker->dateTime($max = 'now', $timezone=null),
        'estimated_cost' => $faker->text($maxNbChars = 25),
        'final_price' => $faker->text($maxNbChars = 25),
        'assigned' => 1,
    ];
});
