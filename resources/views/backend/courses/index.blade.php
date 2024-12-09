@extends('backend.layout')

@section('main')

<div class="content-wrapper">
  <!-- Content Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Courses</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Courses</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Add/Edit Course Form -->
  <div class="container mt-5">
    <h1>{{ isset($course) ? 'Edit Course' : 'Add New Course' }}</h1>
    <form 
        action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" 
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($course))
            @method('PUT') <!-- Corrected from POST to PUT for updates -->
        @endif

        <div class="form-group">
            <label for="icon_1">Course Icon</label>
            <input 
                type="file" 
                class="form-control" 
                id="icon_1" 
                name="icon_1" 
                {{ isset($course) ? '' : 'required' }}>
            @if(isset($course) && $course->icon_1)
                <img src="{{ asset('storage/' . $course->icon_1) }}" alt="Current Icon" style="width: 100px; height: 100px;">
            @endif
        </div>

        <div class="form-group">
            <label for="title_1">Title</label>
            <input 
                type="text" 
                class="form-control" 
                id="title_1" 
                name="title_1" 
                value="{{ isset($course) ? $course->title_1 : '' }}" 
                required>
        </div>

        <div class="form-group">
            <label for="desc_1">Description</label>
            <textarea 
                class="form-control" 
                id="desc_1" 
                name="desc_1" 
                rows="3">{{ isset($course) ? $course->desc_1 : '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($course) ? 'Update' : 'Save' }}
        </button>
    </form>

    <hr>

    <!-- Courses List with Flash Messages -->
    <h2>Courses</h2>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Responsive Courses Table -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>
                        @if($course->icon_1)
                            <img src="{{ asset('storage/' . $course->icon_1) }}" alt="Icon" style="width: 50px; height: 50px;">
                        @else
                            No Icon
                        @endif
                    </td>
                    <td>{{ $course->title_1 }}</td>
                    <td>{{ Str::limit($course->desc_1, 50) }}</td>
                    <td>
                        <!-- View Button -->
                        <a href="#" 
                           class="btn btn-secondary btn-sm" 
                           data-toggle="modal" 
                           data-target="#viewCourseModal{{ $course->id }}">
                            <i class="fas fa-eye"></i> View
                        </a>

                        <!-- Edit Button -->
                        <a href="#" 
                           class="btn btn-info btn-sm" 
                           data-toggle="modal" 
                           data-target="#editCourseModal{{ $course->id }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Form -->
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Course Modal -->
                <div class="modal fade" id="editCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="editCourseModalLabel{{ $course->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCourseModalLabel{{ $course->id }}">Edit Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="modal-body">
                                    <!-- Title Input -->
                                    <div class="form-group">
                                        <label for="title_1">Title</label>
                                        <input type="text" class="form-control" id="title_1" name="title_1" value="{{ $course->title_1 }}" required>
                                    </div>

                                    <!-- Description Input -->
                                    <div class="form-group">
                                        <label for="desc_1">Description</label>
                                        <textarea class="form-control" id="desc_1" name="desc_1" rows="3">{{ $course->desc_1 }}</textarea>
                                    </div>

                                    <!-- Icon Input -->
                                    <div class="form-group">
                                        <label for="icon_1">Course Icon</label>
                                        <input type="file" class="form-control" id="icon_1" name="icon_1">
                                        @if($course->icon_1)
                                            <img src="{{ asset('storage/' . $course->icon_1) }}" alt="Current Icon" style="width: 100px; height: 100px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- View Course Modal -->
                <div class="modal fade" id="viewCourseModal{{ $course->id }}" tabindex="-1" aria-labelledby="viewCourseModalLabel{{ $course->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewCourseModalLabel{{ $course->id }}">View Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Title Display -->
                                <div class="form-group">
                                    <label for="title_1">Title</label>
                                    <input type="text" class="form-control" id="title_1" value="{{ $course->title_1 }}" disabled>
                                </div>

                                <!-- Description Display -->
                                <div class="form-group">
                                    <label for="desc_1">Description</label>
                                    <textarea class="form-control" id="desc_1" rows="3" disabled>{{ $course->desc_1 }}</textarea>
                                </div>

                                <!-- Icon Display -->
                                <div class="form-group">
                                    <label for="icon_1">Course Icon</label>
                                    @if($course->icon_1)
                                        <img src="{{ asset('storage/' . $course->icon_1) }}" alt="Course Icon" style="width: 100px; height: 100px;">
                                    @else
                                        <p>No Icon</p>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="5" class="text-center">No courses available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection


<script>
document.addEventListener("DOMContentLoaded", function () {
    // Load course details into the view modal
    document.querySelectorAll('.view-course').forEach(button => {
        button.addEventListener('click', function () {
            const courseId = this.dataset.id;
            fetch(`/courses/${courseId}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('viewCourseContent').innerHTML = html;
                });
        });
    });

    // Load course details into the edit modal
    document.querySelectorAll('.edit-course').forEach(button => {
        button.addEventListener('click', function () {
            const courseId = this.dataset.id;
            fetch(`/courses/edit/${courseId}`)
                .then(response => response.json())
                .then(course => {
                    document.getElementById('editCourseForm').action = `/courses/${courseId}`;
                    document.getElementById('edit_title_1').value = course.title_1;
                    document.getElementById('edit_desc_1').value = course.desc_1;
                    if (course.icon_1) {
                        document.getElementById('current_icon').src = `/storage/${course.icon_1}`;
                    }
                });
        });
    });

    // Set delete action URL
    document.querySelectorAll('.delete-course').forEach(button => {
        button.addEventListener('click', function () {
            const courseId = this.dataset.id;
            document.getElementById('deleteCourseForm').action = `/courses/delete/${courseId}`;
        });
    });
});
</script>

