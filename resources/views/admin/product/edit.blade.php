
@extends('admin.master')


@section('title')
    Edit Product Page
@endsection



@section('body')

    <h1 class="text-success text-center">{{ session('message') }}</h1>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title mb-4">Edit Product Form</h1>

                    <form action="{{ route('product.update', [ 'id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label"> Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id">
                                    <option value="" selected disabled >-- Select Category Name --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : ''}}  >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Sub Category Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_id">
                                    <option value="" selected disabled > -- Select Sub Category Name --</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}" {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }} >{{ $sub_category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Brand Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id">
                                    <option value="" selected disabled > -- Select Brand Name --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }} >{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Unit Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id">
                                    <option value="" selected disabled > -- Select Unit Name --</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' : '' }} >{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Product Code</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $product->code }}" name="code" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Slug</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $product->slug }}" name="slug" class="form-control" id="horizontal-password-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Regular Price</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ $product->regular_price }}" name="regular_price" class="form-control" id="horizontal-password-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Selling Price</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ $product->selling_price }}" name="selling_price" class="form-control" id="horizontal-password-input">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Stock Amount</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ $product->stock_amount }}" name="stock_amount" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description" class="form-control" id="horizontal-email-input">{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" class="form-control summernote" id="horizontal-email-input">{{ $product->long_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Product Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file pb-1" id="horizontal-password-input">
                                <img src="{{ asset($product->image) }}" alt="" height="80" width="110">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Product Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" class="form-control-file pb-1" id="" multiple />
                                @foreach($product->otherImages as $otherImage)
                                <img src="{{ asset($otherImage->image) }}" alt="" height="80" width="110">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Product Information</button>
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


