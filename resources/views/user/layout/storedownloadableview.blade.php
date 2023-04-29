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
					Store Name: {{ $shop->name }}
				</h3>
			</div>
			<div class="container table-responsive py-5">
				<caption>Downloadable files</caption>
				<table class="table table-bordered table-hover" id=users>
            <thead style="color: #fefefe;background-color: #392c70;>
						<tr>
							<th scope="col">#</th>
							<th scope="col">#</th>
							<th scope="col">Test Reports</th>
							<th scope="col">Estimate & Contracts</th>
							<th scope="col">Signed Estimate And Contracts</th>
							<th scope="col">Note by Admin</th>
							<th scope="col">Date</th>
						</tr>
					</thead>
					<tbody>
						@php
							$i = 1;
						@endphp
						@foreach ($shop_file as $file)
							<tr>
								<td>
									{{ $i++ }}
								</td>
								@if ($file->test_reports != null)
									<td>
										<a href="{{ route('user_download_file', ['fileName' => $file->test_reports]) }}">Download Test Report</a>
									</td>
								@else
									<td>No test Report Found</td>
								@endif

								{{-- <td>{{ $user->role }}</td> --}}
								@if ($file->required_document != null)
									<td>
										<a href="{{ route('user_download_required_document', ['fileName' => $file->required_document]) }}">
                                            Download Estimate & Contracts
                                        </a>
									</td>
								@else
									<td>No Related Documents Found</td>
								@endif
								@if ($file->nov != null)
									<td>
                                        <a href="{{ route('user_download_required_document', ['fileName' => $file->nov]) }}">
                                            Download Estimate And Contracts
                                        </a>
                                    </td>
								@else
									<td>No Estimate And Contracts Found</td>
								@endif
								@if ($file->note != null)
									<td>{{ $file->note }}</td>
								@else
									<td><a>No note</a></td>
								@endif
								<td>{{ $file->created_at }}</td>

							</tr>
						@endforeach
					</tbody>
				</table>
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
