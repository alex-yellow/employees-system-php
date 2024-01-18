@extends('layouts.app', ['title' => 'Edit employee'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Step 1: Choose Department</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('admin.editTwo', $employee) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                                <div class="col-md-6">
                                    <select id="department" class="form-control @error('department_id') is-invalid @enderror" name="department_id" required>
                                        <option value="" selected disabled>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mt-2">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
