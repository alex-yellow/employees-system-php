@extends('layouts.app', ['title' => 'Edit Employee'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Step 2: Choose Profession</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $employee) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="department_id" value="{{ $selectedDepartment }}">

                        <div class="form-group row mt-3">
                            <label for="profession" class="col-md-4 col-form-label text-md-right">Profession</label>
                            <div class="col-md-6">
                                <select id="profession" class="form-control @error('profession_id') is-invalid @enderror" name="profession_id" required>
                                    <option value="" selected disabled>Select Profession</option>
                                    @foreach($professions as $profession)
                                        <option value="{{ $profession->id }}" {{ $profession->id == $employee->profession_id ? 'selected' : '' }}>{{ $profession->name }}</option>
                                    @endforeach
                                </select>
                                @error('profession_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $employee->name) }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">Salary</label>
                            <div class="col-md-6">
                                <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $employee->salary) }}" required>
                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary mt-2">
                                    Update Employee
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
