@extends('layouts.app', ['title' => 'Departments'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Departments</div>

                    <div class="card-body">
                        <h2><a class="btn btn-success" href="{{ route('department.create') }}">Add Department</a></h2>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($departments as $department)
                                    <tr>
                                        <th scope="row">{{ $department->id }}</th>
                                        <td>{{ $department->name }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('department.edit', $department->id) }}">Edit</a>
                                            <form action="{{ route('department.delete', $department->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete department?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No departments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h2><a class="btn btn-primary" href="{{ route('admin.index') }}">Admin Panel</a></h2>
                        <div class="links">
                            {{ $departments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
