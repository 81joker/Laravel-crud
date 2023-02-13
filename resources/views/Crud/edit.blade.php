@extends('layouts.app')

@section('content')
    <h1 class=" text-center text-primary mx-4">Hallloooo raghed </h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Avatar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <form action="{{ route('crud.update', $crud->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <th>{{ $crud->id }}</th>
                            <th><input type="text" name="firstname" value="{{ $crud->firstname }}"></th>
                            <th><input type="text" name="lastname" value="{{ $crud->lastname }}"></th>
                            <th><input type="email" name="email" value="{{ $crud->email }}"></th>
                            <th>
                                @if ($crud->avatar)
                                    <img src="{{ asset('image/' . $crud->avatar) }}" alt="{{ $crud->firstname }}"
                                        class="rounded-circle "
                                        style="width: 80px;height: 80px; padding: 10px; margin: 0px;">
                                @else
                                    <img src="{{ asset('image/laravel.jpeg') }}" alt="{{ $crud->firstname }}"
                                        class="rounded-circle "
                                        style="width: 80px;height: 80px; padding: 10px; margin: 0px;">
                                @endif
                                <input id="avatar" type="file" class="form-control w-5" name="avatar"
                                    value="{{ old('avatar') }}">

                            </th>

                    </tr>
                </tbody>

            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
