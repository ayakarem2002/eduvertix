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
            <!-- Contacts Table Section -->
            <div id="Contacts-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Contacts</h1>
                </div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Contact Form -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addContactModal">
        <i class="fas fa-plus"></i> Add Contact Message
    </button>

    <!-- Contact Messages Table -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Topic</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->fullname }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->topic }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>
                            <form action="{{ route('backend.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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

    <!-- Add Contact Modal -->
    <div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="addContactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContactModalLabel">Add Contact Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('backend.contacts.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input type="text" class="form-control" id="topic" name="topic" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
