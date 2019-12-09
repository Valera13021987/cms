@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">My profile</div>
        <div class="card-body">
            @include('partials.errors')
            <form action="{{ route('users.update-profile') }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="about">About Me</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->about }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update profile</button>
            </form>
        </div>
    </div>
@endsection
