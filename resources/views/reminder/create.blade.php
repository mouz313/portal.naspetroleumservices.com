@extends('admin.dashboard.include')
@section('content')
@section('content')
    <div class="card" style="width: 100%">
        <div class="card-header">Set Reminder</div>

        <div class="card-body">
            <div class="row">
            <form method="POST" action="{{route('reminders.store')}}">
                @csrf
                    <input type="hidden" value="{{$id}}" name="id">
                    
                <div class="form-group">
                    <label for="date">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="reminder_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Set Reminder</button>
            </form>
        </div>
    </div>
@endsection
