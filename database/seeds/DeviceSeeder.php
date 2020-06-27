<?php

use Illuminate\Database\Seeder;
use App\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listDevices = [
			['device_name' => 'Bedroom lamp',	'device_description' => 'Lamp in Bedroom',	'device_credential' => 'zDwcZPvEdX8iiwNG',	'device_user' => '1',],
			['device_name' => 'Bathroom lamp',	'device_description' => 'Lamp in Bathroom',	'device_credential' => '5KJAYvhHNyYlxAFM',	'device_user' => '1',],
			['device_name' => 'Garden lamp',	'device_description' => 'Lamp in Garden',	'device_credential' => 'WA7Tvily7cMzCD8i',	'device_user' => '1',],

			['device_name' => 'Bedroom temperature',	'device_description' => 'Bedroom temperature and humidity',	'device_credential' => 'ThCoJZOweVdNb8pS',	'device_user' => '2',],

			['device_name' => 'Fish feeder',	'device_description' => 'Feeder for fish',	'device_credential' => '4Dpqv9aCbt8j1qCf',	'device_user' => '3',],
			['device_name' => 'Bird feeder',	'device_description' => 'Feeder for bird',	'device_credential' => 'OhfMYOTAaqhTrBdx',	'device_user' => '3',]
        ];

        foreach ($listDevices as $Device) {
            device::create($Device);
        }
    }
}
