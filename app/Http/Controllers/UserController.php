<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Device;
use App\Sensor;

class UserController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
		    $users = User::when($request->search, function($query) use($request){
						$query->where('name', 'LIKE', '%'.$request->search.'%');})
						->orderBy('name','asc')->with('devices.sensors')->get(); 

				// return json_encode($users);
				// return view('category.index',compact('categories'))
				//     ->with('i', (request()->input('page', 1) - 1) * 10);
				$i = 0;
		    return view('users.index', compact('users','i'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
		    return view('users.create');
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
				'name' => ['required', 'string', 'max:255'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			]);

			User::create([
				'name' => $request['name'],
				'email' => $request['email'],
				'password' => Hash::make($request['password']),
			]);

			return redirect()->route('users.index')
				->with('success','User created successfully.');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function show(User $user)
		{
		    return view('users.show',compact('user'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit(User $user)
		{
				return view('users.edit',compact('user'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, User $user)
		{
			// $email_current = $request['email_current'];
			// $email = $request['email'];
			$password_current = $request['password_current'];
			$password = $request['password'];

			// Check Password
			if (Hash::check($password, $password_current)) {
				// The password match...

				// Check Email abandoned cause email is Foreign Key
				// if ($email_current === $email) {
				// 	// The email match...
				// 		$request->validate([
				//         'name' => ['required', 'string', 'max:255'],
				//     ]);
				// } else {
				// 	// The email different...
				//     $request->validate([
				//         'name' => ['required', 'string', 'max:255'],
				//         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				//     ]);
				// }

				$request->validate([
					'name' => ['required', 'string', 'max:255'],
				]);

			}else{
				// The password different
				$request->validate([
					'password_current' => ['required', 'string', 'min:8', 'confirmed'],
				]);
			}

			$user->update([
				'name' => $request['name'],
			]);

			return redirect()->route('users.index')
				->with('success','User updated successfully.');
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
			// Attempt to make Soft Delete, I gave up hehe
			// $user = User::findOrFail($id)->with('devices', function($query){
			// 			$query->whereHas('sensors', function($q){
			// 				$q->whereIn('sensors.sensors_device', 'devices_id');
			// 			});
			// 		})->get();

			// $device = Device::where('device_user', $id)->with('sensors')->get();
			// $sensor = Sensor::where('')
			// printf($user);
			// printf($device);
			// $user->devices()->detach();
			// $user->delete();

			//This DELETE not soft delete, which mean Devices, Sensors and Device_logs deleted too
			$user = User::whereId($id)->with('devices.sensors')->delete();

			return redirect()->route('users.index')
				->with('success','User deleted successfully');

		}
}
