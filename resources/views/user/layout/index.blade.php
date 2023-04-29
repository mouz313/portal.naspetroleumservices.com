@extends('user.layout.include')
{{-- @section('content') --}}
    <!-- partial -->
@section('content')
    <div class="container table-responsive py-5">
        <caption>View Stores</caption>
        <table class="table table-bordered table-hover" id=users>
            <thead style="color: #fefefe;background-color: #392c70;>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Facility ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($shops as $shop)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>{{ $shop->name }}</td>
                        <td>{{ $shop->email }}</td>
                        <td>{{ $shop->address }}</td>
                        <td>{{ $shop->facility_id }}</td>

                        <?php $user = App\Models\User::where('id' , $shop->user_id)->first() ?>
                        <td><a href=""></a>{{ $user->name }}</td>
                        {{-- <td>{{ $user->role }}</td> --}}
                        <td>
                            {{-- <form action="{{ route('users.destroy', $user->id) }} " method="POST"> --}}

                            <a href="{{route('userstore',['id'=>$shop->id])}}" class="btn btn-primary"> View</a>
                            <a href="{{ route('userdownloadablefile', ['id' => $shop->id]) }}" class="btn btn-primary"> Docs</a>
                            {{-- <a href="#" class="btn btn-danger"> Delete</a> --}}
                            {{-- </form> --}}
                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    @endsection
