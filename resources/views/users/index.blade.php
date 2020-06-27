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
				<i class="mdi mdi-contacts"></i>
			</span> User List
		</h3>
	</div>
	<div class="row">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					{{-- <h4 class="card-title">User List</h4> --}}
					<a class="btn btn-sm btn-gradient-primary" href="{{ route('users.create') }}"><i class="mdi mdi-plus"></i> Add</a>
					<br><br>
					<div class="table-responsive table-bordered">
						<table class="table">
							<tbody>
								<tr>
									<th width="2%"> # </th>
									<th> Name </th>
									<th> Email </th>
									<th width="12%"> Action </th>
								</tr>
								@forelse ($users as $user)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>
											<form action="{{ route('users.destroy', $user->id) }}" method="POST">
												<div class="btn-group">
													<a class="btn btn-sm btn-info view_modal color" href="{{ route('users.show',$user->id) }}"><i class="mdi mdi-eye"></i></a>
													<a class="btn btn-sm btn-warning edit_modal color" href="{{ route('users.edit',$user->id) }}"><i class="mdi mdi-grease-pencil"></i></a>
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