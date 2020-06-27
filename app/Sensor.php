<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	// public $incrementing = false;
	protected $table = 'sensors';
	protected $primaryKey = 'sensor_id'; // or null
	// protected $keyType = 'string';

	protected $fillable = [
		'sensor_name', 'sensor_description', 'sensor_unit', 'sensor_credential', 'sensor_device'
	];

	public function device(){
		return $this->belongsTo('App\Device','sensor_device','device_id');
	}
}
