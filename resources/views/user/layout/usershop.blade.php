@extends('user.layout.include')
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
					My Store
				</h3>
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
									<td><a href="{{ route('userdownloadablefile', ['id' => $pro->id]) }}" class="btn btn-primary">Downloadable Files</a></td>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="page-header">
				<h3 class="page-title">
					Upload File
				</h3>
			</div>

			<div class="col-md-12">
				<div class="card" style="background-color: azure; display: block ruby;">
					<div class="col-md-4" style="display: grid;">
						@if ($pro->reportname)
							<h3> Test Report</h3>
							<label for=""> {{ $pro->reportname }}</label>
							<a href="{{ route('download_file_user', ['fileName' => $pro->test_report]) }}">
								<button class="btn btn-block btn-primary">Download</button>
							</a>
						@endif
					</div>
					<div class="col-md-4" style="display: grid;">
						@if ($pro->doc_req)
							<label for=""> Related Documents</label>
							<button class="btn btn-primary"> Download </button>
						@endif
					</div>
					<div class="col-md-4" style="display: grid;">
						<label for=""> Invoice</label>
						<button class="btn btn-primary"> Download </button>
					</div>

				</div>
			</div>

			<!--<div class="page-header" style="margin-top: 10px;">-->
			<!--	<h3 class="page-title">-->
			<!--		Admin Notes-->
			<!--	</h3>-->
			<!--</div>-->
			<!--<div class="col-md-12">-->
			<!--	<div class="card" style="background-color: azure">-->
			<!--		<p placeholder="Admin Notes">Admin Notes</p>-->
			<!--	</div>-->
			<!--</div>-->

			<div class="col-md-12">

				<div class="col-md-6">
					<form action="{{ route('user_test_report') }}" method="post" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="id" value="{{ $pro->id }}">
						{{-- <div class="col-md-6"> --}}
						<img src="" alt="" id="output/">
						<div class="card" style="background-color: azure">
							<div class="card-body">
								<div class="form-group">
									<h3> Upload Signed Estimate And Contracts</h3>
									<input type='file'name="nov" accept=".pdf, .jpg, .jpeg, .png" onchange="readURL(this);" style="width: 100%;" />
									<img id="blah" src="" alt="" />
								</div>
								<button type="submit" class="btn btn-success">Upload File</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<footer class="footer">
				<div class="d-sm-flex justify-content-center justify-content-sm-between">
					<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. All
						rights reserved.</span>
					<a href="https://root4tech.com/"> <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Design & Develop by
							Root4tech <i class="far fa-heart text-danger"></i></span></a>
				</div>
			</footer>
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
