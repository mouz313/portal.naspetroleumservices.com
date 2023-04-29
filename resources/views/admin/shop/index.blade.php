@extends('admin.dashboard.include')
@section('content')
    <div class="container table-responsive py-5">
        @include('admin.dashboard.alerts')
        <caption>View Stores</caption>
        <table class="table table-bordered table-hover" id=users>
            <thead style="color: #fefefe;background-color: #392c70;>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                    <th scope="col">Store Name</th>
                    <th scope="col">Store Email</th>
                    <th scope="col">Store Address</th>
                    <th scope="col">Facility ID</th>
                    <th scope="col">Customers</th>
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

                        <?php $user = App\Models\User::where('id', $shop->user_id)->first(); ?>
                        <td><a href=""></a>{{ $user->name }}</td>

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="grid">
                                    <a class="btn btn-primary"
                                        href="{{ Auth::user()->role == 2 ? route('shop.edit', ['id' => $shop->id]) : route('manager.shop.edit', ['id' => $shop->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a class="btn btn-success"
                                        href="{{ Auth::user()->role == 2 ? route('storeview', ['id' => $shop->id]) : route('manager.storeview', ['id' => $shop->id]) }}"
                                        class="btn btn-success">view</a>
                                        <a href="{{ route('downloadablefile', ['id' => $shop->id]) }}" class="btn btn-sm btn-info">View Downloadables</a>
                                    <form method="POST"
                                        action="{{ Auth::user()->role == 2 ? route('delete.shop', ['id' => $shop->id]) : route('manager.delete.shop', ['id' => $shop->id]) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger  " title="Delete shop"
                                            onclick="return confirm("Confirm delete?")><i class="fa fa-trash-o"
                                                aria-hidden="true"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
