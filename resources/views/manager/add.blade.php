@extends('admin.dashboard.include')
@section('content')
    <div class="card" style="width: 100%;" >
  <div class="card-body">
    <div class="row">
            <form method="POST" action="{{ route('new.manager.register') }}">
                @csrf
                <input type="hidden" name="role" value="1">
                <h3 for=""> Add Manager</h3>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
                  @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Address">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword1" placeholder="Confirm Password">
                 @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>
              </form>
              </div>
        </div>
    </div>
@endsection
