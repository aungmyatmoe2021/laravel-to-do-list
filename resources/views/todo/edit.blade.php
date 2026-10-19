@extends('layouts.master')
@section('title','Todo - Edit Page')
@section('content')
    <section class="vh-100" style="background-color: #eee;">
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

                    <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" action="/todo/{{$todo->id}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="col-12">
                            <label class="form-label" for="title">Enter Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $todo->title) }}" name="title"/>
                            @error('title')
                                <div class="fg-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="description">Enter Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $todo->description) }}" name="description"/>
                            @error('description')
                                <div class="fg-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 d-flex align-item-center">
                            <label class="form-label" for="description">Update Status</label>
                            <input type="checkbox" name="status" class="check mx-5" @checked($todo->status == 1) />
                            @error('status')
                                <div class="fg-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn-solid theme-primary">Update to Task</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection