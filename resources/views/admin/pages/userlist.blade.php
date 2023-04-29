@extends('admin.dashboard.include')
@section('content')
    <div class="container table-responsive py-5">
        @include('admin.dashboard.alerts')
        <caption>View Users</caption>
        <table class="table table-bordered table-hover" id=users>
            <thead style="color: #fefefe;background-color: #392c70;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone:</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $i++ }}
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?? 'no number' }}</td>
                        {{-- <td>{{ $user->role }}</td> --}}
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="grid">
                                    <a class="btn btn-primary"
                                        href="{{ Auth::user()->role == 2 ? route('add', ['id' => $user->id]) : route('manager.add', ['id' => $user->id]) }}"
                                        class="btn btn-primary">Add Store</a>
                                    <a class="btn btn-success"
                                        href="{{ Auth::user()->role == 2 ? route('edit', ['id' => $user->id]) : route('manager.edit', ['id' => $user->id]) }}"
                                        class="btn btn-success">Edit</a>
                                    <form method="POST" action="{{ Auth::user()->role == 2 ? route('delete', ['id' => $user->id]) : url('manager/delete', ['id' => $user->id]) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" title="Delete User" <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
