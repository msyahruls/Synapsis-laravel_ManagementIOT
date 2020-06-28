@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">
			<a href="{{ route('devices.index') }}" class="page-title-icon bg-gradient-primary">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-watch"></i>
				</span>
			</a> Show Device
		</h3>
		{{-- <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('devices.index') }}">devices</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit device</li>
			</ol>
		</nav> --}}
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Device Data</h4>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Device Name</label>
						<div class="col-sm-9">
							<input name="" type="text" class="form-control" id="" placeholder="Device Name" value="{{ $device->device_name }}" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<input name="" type="" class="form-control" id="" placeholder="Description" value="{{ $device->device_description }}" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Device Credential</label>
						<div class="col-sm-9">
							<input name="" type="" class="form-control" id="" placeholder="Credential" value="{{ $device->device_credential }}" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">User</label>
						<div class="col-sm-9">
							<div class="input-group">
								<input name="device_user" type="text" class="form-control" value="{{ $device->user->name }} | {{ $device->user->email }}" readonly="">
								<div class="input-group-append">
									<a href="{{ route('users.show', $device->user->id) }}" class="btn btn-sm btn-gradient-primary"><button class="btn btn-sm btn-gradient-primary" type="button"><i class="mdi mdi-contacts"></i></button></a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Sensors</label>
						<div class="col-sm-9">
							<div class="table-responsive table-bordered">
								<table class="table">
									<tbody>
										<tr>
											<th>Sensor Name</th>
											<th>Sensor Description</th>
											<th width="15%">Sensor Credential</th>
										</tr>
										@forelse ($device->sensors as $sensor)
											<tr>
												<td> {{ $sensor->sensor_name }} </td>
												<td> {{ $sensor->sensor_description }} </td>
												<td> {{ $sensor->sensor_credential }} </td>
											</tr>
										@empty
											<tr>
												<td colspan="3"><center>Empty Data</center></td>
											</tr>
										@endforelse
										<tr>
											<td colspan="3">
												<a href="{{ route('devices.index') }}" class="btn bg-gradient-primary btn-sm">Manage Sensors</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop