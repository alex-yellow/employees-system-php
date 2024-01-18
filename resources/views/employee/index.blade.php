@extends('layouts.app', ['title' => 'Employee List'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Employee List</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Profession</th>
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No employees found.</td>
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
