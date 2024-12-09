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
            <!-- Settings Table Section -->
            <div id="Settings-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Settings</h1>
                </div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Settings Table -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Social Links</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($settings as $setting)
                    <tr>
                        <td>{{ $setting->id }}</td>
                        <td>
                            @if($setting->icon)
                                <img src="{{ asset('storage/' . $setting->icon) }}" alt="Icon" style="width: 50px; height: 50px;">
                            @else
                                No Icon
                            @endif
                        </td>
                        <td>{{ $setting->title }}</td>
                        <td>{{ $setting->desc }}</td>
                        <td>
                            <a href="{{ $setting->facebook }}" target="_blank">Facebook</a> |
                            <a href="{{ $setting->twitter }}" target="_blank">Twitter</a> |
                            <a href="{{ $setting->instagram }}" target="_blank">Instagram</a> |
                            <a href="{{ $setting->linkedin }}" target="_blank">LinkedIn</a>
                        </td>
                        <td>
                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewSettingModal{{ $setting->id }}">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editSettingModal{{ $setting->id }}">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form action="{{ route('backend.settings.destroy', $setting->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- View Modal -->
                    <div class="modal fade" id="viewSettingModal{{ $setting->id }}" tabindex="-1" aria-labelledby="viewSettingModalLabel{{ $setting->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewSettingModalLabel{{ $setting->id }}">View Setting</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Title:</strong> {{ $setting->title }}</p>
                                    <p><strong>Description:</strong> {{ $setting->desc }}</p>
                                    <p><strong>Facebook:</strong> <a href="{{ $setting->facebook }}">{{ $setting->facebook }}</a></p>
                                    <p><strong>Twitter:</strong> <a href="{{ $setting->twitter }}">{{ $setting->twitter }}</a></p>
                                    <p><strong>Instagram:</strong> <a href="{{ $setting->instagram }}">{{ $setting->instagram }}</a></p>
                                    <p><strong>LinkedIn:</strong> <a href="{{ $setting->linkedin }}">{{ $setting->linkedin }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editSettingModal{{ $setting->id }}" tabindex="-1" aria-labelledby="editSettingModalLabel{{ $setting->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('backend.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSettingModalLabel{{ $setting->id }}">Edit Setting</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="icon">Icon</label>
                                            <input type="file" name="icon" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" value="{{ $setting->title }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Description</label>
                                            <textarea name="desc" class="form-control" rows="4" required>{{ $setting->desc }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="url" name="facebook" value="{{ $setting->facebook }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="url" name="twitter" value="{{ $setting->twitter }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <input type="url" name="instagram" value="{{ $setting->instagram }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="linkedin">LinkedIn</label>
                                            <input type="url" name="linkedin" value="{{ $setting->linkedin }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addSettingModal" tabindex="-1" aria-labelledby="addSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('backend.settings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSettingModalLabel">Add Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="url" name="facebook" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="url" name="twitter" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="url" name="instagram" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="url" name="linkedin" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Setting</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
