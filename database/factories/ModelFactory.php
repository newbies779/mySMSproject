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
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->email,
        'password' => bcrypt('12341234'),
        'role' => $faker->randomElement($array = array('Admin','Guest')),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\RentListItem::class, function (Faker\Generator $faker) {

	$userArray = DB::table('users')->lists('id');
	$itemArray = DB::table('items')->lists('id');


	$starts_at = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+1 days', $endDate = '+1 week')->getTimeStamp()) ;

	$ends_at= Carbon::createFromFormat('Y-m-d H:i:s', $starts_at)->addDays( $faker->numberBetween( 1, 8 ) );

	$statusArray = [
		'Pending',
		'Approved'
	];

    $statusReturn = [
        'Not yet',
        'Yes'
    ];

    $theItem = $faker->randomElement($itemArray);
    DB::table('items')->where('id','=',$theItem)->update(array('status' => 'Borrowed'));
    
    return [
        'rent_date' => Carbon::now()->toDateTimeString(),
        'rent_req_date' => Carbon::now()->addDays( $faker->numberBetween( 1, 8 )),
        'rent_approve_date' => Carbon::now()->addDays( $faker->numberBetween( 1, 3 )),


        'return_date' => Carbon::now()->addMonths( $faker->numberBetween( 1, 3 )),
        'return_req_date' => Carbon::now()->addMonths( $faker->numberBetween( 1, 3)),
        'return_approve_date' => Carbon::now()->addMonths( $faker->numberBetween( 1, 3 )),

        'rent_req_note' => $faker->paragraph,
        'return_req_note' => $faker->paragraph,

        'rent_status' => $faker->randomElement($statusArray),
        'return_status' => $faker->randomElement($statusReturn),

        'user_id' => $faker->randomElement($userArray),
        'item_id' => $theItem,
    ];
});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
	$categoryArray = DB::table('categories')->lists('id');
	$itemstatusArray = [
		'Available',
        'Repairing',
		//'Borrowed',
		'Broken',
		'Lost'
        //'Reserved'
	];



    return [
        'name' => $faker->colorName,
        'status' => $faker->randomElement($itemstatusArray),
        'item_id' => $faker->creditCardNumber,
        'custom_id' => $faker->creditCardNumber,
        'category_id' => $faker->randomElement($categoryArray),
        'location' => $faker->city,
        'note' => $faker->paragraph,
        'bought_year' => Carbon::now()->addYears( $faker->numberBetween( -4,-1 )),
        'reviewed_at' => Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+1 days', $endDate = '+1 week')->getTimeStamp()),
        
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'rentable' => $faker->boolean,
    ];
});


$factory->define(App\Logs::class, function (Faker\Generator $faker) {
	$itemArray = DB::table('items')->lists('id');
    $userArray = DB::table('users')->where('role','=','Admin')->lists('id');
	$statusArray = DB::table('items')->lists('status');

    return [
        'item_id' => $faker->randomElement($itemArray),
        'status' => $faker->randomElement($statusArray),
        'user_id' => $faker->randomElement($userArray),
    ];
});

// $factory->define(App\RentListItem::class, function (Faker\Generator $faker) {

    
//     $itemArray = DB::table('items')->lists('item_id');


//     $starts_at = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+1 days', $endDate = '+1 week')->getTimeStamp()) ;

//     $ends_at= Carbon::createFromFormat('Y-m-d H:i:s', $starts_at)->addDays( $faker->numberBetween( 1, 8 ) );

//     $statusArray = [
//         'Pending',
//         'Approved'
//     ];

//     $statusReturn = [
//         'Not yet',
//         'Yes'
//     ];

//     return [
//         'user_id' => 1,
//         'start_date' => $faker->date($max = $starts_at->toDateString()),
//         'end_date' => $faker->date($max = $ends_at->toDateString()),
//         'rent_status' => $faker->randomElement($statusArray),
//         'return_status' => $faker->randomElement($statusReturn),
//         'item_id' => $faker->randomElement($itemArray),
//     ];
// });
