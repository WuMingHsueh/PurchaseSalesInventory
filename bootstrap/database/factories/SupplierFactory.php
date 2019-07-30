<?php

$this->factory->define(
	\PurchaseSalesInventory\Models\DataCollection\Supplier::class,
	function (\Faker\Generator $faker) {
		$mobilePhone = $faker->phoneNumber;
		while (substr($mobilePhone, 0, 2) !== '09') {
			$mobilePhone = $faker->phoneNumber;
		}
		$mobilePhone = str_replace('-', '', $mobilePhone);

		$phone1 = $faker->phoneNumber;
		while ($phone1[0] !== '(') {
			$phone1 = $faker->phoneNumber;
		}

		$phone2 = $faker->phoneNumber;
		while ($phone2[0] !== '(') {
			$phone2 = $faker->phoneNumber;
		}

		$phoneFax = $faker->phoneNumber;
		while ($phoneFax[0] !== '(') {
			$phoneFax = $faker->phoneNumber;
		}
		return [
			'SupplierID'       => substr(strtoupper($faker->word), 0, 8),
			'CompanyName'      => ($company = $faker->company),
			'AttribName'       => mb_substr($company, 0, 2, 'UTF-8'),
			'EarNo'            => $faker->VAT,
			'JoinMan'          => $faker->name,
			'Tel1'             => $phone1,
			'Tel2'             => $phone2,
			'Fax'              => $phoneFax,
			'MobilePhone'      => $mobilePhone,
			'CompanyAddress'   => trim(str_replace('-', '', str_replace(' ', '', $faker->address)), '0..9'),
			'DeliveryAddress'  => trim(str_replace('-', '', str_replace(' ', '', $faker->address)), '0..9'),
			'LastDeliveryDate' => $faker->date,
			'Comment'          => $faker->text,
		];
	}
);
