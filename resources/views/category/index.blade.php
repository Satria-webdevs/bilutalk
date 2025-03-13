@extends('layout.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="pc-container mt-5">
        <div class="pc-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Add Category Button -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalAddCategory">
                                Add Category
                            </button>

                            <!-- Add Category Modal -->
                            <div class="modal fade" id="modalAddCategory" tabindex="-1"
                                aria-labelledby="modalAddCategoryLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalAddCategoryLabel">Add New Category</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('categories.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="categoryName" class="form-label">Category Name</label>
                                                    <input type="text" class="form-control" name="category_name"
                                                        placeholder="Enter category name" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Table -->
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $index => $category)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                <!-- Edit Category Button -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditCategory{{ $category->id }}">
                                                    Edit
                                                </button>

                                                <!-- Edit Category Modal -->
                                                <div class="modal fade" id="modalEditCategory{{ $category->id }}"
                                                    tabindex="-1" aria-labelledby="modalEditCategoryLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="modalEditCategoryLabel">
                                                                    Edit Category
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('categories.update', $category->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="categoryName"
                                                                            class="form-label">Category Name</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ $category->category_name }}"
                                                                            name="category_name"
                                                                            placeholder="Enter category name" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Category Form -->
                                                <form
                                                    onsubmit="return confirm('Are you sure you want to delete this category?')"
                                                    action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No categories found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Bootstrap 5 version included) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Optional: Clear form when Cancel button is clicked (ensure the form ID matches)
        document.getElementById('cancelButton')?.addEventListener('click', function() {
            document.getElementById('categoryForm')?.reset();
        });
    </script>
@endsection
