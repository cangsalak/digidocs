<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Core\Entity::class, function (Faker $faker) {
        return [
        'nit'=>rand(1111111,9999999).' - '. rand(1,9),
		'name'=>$faker->name,
		'department'=>'ANTIOQUIA',
		'city'=>$faker->randomElement(['MEDELLÍN','PUEBLORRICO','TARSO','ITAGUI']),
		'adress'=>$faker->randomElement(['Carrera','Calle']).' '. rand(1,40).' #'.rand(1,40).' -'.rand(1,250),
		'phone1' => rand(11,99).' '.rand(111,999),
		'phone2' => rand(11,99).' '.rand(111,999),
		'phone3' => rand(11,99).' '.rand(111,999),
		'email_institutional' => $faker->unique()->safeEmail,
		'description' => $faker->text(255),
		'slogan' => $faker->text(64),
		'scutcheon1' => $faker->sentence(8).'.png',
		'scutcheon2' => $faker->sentence(8).'.png',
		'label'=>'{'.str_random(10).'}'			
    ];
});
