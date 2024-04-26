
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Category</div>
                @if (session('insert'))
                     <span class="alert alert-info">{{ session('insert') }}</span>
                @endif
                <div class="card-body">
                     <form method="post" action="{{ route('category.store') }}"enctype="multipart/form-data">
                        @csrf
                       <div class="mt-2">
                           <label>Category Name</label>
                           <input type="text"class="form-control @error('category_name') is-invalid @enderror "name="category_name">
                           @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                        <div class="mt-2">
                            <label>Category Tagline</label>
                            <input type="text"class="form-control  @error('category_tagline') is-invalid @enderror "name="category_tagline">
                            @error('category_tagline')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label>Category Photo</label>
                            <input type="file"class="form-control @error('category_photo') is-invalid @enderror  "name="category_photo">
                             @error('category_photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       <button type="submit" class="btn btn-success mt-2">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
