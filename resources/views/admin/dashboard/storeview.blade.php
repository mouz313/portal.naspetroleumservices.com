@extends('admin.dashboard.include')
@section('content')
	<style>
		img {
			max-width: 300px;
		}

		input[type=file] {
			padding: 10px;
			background: #04b76b96;
		}
	</style>
	<!-- partial -->
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="page-header">
				<h3 class="page-title">
					Store View
				</h3>
				<td><a href="{{route('reminders.index', $pro->id)}}" class="btn btn-sm btn-info">Reminder</a></td>
			</div>
			<div class="row grid-margin">
				<div class="col-12">
					<div class="card" style="background-color: azure">
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th>Store Name</th>
										<th>Store Email</th>
										<th>Store Address: </th>
										<th>Facility ID</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<td>{{ $pro->name }}</td>
									<td>{{ $pro->email }}</td>
									<td>{{ $pro->address }}</td>
									<td>{{ $pro->facility_id }}</td>
									<td><a href="{{ route('downloadablefile', ['id' => $pro->id]) }}" class="btn btn-sm btn-info">View Downloadables</a></td>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="page-header">
				<h3 class="page-title">
					Upload New Files for this Store
				</h3>
			</div>
			<div class="container" style="display: flex;">

				<form action="{{ route('update_store_data') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-6">

							<input type="hidden" name="id" value="{{ $pro->id }}">
							{{-- <div class="col-md-6"> --}}
							<img src="" alt="" id="output/">
							<div class="card" style="background-color: azure">
								<div class="card-body">
									<div class="form-group">
										<h3> Test Report </h3>
										<input type='file'name="test_report" accept=".pdf, .jpg, .jpeg, .png" onchange="readURL(this);" style="width: 100%;" />
										<img id="blah" src="" alt="" />

									</div>
								</div>
							</div>

						</div>

						<div class="col-6">
							<img src="" alt="" id="output/">
							<div class="card" style="background-color: azure">
								<div class="card-body">
									<div class="form-group">
										<h3> Estimate and Contracts</h3>
										<input type='file' name="required_document" accept=".pdf, .jpg, .jpeg, .png" style="width: 100%;" />
									</div>

								</div>

							</div>
						</div>

						<div class="col-md-12">
							<h6>Notes for customer</h6>
							<textarea name="note" id="note" cols="130" rows="5" style="background-color: azure;border: aliceblue;"></textarea>
							<button class="btn btn-success" type="submit" style="margin-top: 5px"> Submit </button>
						</div>
					</div>
				</form>

			</div>

			
			<!-- partial -->
		</div>
		<!-- main-panel ends -->
	</div>
	<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	</div>

	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#blah')
						.attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
@endsection
