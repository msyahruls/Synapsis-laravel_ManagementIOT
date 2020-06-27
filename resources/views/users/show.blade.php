@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">
			<a href="{{ route('users.index') }}" class="page-title-icon bg-gradient-primary">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-contacts"></i>
				</span>
			</a> Show User
		</h3>
		{{-- <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit User</li>
			</ol>
		</nav> --}}
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">User Data</h4>
					<div class="form-group row">
					  <label for="exampleInputName" class="col-sm-3 col-form-label">Name</label>
					  <div class="col-sm-9">
					    <input name="name" type="text" class="form-control" id="" placeholder="Full Name" value="{{ $user->name }}" readonly="">
					  </div>
					</div>
					<div class="form-group row">
					  <label for="exampleInputEmail" class="col-sm-3 col-form-label">Email</label>
					  <div class="col-sm-9">
					  	{{-- <input name="email_current" type="hidden" class="" id="" value="{{ $user->email }}"> --}}
					    <input name="email" type="email" class="form-control" id="" placeholder="Email" value="{{ $user->email }}" readonly="">
					  </div>
					</div>
					<div class="form-group row">
						<label for="exampleInputConfirmPassword" class="col-sm-3 col-form-label">Devices</label>
						<div class="col-sm-9">
							<div class="table-responsive table-bordered">
								<table class="table">
									<tbody>
										<tr>
											<th>Device Name</th>
											<th>Device Description</th>
											<th width="15%">Device Credential</th>
										</tr>
										@forelse ($user->devices as $device)
											<tr>
												<td> {{ $device->device_name }} </td>
												<td> {{ $device->device_description }} </td>
												<td> {{ $device->device_credential }} </td>
											</tr>
										@empty
											<tr>
												<td colspan="3"><center>Empty Data</center></td>
											</tr>
										@endforelse
										<tr>
											<td colspan="3">
												<a href="{{ route('devices.index') }}" class="btn bg-gradient-primary btn-sm">Manage Devices</a>
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