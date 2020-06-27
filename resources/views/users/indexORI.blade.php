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
				<i class="mdi mdi-home"></i>
			</span> User Lists
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
							<thead>
								<tr>
									<th> Name </th>
									<th> Email </th>
									<th width="12%"> Action </th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>
											<form action="{{ route('users.destroy', $user->id) }}" method="POST">
												<div class="btn-group">
													{{-- <a class="btn btn-sm btn-info view_modal color" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye"></i></a> --}}
													<a class="btn btn-sm btn-warning edit_modal color" href="{{ route('users.edit',$user->id) }}"><i class="mdi mdi-grease-pencil"></i></a>
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-sm btn-danger delete color"><i class="mdi mdi-delete"></i></button>
												</div>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- <div class="row">
	  <div class="col-md-7 grid-margin stretch-card">
	    <div class="card">
	      <div class="card-body">
	        <h4 class="card-title">Project Status</h4>
	        <div class="table-responsive">
	          <table class="table">
	            <thead>
	              <tr>
	                <th> # </th>
	                <th> Name </th>
	                <th> Due Date </th>
	                <th> Progress </th>
	              </tr>
	            </thead>
	            <tbody>
	              <tr>
	                <td> 1 </td>
	                <td> Herman Beck </td>
	                <td> May 15, 2015 </td>
	                <td>
	                  <div class="progress">
	                    <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	                  </div>
	                </td>
	              </tr>
	              <tr>
	                <td> 2 </td>
	                <td> Messsy Adam </td>
	                <td> Jul 01, 2015 </td>
	                <td>
	                  <div class="progress">
	                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
	                  </div>
	                </td>
	              </tr>
	              <tr>
	                <td> 3 </td>
	                <td> John Richards </td>
	                <td> Apr 12, 2015 </td>
	                <td>
	                  <div class="progress">
	                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
	                  </div>
	                </td>
	              </tr>
	              <tr>
	                <td> 4 </td>
	                <td> Peter Meggik </td>
	                <td> May 15, 2015 </td>
	                <td>
	                  <div class="progress">
	                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
	                  </div>
	                </td>
	              </tr>
	              <tr>
	                <td> 5 </td>
	                <td> Edward </td>
	                <td> May 03, 2015 </td>
	                <td>
	                  <div class="progress">
	                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
	                  </div>
	                </td>
	              </tr>
	              <tr>
	                <td> 5 </td>
	                <td> Ronald </td>
	                <td> Jun 05, 2015 </td>
	                <td>
	                  <div class="progress">
	                    <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
	                  </div>
	                </td>
	              </tr>
	            </tbody>
	          </table>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col-md-5 grid-margin stretch-card">
	    <div class="card">
	      <div class="card-body">
	        <h4 class="card-title text-white">Todo</h4>
	        <div class="add-items d-flex">
	          <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
	          <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Add</button>
	        </div>
	        <div class="list-wrapper">
	          <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
	            <li>
	              <div class="form-check">
	                <label class="form-check-label">
	                  <input class="checkbox" type="checkbox"> Meeting with Alisa </label>
	              </div>
	              <i class="remove mdi mdi-close-circle-outline"></i>
	            </li>
	            <li class="completed">
	              <div class="form-check">
	                <label class="form-check-label">
	                  <input class="checkbox" type="checkbox" checked> Call John </label>
	              </div>
	              <i class="remove mdi mdi-close-circle-outline"></i>
	            </li>
	            <li>
	              <div class="form-check">
	                <label class="form-check-label">
	                  <input class="checkbox" type="checkbox"> Create invoice </label>
	              </div>
	              <i class="remove mdi mdi-close-circle-outline"></i>
	            </li>
	            <li>
	              <div class="form-check">
	                <label class="form-check-label">
	                  <input class="checkbox" type="checkbox"> Print Statements </label>
	              </div>
	              <i class="remove mdi mdi-close-circle-outline"></i>
	            </li>
	            <li class="completed">
	              <div class="form-check">
	                <label class="form-check-label">
	                  <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
	              </div>
	              <i class="remove mdi mdi-close-circle-outline"></i>
	            </li>
	            <li>
	              <div class="form-check">
	                <label class="form-check-label">
	                  <input class="checkbox" type="checkbox"> Pick up kids from school </label>
	              </div>
	              <i class="remove mdi mdi-close-circle-outline"></i>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </div>
	  </div>
	</div> --}}
</div>
@stop