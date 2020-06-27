@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">
			<a href="{{ route('sensors.index') }}" class="page-title-icon bg-gradient-primary">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-contacts"></i>
				</span>
			</a> Edit Sensor
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
					<h4 class="card-title">Edit Sensor Form</h4>
					<p class="card-description"> 
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
					</p>
					<form class="forms-sample" action="{{ route('sensors.update', $sensor->sensor_id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Sensor Name</label>
							<div class="col-sm-9">
								<input name="sensor_name" type="text" class="form-control" id="" placeholder="Sensor Name" value="{{ $sensor->sensor_name }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Unit</label>
							<div class="col-sm-9">
								<input name="sensor_unit" type="text" class="form-control" id="" placeholder="Unit" value="{{ $sensor->sensor_unit }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Description</label>
							<div class="col-sm-9">
								<input name="sensor_description" type="text" class="form-control" id="" placeholder="Description" value="{{ $sensor->sensor_description }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Credential</label>
							<div class="col-sm-9">
								<input name="sensor_credential" type="text" class="form-control" value="{{ $sensor->sensor_credential }}" readonly="">
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
						<button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
						{{-- <button class="btn btn-light">Cancel</button> --}}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop