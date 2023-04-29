@extends('admin.dashboard.include')
@section('content')

    <div class="card-body">
        <form method="POST" action="{{ route('update') }}">
            @csrf
            <input type="hidden" value="{{ $user->id }} " name="id">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $user->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="tel" class="form-control @error('email') is-invalid @enderror"
                        name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                    <!--<a href="{{ url()->previous() }}">-->
                    <!--    <button type="button" class="btn btn-light" data-dismiss="modal">Back</button>-->
                    <!--</a>-->
                </div>

            </div>
        </form>
    </div>
@endsection
