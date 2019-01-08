<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

// projectimages用のファクトリー
$factory->define(App\Eloquents\ProjectImage::class, function (Faker $faker) {
    return [
        'project_id' => $faker->numberBetween($min = 1, $max = 10),
        // 'path' => $faker->file($sourceDir = 'c:/dev/tmp', $targetDir = 'c:/dev/tmp2'),
        'path' => $faker->file($sourceDir = '/var/www/tmp', $targetDir = '/var/www/tmp2'),
        'caption' => $faker->text($maxNbChars = 220),
    ];
});

//projects用のファクトリー
$factory->define(App\Eloquents\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'brand_id' => $faker->numberBetween($min = 1, $max = 10),
        'product_id' => $faker->numberBetween($min = 1, $max = 10),
        'caption' => $faker->text($maxNbChars = 200),
    ];
});

// brands用のファクトリー
$factory->define(App\Eloquents\Brand::class, function (Faker $faker) {
    return [
        'account_id' => $faker->company,
        'brand_name' => $faker->name,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->text($maxNbChars = 160),
        'website_url' => $faker->text($maxNbChars = 160),
        'caption' => $faker->text($maxNbChars = 160),
        'logo_path' => $faker->text($maxNbChars = 160),
    ];
});

// brandusers用のファクトリー
$factory->define(App\Eloquents\BrandUser::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'password' => $faker->password,
        'brand_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

// products用のファクトリー
$factory->define(App\Eloquents\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 0, $max = 100000),
        'cost' => $faker->numberBetween($min = 0, $max = 100000),
        'size' => $faker->text($maxNbChars = 20),
        'caption' => $faker->text($maxNbChars = 100),
    ];
});

// product_images用のファクトリー
$factory->define(App\Eloquents\ProductImage::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween($min = 1, $max = 10),
        // 'path' => $faker->file($sourceDir = 'c:/dev/tmp', $targetDir = 'c:/dev/tmp3'),
        'path' => $faker->file($sourceDir = '/var/www/tmp', $targetDir = '/var/www/tmp3'),
    ];
});

// temp_images用のファクトリー
$factory->define(App\Eloquents\TempImage::class, function (Faker $faker) {
    return [
        // 'path' => $faker->file($sourceDir = 'c:/dev/tmp', $targetDir = 'c:/dev/temp4'),
        'path' => $faker->file($sourceDir = '/var/www/tmp', $targetDir = '/var/www/temp4'),
    ];
});
