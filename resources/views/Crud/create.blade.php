@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <h1 class="text-center text-primary mx-4">Create User </h1>
        <form method="POST" action="{{ route('crud.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-10">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" id="firstname" name="firstname" class="form-control"
                    placeholder="Enter Your Input Please">
            </div>
            <div class="mb-3 col-10">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" id="lastname" name="lastname" class="form-control"
                    placeholder="Enter Your Input Please">
            </div>
            <div class="mb-3 col-10">
                <label for="email" class="form-label">First Name</label>
                <input type="email" id="email" name="email" class="form-control"
                    placeholder="Enter Your Input Please">
            </div>
            <div class="mb-3 col-10">
                <label for="avatar" class="form-label">Avatar</label>
                <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
            </div>
            <button type="submit" class="btn btn-success">Send</button>
        </form>

    </div>
@endsection
