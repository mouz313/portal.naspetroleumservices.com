@extends('admin.dashboard.include')
@section('content')
    <div class="card-body">
@include('admin.dashboard.alerts')
        <caption>View Managers</caption>
        <table class="table" id=users>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Manager Name</th>
                    <th scope="col">Manager Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ( $user as $user)
                
                <tr>
                    <td>
                        {{ $i++ }}
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="grid">
                                <a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-success"> Edit</a>
                                    <form method="POST" action="{{ route('delete', ['id' => $user->id]) }}" accept-charset="UTF-8"
                                        style="display:inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" title="Delete User"
                                            onclick="return confirm("Confirm delete?")><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>
                                    </form>
                            </div>
                        </div>
                            {{-- <a href="{{ route('edit', ['id' => $user->id]) }}" class="btn btn-success"> Edit</a>
                            <form method="POST" action="{{ route('delete', ['id' => $user->id]) }}" accept-charset="UTF-8"
                                style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-danger" title="Delete User"
                                    onclick="return confirm("Confirm delete?")><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Delete</button>
                            </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    @endsection
