<?php

require __DIR__ . '/vendor/autoload.php';

var_dump($argv);

print $argv[1] ?? 'all';
// $faker =  Faker\Factory::create('zh_TW');
// $faker->addProvider(new Faker\Provider\zh_TW\Company($faker));

// $mobilePhone = $faker->phoneNumber;
// while (substr($mobilePhone, 0, 2) !== '09') {
// 	$mobilePhone = $faker->phoneNumber;
// }
// $mobilePhone = str_replace('-', '', $mobilePhone);

// $phone1 = $faker->phoneNumber;
// while ($phone1[0] !== '(') {
// 	$phone1 = $faker->phoneNumber;
// }

// $phone2 = $faker->phoneNumber;
// while ($phone2[0] !== '(') {
// 	$phone2 = $faker->phoneNumber;
// }

// $phoneFax = $faker->phoneNumber;
// while ($phoneFax[0] !== '(') {
// 	$phoneFax = $faker->phoneNumber;
// }
// echo substr(strtoupper($faker->word), 0, 10), PHP_EOL;
// echo ($company = $faker->company), PHP_EOL;
// echo mb_substr($company, 0, 2, 'UTF-8'), PHP_EOL;
// echo $faker->VAT, PHP_EOL;
// echo $faker->name, PHP_EOL;
// echo $phone1, PHP_EOL;
// echo $phone2, PHP_EOL;
// echo $phoneFax, PHP_EOL;
// echo $mobilePhone, PHP_EOL;
// echo trim(str_replace('-', '', str_replace(' ', '', $faker->address)), '0..9'), PHP_EOL;
// echo trim(str_replace('-', '', str_replace(' ', '', $faker->address)), '0..9'), PHP_EOL;
// echo $faker->date, PHP_EOL;
// echo $faker->text, PHP_EOL;

// // 'CustomerID',
// // 'AttribName',
// // 'CompanyName',
// // 'EarNo',
// // 'JoinMan',
// // 'Tel1',
// // 'Tel2',
// // 'Fax',
// // 'MobilePhone',
// // 'CompanyAddress',
// // 'DeliveryAddress',
// // 'LastDeliveryDate',
// // 'Comment',
