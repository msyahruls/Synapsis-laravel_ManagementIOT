@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">
			<a href="{{ route('users.index') }}" class="page-title-icon bg-gradient-primary">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-contacts"></i>
				</span>
			</a> Edit User
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
					<h4 class="card-title">Edit User Form</h4>
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
					<form class="forms-sample" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Name</label>
							<div class="col-sm-9">
								<input name="name" type="text" class="form-control" id="" placeholder="Full Name" value="{{ $user->name }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								{{-- <input name="email_current" type="hidden" class="" id="" value="{{ $user->email }}"> --}}
								<input name="email" type="email" class="form-control" id="" placeholder="Email" value="{{ $user->email }}" readonly="">
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-sm-3 col-form-label">Confirm Password</label>
							<div class="col-sm-9">
								<input name="password_current" type="hidden" class="form-control" value="{{ $user->password }}" readonly="">
								<input name="password" type="password" class="form-control" id="" placeholder="Confirm Password">
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