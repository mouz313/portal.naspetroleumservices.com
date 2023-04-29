@extends('admin.dashboard.include')
@section('content')
    <div class="card" style="width: 100%">
        <div class="card-header">Reminder List</div>
        
        <div class="card">
            <div class="container table-responsive py-5">
                @include('admin.dashboard.alerts')
                <caption>Task</caption>
                <table class="table table-bordered table-hover" id=users>
                    <thead style="color: #fefefe;background-color: #392c70;">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Shop Name</th>
                            <th scope="col">Recipient Email:</th>
                            <th scope="col">Reminder Date</th>
                            <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($reminders as $reminder)

                            <tr>
                                <td>
                                    {{ $i++ }}
                                </td>
                                <td>{{ $reminder->title }}</td>
                                <td>{{ $reminder->description }}</td>
                                <td><a href="{{ route('storeview', $reminder->shop['id']) }}">{{ $reminder->shop['name']}}</a></td>
                                <td>{{ $reminder->recipient_email}}</td>
                                <td>{{ $reminder->reminder_date}}</td>
                                <td>
                                    <form action="{{ route('destroy', ['id' => $reminder->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
