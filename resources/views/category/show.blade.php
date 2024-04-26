
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
                    <table class="table-bordered table">
                        <thead>
                             <tr>
                                 <th>Category Name</th>
                                 <th>Category Tageline</th>
                                 <th>Category Photo</th>
                             </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $categories->category_name }}</td>
                                <td>{{ $categories->category_tagline }}</td>
                                <td>
                                    <img height="50" src="{{ asset('uploads/category_photos') }}/{{ $categories->category_photo }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
