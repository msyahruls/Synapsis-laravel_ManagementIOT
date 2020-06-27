<?php

use Illuminate\Database\Seeder;
use App\DeviceLog;

class DeviceLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listLogs = [
			['dl_user' => 'admin@ad.min',	'dl_device' => 'zDwcZPvEdX8iiwNG',	'dl_sensor' => 'Bk0PHjHn0DvGGwfc',	'dl_value' => '0',],
			['dl_user' => 'admin@ad.min',	'dl_device' => 'zDwcZPvEdX8iiwNG',	'dl_sensor' => 'Bk0PHjHn0DvGGwfc',	'dl_value' => '0',],
			['dl_user' => 'admin@ad.min',	'dl_device' => 'zDwcZPvEdX8iiwNG',	'dl_sensor' => 'Bk0PHjHn0DvGGwfc',	'dl_value' => '0',],
			['dl_user' => 'admin@ad.min',	'dl_device' => 'zDwcZPvEdX8iiwNG',	'dl_sensor' => 'Bk0PHjHn0DvGGwfc',	'dl_value' => '1',],
			['dl_user' => 'admin@ad.min',	'dl_device' => 'zDwcZPvEdX8iiwNG',	'dl_sensor' => 'Bk0PHjHn0DvGGwfc',	'dl_value' => '1',],
			['dl_user' => 'admin@ad.min',	'dl_device' => 'zDwcZPvEdX8iiwNG',	'dl_sensor' => 'Bk0PHjHn0DvGGwfc',	'dl_value' => '1',],
			['dl_user' => 'admin@ad.min',	'dl_device' => 'zDwcZPvEdX8iiwNG',	'dl_sensor' => 'Bk0PHjHn0DvGGwfc',	'dl_value' => '0',],


			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'fXRA35wdCUGTMQPT',	'dl_value' => '27',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'KSw5fCAdsrxaAXfI',	'dl_value' => '78',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'fXRA35wdCUGTMQPT',	'dl_value' => '27',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'KSw5fCAdsrxaAXfI',	'dl_value' => '78',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'fXRA35wdCUGTMQPT',	'dl_value' => '25',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'KSw5fCAdsrxaAXfI',	'dl_value' => '80',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'fXRA35wdCUGTMQPT',	'dl_value' => '24',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'KSw5fCAdsrxaAXfI',	'dl_value' => '81',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'fXRA35wdCUGTMQPT',	'dl_value' => '24',],
			['dl_user' => 'user1@us.er',	'dl_device' => 'ThCoJZOweVdNb8pS',	'dl_sensor' => 'KSw5fCAdsrxaAXfI',	'dl_value' => '81',],
        ];

        foreach ($listLogs as $log) {
            DeviceLog::create($log);
        }
    }
}
