@extends('admin.layouts.register')
@section('title', 'Create')

@section('content')
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                    alt="Sample photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"/>
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">Student registration form</h3>
                                    <form action="{{ route('post.register') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="inputAddress">First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                   placeholder="Full Name">
                                        </div>
                                        @error('first_name')
                                        <div class="alert alert-solid-danger alert-bold">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputAddress">Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                   placeholder="Full Name">
                                        </div>
                                        @error('last_name')
                                        <div class="alert alert-solid-danger alert-bold">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" class="form-control" name="pemail" placeholder="Email">
                                            @error('pemail')
                                            <div class="alert alert-solid-danger alert-bold">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Phone Number</label>
                                            <input type="text" class="form-control" name="ptelephone"
                                                   placeholder="Phone">
                                        </div>
                                        @error('ptelephone')
                                        <div class="alert alert-solid-danger alert-bold">{{ $message }}</div>
                                        @enderror
                                        <div class="d-flex justify-content-end pt-3">
                                            <a href="{{ route('home') }}" class="btn btn-light btn-lg"
                                               style="font-weight: 600">Back</a>
                                            <button type="submit" class="btn btn-warning btn-lg ms-2"
                                                    style="color: #fff; font-weight: bold">Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
