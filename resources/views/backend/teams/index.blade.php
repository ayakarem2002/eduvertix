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
            <!-- Teams Table Section -->
            <div id="Teams-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Teams</h1>
                    <!-- Add New Team Button -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addTeamModal">
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

                <!-- Teams Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Job Title</th>
                                <th>Image</th>
                                <th>Social Links</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->title }}</td>
                                    <td>{{ $team->job_title }}</td>
                                    <td>
                                        @if($team->image)
                                            <img src="{{ asset('storage/' . $team->image) }}" alt="Image" style="width: 50px; height: 50px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ $team->facebook }}" target="_blank">Facebook</a> |
                                        <a href="{{ $team->twitter }}" target="_blank">Twitter</a> |
                                        <a href="{{ $team->instagram }}" target="_blank">Instagram</a> |
                                        <a href="{{ $team->linkedin }}" target="_blank">LinkedIn</a>
                                    </td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editTeamModal{{ $team->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <!-- Delete Form -->
                                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Team Modal -->
                                <div class="modal fade" id="editTeamModal{{ $team->id }}" tabindex="-1" aria-labelledby="editTeamModalLabel{{ $team->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editTeamModalLabel{{ $team->id }}">Edit Team</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{ $team->title }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="job_title">Job Title</label>
                                                        <input type="text" class="form-control" name="job_title" value="{{ $team->job_title }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control-file" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook</label>
                                                        <input type="url" class="form-control" name="facebook" value="{{ $team->facebook }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twitter">Twitter</label>
                                                        <input type="url" class="form-control" name="twitter" value="{{ $team->twitter }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="instagram">Instagram</label>
                                                        <input type="url" class="form-control" name="instagram" value="{{ $team->instagram }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="linkedin">LinkedIn</label>
                                                        <input type="url" class="form-control" name="linkedin" value="{{ $team->linkedin }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Add Team Modal -->
                <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTeamModalLabel">Add New Team</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="job_title">Job Title</label>
                                        <input type="text" class="form-control" name="job_title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control-file" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="url" class="form-control" name="facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="url" class="form-control" name="twitter">
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="url" class="form-control" name="instagram">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="url" class="form-control" name="linkedin">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Team</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add Team Form Submission
        document.getElementById('addTeamForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission
            const formData = new FormData(this);
            
            fetch("{{ route('teams.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Team member added successfully!');
                    location.reload(); // Reload page to update table
                } else {
                    alert('Failed to add team member.');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        // Edit Team Form Submission
        document.querySelectorAll('.editTeamForm').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent default form submission
                const formData = new FormData(this);
                const teamId = form.dataset.id;

                fetch(`{{ url('teams') }}/${teamId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-HTTP-Method-Override': 'PUT' // Laravel requires this for PUT/PATCH
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Team member updated successfully!');
                        location.reload(); // Reload page to update table
                    } else {
                        alert('Failed to update team member.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        // Delete Team Member
        document.querySelectorAll('.deleteTeamForm').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent default form submission
                const confirmed = confirm('Are you sure you want to delete this team member?');
                if (!confirmed) return;

                const teamId = form.dataset.id;

                fetch(`{{ url('teams') }}/${teamId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-HTTP-Method-Override': 'DELETE' // Laravel requires this for DELETE
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Team member deleted successfully!');
                        location.reload(); // Reload page to update table
                    } else {
                        alert('Failed to delete team member.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        // Reset Add Modal Form on Close
        $('#addTeamModal').on('hidden.bs.modal', function () {
            this.querySelector('form').reset(); // Clear form inputs
        });

        // Prefill Edit Modal Form
        document.querySelectorAll('.editTeamBtn').forEach(button => {
            button.addEventListener('click', function () {
                const teamId = this.dataset.id;

                fetch(`{{ url('teams') }}/${teamId}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const modal = document.getElementById(`editTeamModal${teamId}`);
                            modal.querySelector('[name="title"]').value = data.team.title;
                            modal.querySelector('[name="job_title"]').value = data.team.job_title;
                            modal.querySelector('[name="facebook"]').value = data.team.facebook;
                            modal.querySelector('[name="twitter"]').value = data.team.twitter;
                            modal.querySelector('[name="instagram"]').value = data.team.instagram;
                            modal.querySelector('[name="linkedin"]').value = data.team.linkedin;
                        } else {
                            alert('Failed to fetch team details.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
