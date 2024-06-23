@extends('admin.master')


@section('title')
    Edit Sub Category Page
@endsection



@section('body')

    <h1 class="text-success text-center">{{ session('message') }}</h1>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Edit Sub Category Form</h1>

                    <form action="{{ route('sub-category.update',[ 'id' => $subCategory->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Category Name</label>
                            <div class="col-sm-9">

                                <select class="form-control" name="category_id">
                                    <option value="" selected disabled>-- Select Category Name --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected': '' }} >{{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $subCategory->name }}" class="form-control" id="horizontal-firstname-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Sub Category Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="horizontal-email-input">{{ $subCategory->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Sub Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                                <img src="{{ asset($subCategory->image) }}" alt="" height="100" width="130">
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Sub Category Info</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->



@endsection


