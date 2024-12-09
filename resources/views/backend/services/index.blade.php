@extends('backend.layout')

@section('main')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Service Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Services</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Services List</h3>
            </div>
            <div class="card-body">
              <!-- Display success/error messages -->
              @if(session('success'))
                <div class="alert alert-success mt-3">
                  {{ session('success') }}
                </div>
              @elseif(session('error'))
                <div class="alert alert-danger mt-3">
                  {{ session('error') }}
                </div>
              @endif

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($services as $service)
                  <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ Str::limit($service->description, 50) }}</td>
                    <td>
                      <!-- Button to trigger the edit modal -->
                      <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editServiceModal" data-id="{{ $service->id }}" data-title="{{ $service->title }}" data-description="{{ $service->description }}">Edit</button>
                      <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editServiceForm" action="{{route('services.update', $service->id)}}" method="POST">
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="editTitle" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="editDescription" rows="4"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="editServiceForm" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  $('#editServiceModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var serviceId = button.data('id'); // Extract info from data-* attributes
    var title = button.data('title');
    var description = button.data('description');

    var modal = $(this);
    modal.find('.modal-title').text('Edit Service - ' + title);
    modal.find('#editTitle').val(title);
    modal.find('#editDescription').val(description);

    // Update form action URL to the correct route for updating the service
    var updateRoute = '{{ route("services.update", ":id") }}';
    updateRoute = updateRoute.replace(':id', serviceId);
    modal.find('#editServiceForm').attr('action', updateRoute);
  });
</script>
@endsection
