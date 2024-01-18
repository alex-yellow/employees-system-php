@extends('layouts.app', ['title' => 'Admin Panel'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Panel</div>

                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <h2><a class="btn btn-success" href="{{ route('admin.createOne') }}">Add Employee</a></h2>
                        <h2><a class="btn btn-info" href="{{ route('department.index') }}">Manage Departments</a></h2>
                        <h2><a class="btn btn-warning" href="{{ route('profession.index') }}">Manage Professions</a></h2>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Salary</th>
                                <th scope="col">Department</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</th>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>{{ $employee->department->name }}</td>
                                <td>{{ $employee->profession->name }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('admin.editOne', $employee->id)}}">Edit</a>
                                    <form action="" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete employee?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No employees found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="links">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
