<?php
$factory->define(App\User::class, function ($faker) {

  return [
      'name'      => $faker->name,
      'email'         => $faker->email,
      'password'     => bcrypt(str_random(10)),
      'remember_token'       => str_random(10)
  ];
});

$factory->define(App\Flyer::class, function ($faker) {
  $description = '';
  $strArr = $faker->paragraphs(3);
  foreach ($strArr as $str) {
    $description .= $str;
  }

  return [
      'street'      => $faker->streetAddress,
      'user_id'     => factory('App\User')->create()->id,
      'city'        => $faker->city,
      'zip'         => $faker->postcode,
      'country'     => $faker->country,
      'state'       => $faker->state,
      'price'       => $faker->numberBetween(10000, 5000000),
      'description' => $description
  ];
});


