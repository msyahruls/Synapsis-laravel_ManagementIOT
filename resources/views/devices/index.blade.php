@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
	@if ($message = Session::get('success'))
	<div class="row" id="proBanner">
		<div class="col-12">
			<span class="d-flex align-items-center purchase-popup alert alert-success">
				<p>{{ $message }}</p>
				<i class="mdi mdi-close ml-auto" id="bannerClose"></i>
			</span>
		</div>
	</div>
	@endif
	<div class="page-header">
			<h3 class="page-title">
			<span class="page-title-icon bg-gradient-primary text-white mr-2">
				<i class="mdi mdi-watch"></i>
			</span> Device List
		</h3>
	</div>
	<div class="row">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					{{-- <h4 class="card-title">device List</h4> --}}
					<a class="btn btn-sm btn-gradient-primary" href="{{ route('devices.create') }}"><i class="mdi mdi-plus"></i> Add</a>
					<br><br>
					<div class="table-responsive table-bordered">
						<table class="table">
							<tbody>
								<tr>
									<th width="2%"> # </th>
									<th> Device Name </th>
									<th> Description </th>
									<th width="12%"> Credential </th>
									<th> User </th>
									<th width="12%"> Action </th>
								</tr>
								@forelse ($devices as $device)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $device->device_name }}</td>
										<td>{{ $device->device_description }}</td>
										<td>{{ $device->device_credential }}</td>
										<td>{{ $device->name }}</td>
										<td>
											<form action="{{ route('devices.destroy', $device->device_id) }}" method="POST">
												<div class="btn-group">
													<a class="btn btn-sm btn-info view_modal color" href="{{ route('devices.show',$device->device_id) }}"><i class="mdi mdi-eye"></i></a>
													<a class="btn btn-sm btn-warning edit_modal color" href="{{ route('devices.edit',$device->device_id) }}"><i class="mdi mdi-grease-pencil"></i></a>
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-sm btn-danger delete color" onclick="return confirm('You will delete all data that relate to this?');"><i class="mdi mdi-delete"></i></button>
												</div>
											</form>
										</td>
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