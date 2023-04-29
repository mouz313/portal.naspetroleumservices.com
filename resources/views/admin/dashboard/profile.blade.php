@extends('admin.dashboard.include')
@section('content')
    <div class="card">
        <div class="card-header" style="width: 1200px"> Edit Profile</div>
        <div class="card-body">
            <form action="{{ route('adminupdate') }}" method="POST">
                @csrf
                <span>
                        @if(Session::has('Success'))
                            <span>
                                <div class="alert alert-success">{{ Session::get('Success') }}</div>
                            </span>
                        @elseif(Session::has('fail'))
                            <span>
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            </span>
                        @endif
                    </span>
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text"name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                     @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                     @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>


        </div>
        <div class="card-header"> Edit Password</div>
        <div class="card-body">
            <form action="{{ route('adminpassword') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="exampleInputPassword1"
                        placeholder="Enter Old Password">
                         @error('old_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <span>
                        @if (Session::has('fail'))
                            <span>
                                <strong>{{ Session::get('fail') }}</strong>
                            </span>
                        @endif
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"
                        placeholder="Enter New Password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Conform Password</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword1"
                        placeholder="Conform Password">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>


        </div>
    </div>
@endsection
