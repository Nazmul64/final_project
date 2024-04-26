@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
                <div class="card-body">
                    <table class="table-bordered table">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer )
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                 <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                              <td>
                                 <a  href="{{route('emailsingleoffer',$customer->id)}}" class="btn btn-info">send</a>
                              </td>
                           </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
