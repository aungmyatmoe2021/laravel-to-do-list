@extends('layouts.master')
@section('title','Todo - Show All Page')
@section('content')
    <section class="vh-80" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>
                            @if (session('successmessage'))
                                <div class="alert theme-success" role="alert">
                                    <p>{{ session('successmessage') }}</p>
                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @elseif (session('errormessage'))
                                <div class="alert theme-danger" role="alert">
                                    <p>{{ session('errormessage') }}</p>
                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <table class='table mb-4'>
                                <thead>
                                    <tr>
                                        <th scope='col'>No.</th>
                                        <th scope='col'>Title</th>
                                        <th scope='col'>Description</th>
                                        <th scope='col'>Status</th>
                                        <th scope='col'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td>{{$todo->id}}</td>
                                            <td>{{$todo->title}}</td>
                                            <td>{{$todo->description}}</td>
                                            <td><input type="checkbox" id="check" class="check" @checked($todo->status == 1) @disabled(true) /></td>
                                            <td>
                                                <a href='/todo/{{$todo->id}}/edit' class="btn-solid theme-primary btn-sm">Edit</a>
                                                <form action="/todo/{{ $todo->id }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    <button type="submit" class="btn-solid theme-danger btn-sm" onclick="return confirm('Are you sure delete?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4 d-flex justify-content-center">
                                <a href='/todo/create' class="btn-solid theme-success">Add New Task</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-center">
                {{ $todos->links() }}
            </div>
    </section>
@endsection