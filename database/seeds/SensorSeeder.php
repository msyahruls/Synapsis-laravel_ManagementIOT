<?php

use Illuminate\Database\Seeder;
use App\Sensor;

class SensorSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			$listSensors = [
				['sensor_name' => 'Motion sensor',	'sensor_description' => 'Sensor for motion',	'sensor_unit' => '',	'sensor_credential' => 'Bk0PHjHn0DvGGwfc',	'sensor_device' => '1',],
				['sensor_name' => 'Motion sensor',	'sensor_description' => 'Sensor for motion',	'sensor_unit' => '',	'sensor_credential' => 'Ie4LEP6toBVmo0gm',	'sensor_device' => '2',],

				['sensor_name' => 'Temperature sensor',	'sensor_description' => 'Sensor for temperature',	'sensor_unit' => 'C',	'sensor_credential' => 'fXRA35wdCUGTMQPT',	'sensor_device' => '4',],
				['sensor_name' => 'Humidity sensor',	'sensor_description' => 'Sensor for humidity',	'sensor_unit' => '%',	'sensor_credential' => 'KSw5fCAdsrxaAXfI',	'sensor_device' => '4',]
			];

			foreach ($listSensors as $sensor) {
			    Sensor::create($sensor);
			}
		}
}
