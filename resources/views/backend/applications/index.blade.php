@extends('backend.layout')

@section('main')
<div class="container-fluid" style="display: flex; min-height: 100vh;">
    <!-- Sidebar -->
    <div id="sidebar" style="width: 250px; background-color: #f8f9fa; flex-shrink: 0;">
        <!-- Sidebar content -->
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1" style="padding: 20px;">
        <div class="w-100" style="max-width: 1200px; margin: auto;">
            <!-- Applications Table Section -->
            <div id="Applications-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Applications</h1>
                    <!-- Add New Application Button -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addApplicationModal">
                        <i class="fas fa-plus"></i> Add New
                    </button>
                </div>

                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Applications Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>{{ $application->title }}</td>
                                    <td>{{ $application->description }}</td>
                                    <td>
                                        @if($application->image)
                                            <img src="{{ asset('storage/' . $application->image) }}" alt="Image" style="width: 50px; height: 50px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <!-- View Button -->
                                        <a href="#" 
                                           class="btn btn-secondary btn-sm" 
                                           data-toggle="modal" 
                                           data-target="#viewApplicationModal{{ $application->id }}">
                                            <i class="fas fa-eye"></i> View
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="#" 
                                           class="btn btn-info btn-sm" 
                                           data-toggle="modal" 
                                           data-target="#editApplicationModal{{ $application->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
                                        <!-- Delete Form -->
                                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
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

<!-- Add Application Modal -->
<div class="modal fade" id="addApplicationModal" tabindex="-1" aria-labelledby="addApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addApplicationModalLabel">Add New Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Application</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Application Modal -->
@foreach($applications as $application)
    <div class="modal fade" id="viewApplicationModal{{ $application->id }}" tabindex="-1" aria-labelledby="viewApplicationModalLabel{{ $application->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewApplicationModalLabel{{ $application->id }}">Application Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Title:</strong> {{ $application->title }}</p>
                    <p><strong>Description:</strong> {{ $application->description }}</p>
                    <p><strong>Image:</strong>
                    @if($application->image)
                        <img src="{{ asset('storage/' . $application->image) }}" alt="Image" style="width: 50px; height: 50px;">
                    @else
                        No Image
                    @endif

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Edit Application Modal -->
@foreach($applications as $application)
    <div class="modal fade" id="editApplicationModal{{ $application->id }}" tabindex="-1" aria-labelledby="editApplicationModalLabel{{ $application->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editApplicationModalLabel{{ $application->id }}">Edit Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $application->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $application->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <img src="{{ asset('storage/' . $application->image) }}" alt="Current Image" style="width: 100px; height: 100px; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Load Applications details into the view modal
    document.querySelectorAll('.view-Application').forEach(button => {
        button.addEventListener('click', function () {
            const ApplicationsId = this.dataset.id;
            fetch(`/Applications/${ApplicationsId}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('viewApplicationContent').innerHTML = html;
                });
        });
    });

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

    // Load Applications details into the edit modal
    document.querySelectorAll('.edit-Application').forEach(button => {
        button.addEventListener('click', function () {
            const ApplicationsId = this.dataset.id;
            fetch(`/Applications/edit/${ApplicationsId}`)
                .then(response => response.json())
                .then(Applications => {
                    document.getElementById('editApplicationForm').action = `/applications/${ApplicationsId}`;
                    document.getElementById('edit_title_1').value = Applications.title_1;
                    document.getElementById('edit_desc_1').value = Applications.desc_1;
                    if (Applications.icon_1) {
                        document.getElementById('current_icon').src = `/storage/${Applications.icon_1}`;
                    }
                });
        });
    });

    // Set delete action URL
    document.querySelectorAll('.delete-Applications').forEach(button => {
        button.addEventListener('click', function () {
            const ApplicationsId = this.dataset.id;
            document.getElementById('deleteApplicationsForm').action = `/customer-opinions/delete/${ApplicationsId}`;
        });
    });
});
</script>