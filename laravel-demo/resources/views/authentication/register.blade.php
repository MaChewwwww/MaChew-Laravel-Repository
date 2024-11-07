@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{route('authentication.registerSubmit')}}">

                        @csrf
                        @method('post')

                        <!-- Name Field -->
                        <div class="mb-3 form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" required>
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3 form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3 form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-3 form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <!-- Section Dropdown Field -->
                        <div class="mb-3 form-group">
                            <label for="section">Section</label>
                            <select id="section" name="section" class="form-control" required>
                                <option value="">-- Select Section --</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
