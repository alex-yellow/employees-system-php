@extends('layouts.app', ['title' => 'Professions'])

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Professions</div>

                    <div class="card-body">
                        <h2><a class="btn btn-success" href="{{ route('profession.create') }}">Add Profession</a></h2>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($professions as $profession)
                                    <tr>
                                        <th scope="row">{{ $profession->id }}</th>
                                        <td>{{ $profession->name }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('profession.edit', ['profession' => $profession]) }}">Edit</a>
                                            <form action="{{ route('profession.delete', ['profession' => $profession]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete profession?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No professions found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <h2><a class="btn btn-primary" href="{{ route('admin.index') }}">Admin Panel</a></h2>
                        <div class="links">
                            {{ $professions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
