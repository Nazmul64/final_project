
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Product</div>
                @if (session('insert'))
                     <span class="alert alert-info">{{ session('insert') }}</span>
                @endif
                <div class="card-body">
                     <form method="post" action="{{ route('product.store') }}"enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                           <label>Category Name</label>
                           <select name="category_id" class="form-control">
                                <option value="" >Select One</option>
                                @foreach ($active_category as $active_category )
                                    <option value="{{ $active_category->id }}">{{ $active_category->category_name }}</option>
                                @endforeach
                           </select>
                       </div>
                       <div class="mt-2">
                           <label>Product  Name</label>
                           <input type="text"class="form-control @error('product_name') is-invalid @enderror "name="product_name">
                           @error('product_name')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                        <div class="mt-2">
                           <label>Product  Price</label>
                           <input type="text"class="form-control @error('product_price') is-invalid @enderror "name="product_price">
                           @error('product_price')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                        <div class="mt-2">
                           <label> Product short description</label>
                           <textarea type="text"class="form-control @error('short_product_description') is-invalid @enderror " rows="2" name="short_product_description"></textarea>
                           @error('short_product_description ')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                        <div class="mt-2">
                           <label> Product Full description</label>
                           <textarea type="text"class="form-control @error('full_product_description') is-invalid @enderror " rows="5" name="full_product_description"></textarea>
                           @error('full_product_description ')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>

                        <div class="mt-2">
                            <label>Product Code</label>
                            <input type="text"class="form-control  @error('product_code') is-invalid @enderror "name="product_code">
                            @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="mt-2">
                            <label>product_photo</label>
                            <input type="file"class="form-control @error('category_photo') is-invalid @enderror  "name="product_photo">
                             @error('product_photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="mt-2">
                            <label>New </label>
                            <input type="text"class="form-control @error('new') is-invalid @enderror  "name="new">
                             @error('new')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                       <button type="submit" class="btn btn-success mt-2">Add New Vendor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
