@extends('admin.dashboard.include')
@section('content')

    <div class="card-body">
    <form action="{{ Auth::user()->role == 2 ? route('shop.update'): route('manager.shop.update') }}" method="POST">
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
			<h1> Edit Shop</h1>
			<input type="hidden" name="id" value="{{ $shop->id }}">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Store Name</label>
					<input type="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Shop Name" value="{{ $shop->name }}">
						@error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Shop Email</label>
					<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Customer Email" value="{{$shop->email}}">
						@error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Store Address</label>
					<input type="address" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Store Address" value="{{$shop->address}}">
						@error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
				</div>
			</div>
			<button class="btn btn-primary" type="submit"> Update </button>
		</form>
    </div>
@endsection
