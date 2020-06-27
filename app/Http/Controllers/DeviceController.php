<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Device;
use App\Sensor;

class DeviceController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
				$devices = Device::when($request->search, function($query) use($request){
					$query->where('device_name', 'LIKE', '%'.$request->search.'%');})
					->join('users', 'users.id', '=', 'devices.device_user')
					->orderBy('users.name','asc')
					->orderBy('device_name','asc')->with('user','sensors')->get();
				// return json_encode($devices);
				$i = 0;
				return view('devices.index', compact('devices','i'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
				$users = $users = User::all();
		    $credential = Str::random(16);
		    return view('devices.create', compact('users', 'credential'));
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
				'device_name' => ['required', 'string', 'max:255'],
				'device_description' => ['max:255'],
				'device_credential' => ['required', 'string', 'min:8', 'unique:devices'],
				'device_user' => ['required'],
			]);

			Device::create([
				'device_name' => $request['device_name'],
				'device_description' => $request['device_description'],
				'device_credential' => $request['device_credential'],
				'device_user' => $request['device_user'],
			]);

			return redirect()->route('devices.index')
				->with('success','Device created successfully.');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show(Device $device)
		{
		    return view('devices.show',compact('device'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Device $device)
		{
		    return view('devices.edit',compact('device'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Device $device)
		{
			$request->validate([
				'device_name' => ['required', 'string', 'max:255'],
				'device_description' => ['max:255'],
			]);

			$device->update([
				'device_name' => $request['device_name'],
				'device_description' => $request['device_description'],
			]);

			return redirect()->route('devices.index')
				->with('success','Device updated successfully.');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
			$device = Device::whereDeviceId($id)->with('sensors')->delete();

			return redirect()->route('devices.index')
				->with('success','Device deleted successfully');
		}
}
