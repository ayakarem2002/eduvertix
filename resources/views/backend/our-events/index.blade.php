@extends('backend.layout')

@section('main')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Our Events</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Event List</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Events</h3>
              <a href="{{ route('our-events.create') }}" class="btn btn-primary float-right">Add New Event</a>
            </div>
            <div class="card-body">
                <!-- Success Message -->
                @if(session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif

                <!-- Add/Edit Event Form -->
                <form action="{{ isset($our_event) ? route('our-events.update', $our_event->id) : route('our-events.store') }}" method="POST">
                  @csrf
                  @if(isset($our_event))
                    @method('POST') {{-- Using POST for update --}}
                  @endif
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $our_event->title ?? '' }}" required>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ $our_event->description ?? '' }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">
                    {{ isset($our_event) ? 'Update Event' : 'Add Event' }}
                  </button>
                </form>

                <!-- Events Table -->
                <table class="table table-bordered mt-4">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($our_events && $our_events->count() > 0)
                      @foreach($our_events as $event)
                        <tr>
                          <td>{{ $event->id }}</td>
                          <td>{{ $event->title }}</td>
                          <td>{{ $event->description }}</td>
                          <td>
                            <!-- Edit Link -->
                            <a href="{{ route('our-events.edit', $event->id) }}" class="btn btn-info btn-sm">Edit</a>

                            <form action="{{ route('our-events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') <!-- Ensure this matches the route method -->
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                            </form>

                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="4" class="text-center">No events found.</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
