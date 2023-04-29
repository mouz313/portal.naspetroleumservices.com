@extends('admin.dashboard.include')
@section('content')
<div class="card" style="width: 100%;" >
  <div class="card-body">
      @include('admin.dashboard.alerts')
    <div class="row">
        <h3> Add Customer </h3>
        <form method="POST" action="{{ route('new.users.register') }}" id="add">
            @csrf
            <input type="hidden" name="role" value="0">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Customers Name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" placeholder="Customer Name" class="form-control  @error('name') is-invalid @enderror" name="name" requiredautocomplete="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Customer Email Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder=" Customer Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Customer Phone Number') }}</label>
                <div class="col-md-6">
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Customer Phone Number">
                    <span class="text-danger">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                    <small id="emailHelp" class="form-text text-muted">Password Must Be in between 8-16 Charters/number.</small>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
       </form>
    </div>
    </div>
@endsection