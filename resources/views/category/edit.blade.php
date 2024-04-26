
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Category</div>
                @if (session('insert'))
                     <span class="alert alert-info">{{ session('insert') }}</span>
                @endif
                <div class="card-body">
                     <form method="post" action="{{ route('category.update',$categories->id) }}"enctype="multipart/form-data">
                        @method('PATCH')
                         <div class="mt-2">
                            <label>Status</label>
                           <select name="status" class="form-control">
                               <option value="show"{{$categories->status=='show'?'selected':''}}>show</option>
                               <option value="hide"{{$categories->status=='hide'?'selected':''}}>hide</option>
                           </select>
                       </div>
                        @csrf
                       <div class="mt-2">
                           <label>Category Name</label>
                           <input type="text"class="form-control @error('category_name') is-invalid @enderror "name="category_name"value="{{ $categories->category_name }}">
                           @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                       <div class="mt-2">
                           <label>Category Tagline</label>
                           <input type="text"class="form-control @error('category_name') is-invalid @enderror "name="category_tagline"value="{{ $categories->category_tagline }}">
                           @error('category_tagline')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                        <div class="mt-2">
                            <label> Old Category Tagline</label><br>
                            <img height="50" src="{{ asset('uploads/category_photos') }}/{{ $categories->category_photo }}">
                            @error('category_tagline')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label> New Category Photo</label>
                            <input type="file"class="form-control @error('new_category_photo') is-invalid @enderror  "name="new_category_photo"value="{{ $categories->category_photo }}">
                             @error('new_category_photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                       <button type="submit" class="btn btn-success mt-2 text-white">{{ $categories->category_name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
