@extends('layouts.admin')
@section('content')
	<div class="content-wrapper">
		<div class="page-header">
			<h3 class="page-title">
				<span class="page-title-icon bg-gradient-primary text-white mr-2">
					<i class="mdi mdi-home"></i>
				</span> Dashboard
			</h3>
		</div>
		<div class="row">
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-danger card-img-holder text-white">
					<div class="card-body">
						<img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
						<h4 class="font-weight-normal mb-3">Total Users <i class="mdi mdi-contacts mdi-24px float-right"></i>
						</h4>
						<h2 class="mb-5">{{ $users }}</h2>
						{{-- <h6 class="card-text">Increased by 60%</h6> --}}
					</div>
				</div>
			</div>
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-info card-img-holder text-white">
					<div class="card-body">
						<img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
						<h4 class="font-weight-normal mb-3">Total Devices <i class="mdi mdi-watch mdi-24px float-right"></i>
						</h4>
						<h2 class="mb-5">{{ $devices }}</h2>
						{{-- <h6 class="card-text">Decreased by 10%</h6> --}}
					</div>
				</div>
			</div>
			<div class="col-md-4 stretch-card grid-margin">
				<div class="card bg-gradient-success card-img-holder text-white">
					<div class="card-body">
						<img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
						<h4 class="font-weight-normal mb-3">Total Sensors <i class="mdi mdi-chart-bar mdi-24px float-right"></i>
						</h4>
						<h2 class="mb-5">{{ $sensors }}</h2>
						{{-- <h6 class="card-text">Increased by 5%</h6> --}}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Last Activity</h4>
						<div class="table-responsive table-bordered">
							<table class="table">
								<tbody>
									<tr>
										<th width="15%"> Created at </th>
										<th> User </th>
										<th> Device </th>
										<th> Sensor </th>
										<th> Value </th>
									</tr>
									@forelse ($logs as $log)
										<tr>
											<td>{{ $log->created_at }}</td>
											<td>{{ $log->user->name }}</td>
											<td>{{ $log->device->device_name }}</td>
											<td>{{ $log->sensor->sensor_name }}</td>
											<td>{{ $log->dl_value }} {{ $log->sensor->sensor_unit }}</td>
										</tr>
									@empty
										<tr>
											<td colspan="4"><center>Empty Data</center></td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop