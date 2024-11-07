@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Section</h1>

    <!-- Success Message -->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Create Section Button -->
    <div class="mb-3">
        <a href="{{ route('section.create') }}" class="btn btn-primary">Create New Section</a>
    </div>

    <!-- Sections Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Section Name</th>
                    <th>Year</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->academic_year }}</td>
                    <td>{{ $section->description }}</td>
                    <td>
                        <a href="{{ route('section.edit', ['section' => $section]) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('section.delete', ['section' => $section]) }}" onsubmit="return confirm('Are you sure you want to delete this section?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Logout Button -->
    <div class="mb-3">
        <form method="POST" action="{{route('authentication.logout')}}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
@endsection
