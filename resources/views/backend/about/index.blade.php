@extends('backend.layout')

@section('main')
<div class="content-wrapper">
  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">About Us</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">About Us</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- About Us Table -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">About Us Entries</h3>
            </div>
            <div class="card-body">
            <table class="table table-bordered">
        <thead>
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
              @foreach ($aboutUsEntries as $entry)
              <tr>
                  <td><strong>ID</strong></td>
                  <td>{{ $entry->id }}</td>
              </tr>
              <tr>
                  <td><strong>Title</strong></td>
                  <td>{{ $entry->title }}</td>
              </tr>
              <tr>
                  <td><strong>Description</strong></td>
                  <td>{{ $entry->description }}</td>
              </tr>
              <tr>
                  <td><strong>Image 1</strong></td>
                  <td>
                  <img src="{{ asset('storage/' . $entry->image_1) }}" 
     onerror="this.onerror=null;this.src='{{ asset('images/placeholder.png') }}';" 
     alt="Image 1" 
     style="width: 100px;">

                  </td>
              </tr>
              <tr>
                  <td><strong>Image 2</strong></td>
                  <td>
                      @if($entry->image_2)
                          <img src="{{ asset('storage/' . $entry->image_2) }}" alt="Image 2" style="width: 100px;">
                      @else
                          No Image
                      @endif
                  </td>
              </tr>

              <!-- Add video_1 -->
              <tr>
                  <td><strong>Video 1</strong></td>
                  <td>{{ $entry->video_1 }}</td>
              </tr>

              <!-- Add numbers -->
              <tr>
                  <td><strong>Numbers</strong></td>
                  <td>{{ $entry->numbers }}</td>
              </tr>

              <!-- Add icon_1 -->
              <tr>
                  <td><strong>Icon 1</strong></td>
                  <td>{{ $entry->icon_1 }}</td>
              </tr>

              <!-- Add desc_1 -->
              <tr>
                  <td><strong>Description 1</strong></td>
                  <td>{{ $entry->desc_1 }}</td>
              </tr>

              <!-- Add video_2 -->
              <tr>
                  <td><strong>Video 2</strong></td>
                  <td>{{ $entry->video_2 }}</td>
              </tr>

              <!-- Add title_2 -->
              <tr>
                  <td><strong>Title 2</strong></td>
                  <td>{{ $entry->title_2 }}</td>
              </tr>

              <!-- Add desc_2 -->
              <tr>
                  <td><strong>Description 2</strong></td>
                  <td>{{ $entry->desc_2 }}</td>
              </tr>

              <tr>
                  <td colspan="2" class="text-center">
                      <!-- Button to open edit modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $entry->id }}">
                          Edit
                      </button>
                  </td>
              </tr>
              @endforeach
          </tbody>

    </table>

    <!-- Edit Modal -->
    @foreach ($aboutUsEntries as $entry)
    <div class="modal fade" id="editModal{{ $entry->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $entry->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('backend.about.update', $entry->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $entry->id }}">Edit About Us Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Title Input -->
                        <div class="form-group">
                            <label for="title{{ $entry->id }}">Title</label>
                            <input type="text" name="title" class="form-control" id="title{{ $entry->id }}" value="{{ $entry->title }}" required>
                        </div>

                        <!-- Description Input -->
                        <div class="form-group">
                            <label for="description{{ $entry->id }}">Description</label>
                            <textarea name="description" class="form-control" id="description{{ $entry->id }}" rows="4">{{ $entry->description }}</textarea>
                        </div>

                        <!-- Image 1 Input -->
                        <div class="form-group">
                            <label for="image_1{{ $entry->id }}">Image 1</label>
                            <input type="file" name="image_1" class="form-control" id="image_1{{ $entry->id }}">
                        </div>

                        <!-- Image 2 Input -->
                        <div class="form-group">
                            <label for="image_2{{ $entry->id }}">Image 2</label>
                            <input type="file" name="image_2" class="form-control" id="image_2{{ $entry->id }}">
                        </div>

                        <!-- Video 1 Input -->
                        <div class="form-group">
                            <label for="video_1{{ $entry->id }}">Video 1 URL</label>
                            <input type="text" name="video_1" class="form-control" id="video_1{{ $entry->id }}" value="{{ $entry->video_1 }}">
                        </div>

                        <!-- Numbers Input -->
                        <div class="form-group">
                            <label for="numbers{{ $entry->id }}">Numbers</label>
                            <input type="number" name="numbers" class="form-control" id="numbers{{ $entry->id }}" value="{{ $entry->numbers }}">
                        </div>

                        <!-- Icon 1 Input -->
                        <div class="form-group">
                            <label for="icon_1{{ $entry->id }}">Icon 1</label>
                            <input type="text" name="icon_1" class="form-control" id="icon_1{{ $entry->id }}" value="{{ $entry->icon_1 }}">
                        </div>

                        <!-- Description 1 Input -->
                        <div class="form-group">
                            <label for="desc_1{{ $entry->id }}">Description 1</label>
                            <textarea name="desc_1" class="form-control" id="desc_1{{ $entry->id }}" rows="4">{{ $entry->desc_1 }}</textarea>
                        </div>

                        <!-- Video 2 Input -->
                        <div class="form-group">
                            <label for="video_2{{ $entry->id }}">Video 2 URL</label>
                            <input type="text" name="video_2" class="form-control" id="video_2{{ $entry->id }}" value="{{ $entry->video_2 }}">
                        </div>

                        <!-- Title 2 Input -->
                        <div class="form-group">
                            <label for="title_2{{ $entry->id }}">Title 2</label>
                            <input type="text" name="title_2" class="form-control" id="title_2{{ $entry->id }}" value="{{ $entry->title_2 }}">
                        </div>

                        <!-- Description 2 Input -->
                        <div class="form-group">
                            <label for="desc_2{{ $entry->id }}">Description 2</label>
                            <textarea name="desc_2" class="form-control" id="desc_2{{ $entry->id }}" rows="4">{{ $entry->desc_2 }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('styles')
<style>
    .modal-dialog {
        max-width: 80%;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 95%;
        }

        .table th, .table td {
            font-size: 14px;
        }
    }
</style>
@endsection