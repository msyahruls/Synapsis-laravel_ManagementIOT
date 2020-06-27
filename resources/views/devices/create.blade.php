@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">
			<a href="{{ route('devices.index') }}" class="page-title-icon bg-gradient-primary">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-contacts"></i>
				</span>
			</a> Create New Device
		</h3>
		{{-- <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="{{ route('devices.index') }}">devices</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Create New User</li>
			</ol>
		</nav> --}}
	</div>
	<div class="row">
		<div class="col-md-8 col-sm-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">New Device Form</h4>
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
					<form class="forms-sample" action="{{ route('devices.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Device Name</label>
							<div class="col-sm-9">
								<input name="device_name" type="text" class="form-control" id="" placeholder="Device Name">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Description</label>
							<div class="col-sm-9">
								<input name="device_description" type="text" class="form-control" id="" placeholder="Description">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Credential</label>
							<div class="col-sm-9">
								<input name="device_credential" type="text" class="form-control" id="" placeholder="Credential" value="{{ $credential }}" readonly="">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">User</label>
							<div class="col-sm-9">
								<select class="form-control" name="device_user">
									@foreach($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }} | {{ $user->email }}</option>
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