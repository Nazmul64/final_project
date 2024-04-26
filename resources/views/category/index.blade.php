
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Categoryi</div>
                @if (session('insert'))
                     <span class="alert alert-info">{{ session('insert') }}</span>
                @endif
                <div class="card-body">
                    <table class="table-bordered  table">
                        <thead>
                             <tr>
                                 <th>Category Name</th>
                                  <th>Category Status</th>
                                 <th>Category Tageline</th>
                                 <th>Category Photo</th>
                                 <th>Action</th>
                             </tr>
                        </thead>
                        <tbody>

                            @forelse ($categories as $category)
                              <tr>
                                  <td>{{ $category->category_name }}</td>
                                   <td>{{ $category->status }}</td>
                                  <td>{{ $category->category_tagline }}</td>
                                  <td>
                                     <img height="50" src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}">
                                  </td>
                                  <td class="d-flex ">
                                     <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info text-white">Edit</a>
                                     <a href="{{ route('category.show',$category->id) }}" class="btn btn-success mx-2 text-white"> Details</a>
                                     <form  class="mb-2" method="POST" action="{{ route('category.destroy',$category->id) }}">
                                        @csrf
                                        @method('DELETE')
                                         <button  class="btn btn-danger text-white  ">Delete</button>
                                     </form>
                                  </td>
                             </tr>
                             @empty
                             <tr class="text-center text-danger">
                                <td class="colspan="50">No record to show</td>
                             </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
