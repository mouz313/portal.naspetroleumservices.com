@extends('admin.dashboard.include')
@section('content')
	<div class="card-body">
	    @include('admin.dashboard.alerts')
		<form action="{{ Auth::user()->role == 2 ? route('shop.store') :route('manager.shop.store') }}" method="POST">
			@csrf
			<span>
                        @if (Session::has('Success'))
                            <span>
                                <div class="alert alert-success">{{ Session::get('Success') }}</div>
                            </span>
                        @elseif(Session::has('fail'))
                            <span>
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            </span>
                        @endif
                    </span>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Store Name</label>
					<input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="inputEmail4" placeholder="Enter Shop Name">
					@error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Shop Email</label>
					<input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email" id="email" placeholder="Customer Email">
					@error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Store Address</label>
					<input type="address" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Store Address">
					@error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Facility ID</label>
					<input type="number" class="form-control @error('number') is-invalid @enderror" name="facility_id" id="facility_id" placeholder="Facility ID">
						@error('number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ $user->id }}" placeholder="User ID">
				</div>
			</div>
			<button class="btn btn-primary" type="submit"> Create Now </button>
		</form>
	</div>
@endsection
