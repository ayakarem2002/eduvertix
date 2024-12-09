@extends('backend.layout')

@section('main')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Homepage </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Homepage </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- List items -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Homepage Items</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Video URL</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($homePages as $homepage)
                    <tr>
                      <td>{{ $homepage->id }}</td>
                      <td>{{ $homepage->title }}</td>
                      <td>{{ Str::limit($homepage->description, 50) }}</td>
                      <td>
                        @if($homepage->image)
                          <img src="{{ asset('storage/' . $homepage->image) }}" alt="Image" style="width: 150px;">
                        @else
                          No Image
                        @endif
                      </td>
                      <td>
                        <a href="{{ $homepage->video_url }}" target="_blank">View Video</a>
                      </td>
                      <td>
                        <button class="btn btn-primary btn-sm" onclick="openEditModal({{ $homepage }})">Edit</button>
                      </td>
                    </tr>
                        <!-- Edit form (modal) -->
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Details</h3>
          </div>
          <form action="{{ route('home.update', $homepage->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <!-- Input fields -->
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4" placeholder="Enter Description"></textarea>
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
              </div>
              <div class="form-group">
                <label for="video_url">Video URL</label>
                <input type="url" name="video_url" class="form-control" id="video_url" placeholder="Enter Video URL">
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="button" class="btn btn-secondary" onclick="resetEditForm()">Cancel</button>
            </div>
          </form>
        </div>
      </div>
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

@endsection

@section('scripts')
<script>
  function openEditModal(item) {
    // Set the form action to the update route for the specific item
    document.getElementById('editForm').action = `/backend/home/${item.id}`;
    
    // Populate the form fields with the item's data
    document.getElementById('title').value = item.title;
    document.getElementById('description').value = item.description;
    document.getElementById('video_url').value = item.video_url;

    // Remove any existing image preview (to avoid duplicates)
    const existingPreview = document.getElementById('imagePreview');
    if (existingPreview) {
        existingPreview.remove();
    }

    // If the image exists, display a preview
    if (item.image) {
        const imagePreview = document.createElement('img');
        imagePreview.id = 'imagePreview';
        imagePreview.src = `/storage/${item.image}`;
        imagePreview.alt = 'Current Image';
        imagePreview.style.width = '150px';
        imagePreview.style.marginTop = '10px';
        
        // Append the preview image to the form
        document.getElementById('image').parentElement.appendChild(imagePreview);
    }
  }

  function resetEditForm() {
    document.getElementById('editForm').reset();
    document.getElementById('editForm').action = '#';
  }
</script>
@endsection
