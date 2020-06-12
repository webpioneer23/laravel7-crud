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
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered base-style">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Unique Key</th>
                                                    <th>Photo</th>
                                                    <th>Customer</th>
                                                    <th>Subsideary</th>
                                                    <th>Progress</th>
                                                    <th>Status</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $key =>$value)
                                                <tr>
                                                    <td> {{$key+1}} </td>
                                                    <td>{{$value->unique_key}}</td>
                                                    <td class="text-center"><img src="{{$value->photo}}" width=40/></td>
                                                    <td>{{$value->customer->username}}</td>
                                                    <td>{{$value->subsidiary->name}}</td>
                                                    <td>{{$value->progress}}</td>
                                                    <td>{{$value->status}}</td>
                                                    <td>{{date('Y-m-d', strtotime($value->created_at))}}</td>
                                                    <td>
                                                    <form action="{{ route('admin-product.destroy', $value) }}" method="post" id="userDelf{{$value->id}}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{route('admin-product.edit', $value->id)}}"><i class="feather icon-edit-2 ml-2 mr-2"></i></a>
                                                        <a class="text-danger" data-toggle="modal" data-target=""><i  onclick="confirm('{{ __("Are you sure you want to delete it???") }}') ? deleteUser({{$value->id}}) : ' '" class="feather icon-trash-2 mr-2"></i></a>

                                                        <a href="{{route('pdf-download',$value->id)}}"><i class="fa fa-download"></i></a>
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