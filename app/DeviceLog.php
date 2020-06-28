<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceLog extends Model
{
	// public $incrementing = false;
	protected $table = 'device_logs';
    protected $primaryKey = 'id'; // or null
    // protected $keyType = 'string';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'dl_value' => 'array'
    // ];

    protected $fillable = [
    	'dl_user', 'dl_device', 'dl_sensor', 'dl_value' //, 'dl_user', 'dl_device', 'dl_sensor'
    ];

    public function user(){
    	return $this->belongsTo('App\User','dl_user','email');
    }

    public function device(){
    	return $this->belongsTo('App\Device','dl_device','device_credential');
    }

    public function sensor(){
    	return $this->belongsTo('App\Sensor','dl_sensor','sensor_credential');
    }

}
