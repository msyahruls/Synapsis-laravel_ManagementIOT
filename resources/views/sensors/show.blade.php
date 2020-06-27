@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">
			<a href="{{ route('sensors.index') }}" class="page-title-icon bg-gradient-primary">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-contacts"></i>
				</span>
			</a> Show Sensor
		</h3>
		{{-- <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('sensors.index') }}">sensors</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit sensor</li>
			</ol>
		</nav> --}}
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Sensor Data</h4>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Sensor Name</label>
						<div class="col-sm-9">
							<input name="" type="text" class="form-control" id="" placeholder="Sensor Name" value="{{ $sensor->sensor_name }}" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<input name="" type="" class="form-control" id="" placeholder="Description" value="{{ $sensor->sensor_description }}" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Unit</label>
						<div class="col-sm-9">
							<input name="sensor_unit" type="text" class="form-control" id="" placeholder="Unit" value="{{ $sensor->sensor_unit }}" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Sensor Credential</label>
						<div class="col-sm-9">
							<input name="" type="" class="form-control" id="" placeholder="Credential" value="{{ $sensor->sensor_credential }}" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Device</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input name="" type="" class="form-control" id="" placeholder="Device" value="{{ $sensor->device->device_name }} | {{ $sensor->device->device_credential }} " readonly="">
								<div class="input-group-append">
									<a href="{{ route('devices.show', $sensor->device->device_id) }}" class="btn btn-sm btn-gradient-primary"><button class="btn btn-sm btn-gradient-primary" type="button"><i class="mdi mdi-watch"></i></button></a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">User</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input name="" type="" class="form-control" id="" placeholder="User" value="{{ $sensor->device->user->name }} | {{ $sensor->device->user->email }} " readonly="">
								<div class="input-group-append">
									<a href="{{ route('users.show', $sensor->device->user->id) }}" class="btn btn-sm btn-gradient-primary"><button class="btn btn-sm btn-gradient-primary" type="button"><i class="mdi mdi-contacts"></i></button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop