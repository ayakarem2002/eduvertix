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
            <!-- Categories Table Section -->
            <div id="categories-section">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Categories</h1>
                    <!-- Add New Category Button -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
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

                <!-- Responsive Categories Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th> <!-- Added Description Column -->
                                <th>Icon</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->description }}</td> <!-- Displaying Description -->
                                    <td>
                                        @if($category->icon)
                                            <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="width: 50px; height: 50px;">
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Action Buttons -->
                                        <a href="#" 
                                           class="btn btn-secondary btn-sm" 
                                           data-toggle="modal" 
                                           data-target="#viewCategoryModal{{ $category->id }}">
                                            <i class="fas fa-eye"></i> View
                                        </a>

                                        <a href="#" 
                                           class="btn btn-info btn-sm" 
                                           data-toggle="modal" 
                                           data-target="#editCategoryModal{{ $category->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('backend.categories.destroy', $category->id) }}" 
                                              method="POST" 
                                              style="display: inline;" 
                                              onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- View Category Modal -->
                                <div class="modal fade" id="viewCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="viewCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewCategoryModalLabel{{ $category->id }}">Category Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Title:</strong> {{ $category->title }}</p>
                                                <p><strong>Description:</strong>{{$category->description}}
                                                <p>
                                                    <strong>Icon:</strong>
                                                    @if($category->icon)
                                                        <img src="{{ asset('storage/' . $category->icon) }}" alt="Category Icon" style="width: 100px; height: 100px;">
                                                    @else
                                                        No Icon Available
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                <!-- Edit Category Modal -->
                <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('backend.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{ $category->title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" rows="3" required>{{ $category->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <input type="file" class="form-control-file" name="icon">
                                        @if($category->icon)
                                            <small class="text-muted">Current Icon: <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="width: 50px; height: 50px;"></small>
                                        @endif
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
                        <td colspan="5" class="text-center">No Categories Found</td>
                    </tr>
                @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Add Category Modal -->
                <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('backend.categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <input type="file" class="form-control-file" name="icon">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
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
document.addEventListener("DOMContentLoaded", function () {
    // Load category details into the view modal
    document.querySelectorAll('.view-category').forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = this.dataset.id;
            fetch(`/categories/${categoryId}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('viewcategoryContent').innerHTML = html;
                });
        });
    });

    // Load category details into the edit modal
    document.querySelectorAll('.edit-category').forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = this.dataset.id;
            fetch(`/categories/edit/${categoryId}`)
                .then(response => response.json())
                .then(category => {
                    document.getElementById('editcategoryForm').action = `/categories/${categoryId}`;
                    document.getElementById('edit_title_1').value = category.title_1;
                    document.getElementById('edit_desc_1').value = category.desc_1;
                    if (category.icon_1) {
                        document.getElementById('current_icon').src = `/storage/${category.icon_1}`;
                    }
                });
        });
    });

    // Set delete action URL
    document.querySelectorAll('.delete-category').forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = this.dataset.id;
            document.getElementById('deletecategoryForm').action = `/categories/delete/${categoryId}`;
        });
    });
});
</script>
