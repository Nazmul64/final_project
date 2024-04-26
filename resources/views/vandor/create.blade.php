
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Vendor</div>
                @if (session('insert'))
                     <span class="alert alert-info">{{ session('insert') }}</span>
                @endif
                <div class="card-body">
                     <form method="post" action="{{ route('vandor.store') }}"enctype="multipart/form-data">
                        @csrf
                       <div class="mt-2">
                           <label>Vendor  Name</label>
                           <input type="text"class="form-control @error('vendor_name') is-invalid @enderror "name="vendor_name">
                           @error('vendor_name')
                                <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                        <div class="mt-2">
                            <label>vendor Phone_Number</label>
                            <input type="number"class="form-control  @error('vendor_phone') is-invalid @enderror "name="vendor_phone">
                            @error('vendor_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label>vendor Email</label>
                            <input type="email"class="form-control  @error('vendor_email') is-invalid @enderror "name="vendor_email">
                            @error('vendor_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                         <div class="mt-2">
                            <label>vendor Address</label>
                            <input type="text"class="form-control @error('category_photo') is-invalid @enderror  "name="vendor_address">
                             @error('vendor_address')
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
