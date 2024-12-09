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
            <!-- Customer Opinions Table Section -->
            <div id="customer-opinions-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Customer Opinions</h1>
                    <!-- Add New Customer Opinion Button -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomerOpinionModal">
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

                <!-- Responsive Customer Opinions Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Name</th>
                                <th>Job Title</th>
                                <th>Image</th>
                                <th>Opinion</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($customerOpinions as $opinion)
                            <tr>
                                <td>{{ $opinion->id }}</td>
                                <td>{{ $opinion->title }}</td>
                                <td>{{ $opinion->description }}</td>
                                <td>{{ $opinion->name }}</td>
                                <td>{{ $opinion->job_title }}</td>
                                <td>
                                    <!-- Display image if exists -->
                                    @if($opinion->image_url)
                                        <img src="{{ $opinion->image_url }}" alt="Opinion Image" style="width: 50px; height: 50px;">
                                    @endif
                                </td>
                                <td>{{ $opinion->opinion }}</td>
                                <td>
                                    <!-- Action Buttons -->
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewCustomerOpinionModal{{ $opinion->id }}">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCustomerOpinionModal{{ $opinion->id }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('customer-opinions.destroy', $opinion->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- View Customer Opinion Modal -->
                            <div class="modal fade" id="viewCustomerOpinionModal{{ $opinion->id }}" tabindex="-1" aria-labelledby="viewCustomerOpinionModalLabel{{ $opinion->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewCustomerOpinionModalLabel{{ $opinion->id }}">Customer Opinion Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Title:</strong> {{ $opinion->title }}</p>
                                            <p><strong>Description:</strong> {{ $opinion->description }}</p>
                                            <p><strong>Name:</strong> {{ $opinion->name }}</p>
                                            <p><strong>Job Title:</strong> {{ $opinion->job_title }}</p>
                                            <p><strong>Image:</strong>
                                            @if($opinion->image_url)
                                                <img src="{{ $opinion->image_url }}" alt="Image" style="width: 100px; height: 100px;">
                                            @endif
                                            </p>
                                            <p><strong>Opinion:</strong> {{ $opinion->opinion }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- Edit Customer Opinion Modal -->
                                <div class="modal fade" id="editCustomerOpinionModal{{ $opinion->id }}" tabindex="-1" aria-labelledby="editCustomerOpinionModalLabel{{ $opinion->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editCustomerOpinionModalLabel{{ $opinion->id }}">Edit Customer Opinion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('customer-opinions.update', $opinion->id) }}" method="POST">
                                               @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="title-{{ $opinion->id }}">Title</label>
                                                        <input type="text" name="title" id="title-{{ $opinion->id }}" class="form-control" value="{{ $opinion->title }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description-{{ $opinion->id }}">Description</label>
                                                        <textarea name="description" id="description-{{ $opinion->id }}" class="form-control">{{ $opinion->description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name-{{ $opinion->id }}">Name</label>
                                                        <input type="text" name="name" id="name-{{ $opinion->id }}" class="form-control" value="{{ $opinion->name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="job-title-{{ $opinion->id }}">Job Title</label>
                                                        <input type="text" name="job_title" id="job-title-{{ $opinion->id }}" class="form-control" value="{{ $opinion->job_title }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" class="form-control-file" id="image" name="image">
                                                        <img src="{{ asset('storage/' . $opinion->image) }}" alt="Current Image" style="width: 100px; height: 100px; margin-top: 10px;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="opinion-{{ $opinion->id }}">Opinion</label>
                                                        <textarea name="opinion" id="opinion-{{ $opinion->id }}" class="form-control" required>{{ $opinion->opinion }}</textarea>
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
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No customer opinions found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add Customer Opinion Modal -->
            <div class="modal fade" id="addCustomerOpinionModal" tabindex="-1" aria-labelledby="addCustomerOpinionModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCustomerOpinionModalLabel">Add New Customer Opinion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('customer-opinions.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="opinion">Opinion</label>
                                    <textarea class="form-control" id="opinion" name="opinion" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Opinion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


<script>
document.addEventListener("DOMContentLoaded", function () {
    // Load customer_opinions details into the view modal
    document.querySelectorAll('.view-customeropinion').forEach(button => {
        button.addEventListener('click', function () {
            const customer_opinionsId = this.dataset.id;
            fetch(`/categories/${customer_opinionsId}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('viewcustomeropinionContent').innerHTML = html;
                });
        });
    });

    // Load customer_opinions details into the edit modal
    document.querySelectorAll('.edit-customeropinion').forEach(button => {
        button.addEventListener('click', function () {
            const customer_opinionsId = this.dataset.id;
            fetch(`/categories/edit/${customer_opinionsId}`)
                .then(response => response.json())
                .then(customer_opinions => {
                    document.getElementById('editcustomeropinionForm').action = `/customer-opinions/${customer_opinionsId}`;
                    document.getElementById('edit_title_1').value = customer_opinions.title_1;
                    document.getElementById('edit_desc_1').value = customer_opinions.desc_1;
                    if (customer_opinions.icon_1) {
                        document.getElementById('current_icon').src = `/storage/${customer_opinions.icon_1}`;
                    }
                });
        });
    });

    // Set delete action URL
    document.querySelectorAll('.delete-customer_opinions').forEach(button => {
        button.addEventListener('click', function () {
            const customer_opinionsId = this.dataset.id;
            document.getElementById('deletecustomer_opinionsForm').action = `/customer-opinions/delete/${customer_opinionsId}`;
        });
    });
});
</script>
