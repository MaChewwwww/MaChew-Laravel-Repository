@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit a Section</h1>

    <!-- Display Validation Errors -->
    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Edit Section Form -->
    <form method="POST" action="{{ route('section.update', ['section' => $section]) }}" class="mt-4">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Section Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $section->name }}" required>
        </div>

        <div class="form-group">
            <label for="academic_year">Academic Year</label>
            <input type="number" name="academic_year" class="form-control" id="academic_year" placeholder="Academic Year" min="1000" max="9999" value="{{ $section->academic_year }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Description" required>{{ $section->description }}</textarea>
        </div>

        <div class="mt-4 form-group">
            <button type="submit" class="btn btn-primary">Update Section</button>
        </div>
    </form>
</div>
@endsection
