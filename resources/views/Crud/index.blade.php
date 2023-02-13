@extends('layouts.app')

@section('content')
    <h1 class=" text-center text-primary mx-4">Hallloooo raghed </h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cruds as $crud)
                        <tr>
                            <th>{{ $crud->id }}</th>
                            <th>{{ $crud->firstname }}</th>
                            <th>{{ $crud->lastname }}</th>
                            <th>{{ $crud->email }}</th>
                            <th class="text-center w-20">
                                @if ($crud->avatar)
                                    <img src="{{ asset('image/' . $crud->avatar) }}" alt="{{ $crud->firstname }}"
                                        class="rounded-circle "
                                        style="width: 80px;height: 80px; padding: 10px; margin: 0px;">
                                @else
                                    <img src="{{ asset('image/laravel.jpeg') }}" alt="{{ $crud->firstname }}"
                                        class="rounded-circle "
                                        style="width: 80px;height: 80px; padding: 10px; margin: 0px;">
                                @endif
                            </th>
                            <th class="d-flex justify-content-around">
                                {{-- <a class="btn btn-danger">Delete</a> --}}
                                <a href="crud/{{ $crud->id }}/edit" class="btn btn-success">Edit</a>


                                {{-- <form action="{{ route('crud.destroy', $crud->id) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}

                                <form action="{{ route('crud.destroy', $crud->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="crud/create" class="btn btn-info">Create User</a>
        </div>
    </div>
@endsection
