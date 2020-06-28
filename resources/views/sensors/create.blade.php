@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">
			<a href="{{ route('sensors.index') }}" class="page-title-icon bg-gradient-primary">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-chart-bar"></i>
				</span>
			</a> Create New Sensor
		</h3>
		{{-- <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="{{ route('sensors.index') }}">sensors</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Create New Device</li>
			</ol>
		</nav> --}}
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">New Sensor Form</h4>
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
					<form class="forms-sample" action="{{ route('sensors.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Sensor Name</label>
							<div class="col-sm-9">
								<input name="sensor_name" type="text" class="form-control" id="" placeholder="Sensor Name">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Description</label>
							<div class="col-sm-9">
								<input name="sensor_description" type="text" class="form-control" id="" placeholder="Description">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Unit</label>
							<div class="col-sm-9">
								<input name="sensor_unit" type="text" class="form-control" id="" placeholder="Unit">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Credential</label>
							<div class="col-sm-9">
								<input name="sensor_credential" type="text" class="form-control" id="" placeholder="Credential" value="{{ $credential }}" readonly="">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Device</label>
							<div class="col-sm-9">
								<select class="form-control" name="sensor_device">
									@foreach($devices as $device)
										<option value="{{ $device->device_id }}">{{ $device->user->name }} | {{ $device->user->email }} | {{ $device->device_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
						{{-- <button class="btn btn-light">Cancel</button> --}}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop