<?php


$factory->define(App\Flyer::class, function ($faker) {
  $strArr = $faker->paragraphs(3);
  foreach ($strArr as $str) {
    $description .= $str;
  }

  return [
      'street'      => $faker->streetAddress,
      'city'        => $faker->city,
      'zip'         => $faker->postcode,
      'country'     => $faker->country,
      'state'       => $faker->state,
      'price'       => $faker->numberBetween(10000, 5000000),
      'description' => $description
  ];
});


