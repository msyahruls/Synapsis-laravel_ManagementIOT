<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DeviceLog;

class DeviceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(DeviceLog::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// $data = $request->getContent();
    	$data = json_decode($request->getContent(), true);
			foreach ($data as $dl) {
				$user = $dl['user'];
				$device = $dl['device'];
				$sensor = $dl['sensor'];
				$value = $dl['value'];
				DeviceLog::create([
					'dl_user' => $user,
					'dl_device' => $device,
					'dl_sensor' => $sensor,
					'dl_value' => $value
				]);
			}
			return $data;

			//SORRY, this is just for reminder, THANKS
			// return json_decode($request);
			// return json_encode($request->json());
			// return json_decode($request->all());
			// return json_encode($request->all());
			// return json_decode($request->json()->all());
			// return json_encode($request->json()->all());
			// return json_encode($request->getContent(), true);
			// return json_decode($request->getContent(), true);
			// return json_encode($request->getContent()->json(), true);
			// return json_decode($request->getContent()->json(), true);
			// return dd($request);
			// return json_decode($request);
			// return json_encode($request->all());
			// Post::create($data);
			// return DeviceLog::create(json_encode($request->all()));
			// return $request;
			// return json_decode($request->json()->all());
			// return response()->json($request);
			// $data = $request->only('email','device','sensor', 'value');
			// $test['token'] = time();
			// $test['data'] = json_encode($request->json()->all());
			// return $test;
			// return DeviceLog::insert($test);
			// DeviceLog::create([
			// 	'dl_user' => $request['email'],
			// 	'dl_device' => $request['device'],
			// 	'dl_sensor' => $request['sensor'],
			// 	'dl_value' => $request['value']
			// ]);
			// return Redirect::to("laravel-json")->withSuccess('Great! Successfully store data in json format in datbase');
			// return $request->json()->all();
			// return json_decode($request->all(), true);
			// return $data;
			// return json_encode($value);
		}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
