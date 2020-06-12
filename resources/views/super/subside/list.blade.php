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
                            <!-- <div class="card-head">
                                <div class="col-xl-3 col-lg-12" style="margin-top: 20px; float: right; color:white;">
                                    <a href="{{route('product.create')}}" class="btn btn-primary btn-block">Create Product</a>
                                </div>
                            </div> -->
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered base-style">
                                            <thead>
                                                <tr>
                                                    <th>Unique Key</th>
                                                    <th>Owner Name</th>
                                                    <th>Owner Email</th>
                                                    <th>Total Customer</th>
                                                    <th>Total Product</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($results as $key => $value)
                                                <tr>
                                                    <td class="text-truncate">{{$value->id}}</td>
                                                    <td class="text-truncate">{{$value->name}}</td>
                                                    <td class="text-truncate">{{$value->email}}</td>
                                                    <td class="text-truncate">{{customer_count($value->id)}}</td>
                                                    <td class="text-truncate">{{product_count($value->id)}}</td>
                                                    <td class="text-truncate">{{date('Y-m-d', strtotime($value->created_at))}}</td>
                                                    <td>
                                                    <form action="{{ route('admin-subsidiary.destroy', $value) }}" method="post" id="userDelf{{$value->id}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('admin-subsidiary.edit', $value->id)}}"><i class="feather icon-edit-2 mr-2 ml-2"></i></a>
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