@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Create a Section</h1>

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

    <!-- Create Section Form -->
    <form method="POST" action="{{ route('section.store') }}" class="mt-4">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="name">Section Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
        </div>

        <div class="form-group">
            <label for="academic_year">Academic Year</label>
            <input type="number" name="academic_year" class="form-control" id="academic_year" placeholder="Academic Year" min="1000" max="9999" step="1" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" placeholder="Description" required></textarea>
        </div>

        <div class="mt-4 form-group">
            <button type="submit" class="btn btn-primary">Create Section</button>
        </div>
    </form>
</div>
@endsection
