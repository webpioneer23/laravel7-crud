@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <div class="users-list-table">
                        <div class="card">
                            <div class="card-head">
                                <div class="col-xl-3 col-lg-12" style="margin-top: 20px; float: right; color:white;">
                                    <a href="{{route('customer.create')}}" class="btn btn-primary btn-block">Create Customer</a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered base-style">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>username</th>
                                                    <th>address</th>
                                                    <th>Phone Number</th>
                                                    <th>Created Date</th>
                                                    <th>edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($customers as $key =>$value)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$value->username}}</a>
                                                    </td>
                                                    <td>{{$value->address}}</td>
                                                    <td>{{$value->phone_number}}</td>
                                                    <td>{{date('Y-m-d', strtotime($value->created_at))}}</td>
                                                    <td>
                                                    <form action="{{ route('customer.destroy', $value) }}" method="post" id="userDelf{{$value->id}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('customer.edit', $value->id)}}"><i class="feather icon-edit-2"></i></a>
                                                        <a class="text-danger" data-toggle="modal" data-target=""><i  onclick="confirm('{{ __("Are you sure you want to delete it???") }}') ? deleteUser({{$value->id}}) : ' '" class="feather icon-trash-2"></i></a>
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- datatable ends -->
                                    <script>
                                        function deleteUser(user_id){
                                            document.getElementById('userDelf'+user_id).submit();
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
    
@endsection