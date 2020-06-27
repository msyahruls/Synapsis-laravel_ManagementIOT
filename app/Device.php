<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
	// public $incrementing = false;
	protected $table = 'devices';
	protected $primaryKey = 'device_id'; // or null
	// protected $keyType = 'string';

	protected $fillable = [
		'device_name', 'device_description', 'device_credential', 'device_user'
	];

	public function user(){
		return $this->belongsTo('App\User','device_user','id');
	}

	public function sensors() {
			return $this->hasMany('App\Sensor', 'sensor_device', 'device_id');
	}
}
