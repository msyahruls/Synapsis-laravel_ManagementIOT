<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Device;
use App\Sensor;
use App\DeviceLog;

class SensorController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
			$sensors = Sensor::when($request->search, function($query) use($request){
					$query->where('sensor_name', 'LIKE', '%'.$request->search.'%');})
					->join('devices', 'devices.device_id', '=', 'sensors.sensor_device')
					->orderBy('devices.device_name','asc')
					->orderBy('sensor_name','asc')->with('device.user')->get();
				// return json_encode($sensors);
				$i = 0;
				return view('sensors.index', compact('sensors','i'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			$devices = $devices = Device::join('users', 'users.id', '=', 'devices.device_user')
					->orderBy('users.name','asc')
					->orderBy('device_name','asc')->with('user')->get();
			$credential = Str::random(16);
			// return json_encode($devices);
			return view('sensors.create', compact('devices', 'credential'));
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			$request->validate([
				'sensor_name' => ['required', 'string', 'max:255'],
				'sensor_description' => ['max:255'],
				'sensor_credential' => ['required', 'string', 'min:8', 'unique:sensors'],
				'sensor_device' => ['required'],
			]);

			Sensor::create([
				'sensor_name' => $request['sensor_name'],
				'sensor_description' => $request['sensor_description'],
				'sensor_credential' => $request['sensor_credential'],
				'sensor_unit' => $request['sensor_unit'],
				'sensor_device' => $request['sensor_device'],
			]);

			return redirect()->route('sensors.index')
				->with('success','Sensor created successfully.');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show(Sensor $sensor)
		{
			$logs = DeviceLog::whereDl_sensor($sensor->sensor_credential)
					->orderBy('created_at','desc')->paginate(10);
			return view('sensors.show',compact('sensor','logs'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Sensor $sensor)
		{
		    return view('sensors.edit',compact('sensor'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Sensor $sensor)
		{
			$request->validate([
				'sensor_name' => ['required', 'string', 'max:255'],
				'sensor_description' => ['max:255'],
			]);

			$sensor->update([
				'sensor_name' => $request['sensor_name'],
				'sensor_description' => $request['sensor_description'],
				'sensor_unit' => $request['sensor_unit'],
			]);

			return redirect()->route('sensors.index')
				->with('success','Sensor updated successfully.');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
			$sensor = Sensor::whereDeviceId($id)->delete();

			return redirect()->route('sensors.index')
				->with('success','Sensor deleted successfully');
		}
}
