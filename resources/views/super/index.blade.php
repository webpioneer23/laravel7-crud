@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Stats -->
                <div class="row">

                    <div class="col-xl-3 col-lg-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="media align-items-stretch">
                                        <div class="p-2 text-center bg-primary bg-darken-2">
                                            <i class="icon-list font-large-2 white"></i>
                                        </div>
                                        <div class="p-2 bg-gradient-x-primary  white media-body">
                                            <h5>Subsidiaries</h5>
                                            <h5 class="text-bold-400 mb-0">{{count($subsides)}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-danger bg-darken-2">
                                        <i class="icon-user font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-danger white media-body">
                                        <h5>Customers</h5>
                                        <h5 class="text-bold-400 mb-0">{{$customer_count}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-warning bg-darken-2">
                                        <i class="icon-basket-loaded font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-warning white media-body">
                                        <h5>Products</h5>
                                        <h5 class="text-bold-400 mb-0"> {{$product_count}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-success bg-darken-2">
                                        <i class="icon-wallet font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-success white media-body">
                                        <h5>Completed Products</h5>
                                        <h5 class="text-bold-400 mb-0">{{$completed_produt_count}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Stats -->
                <div class="row match-height">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Subsidiaries</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                        <thead>
                                            <tr>
                                                <th>Unique Key</th>
                                                <th>Owner Name</th>
                                                <th>Owner Email</th>
                                                <th>Total Customer</th>
                                                <th>Total Product</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subsides as $key => $value)
                                            <tr>
                                                <td class="text-truncate">{{$value->id}}</td>
                                                <td class="text-truncate">{{$value->name}}</td>
                                                <td class="text-truncate">{{$value->email}}</td>
                                                <td class="text-truncate">{{customer_count($value->id)}}</td>
                                                <td class="text-truncate">{{product_count($value->id)}}</td>
                                                <td class="text-truncate">{{date('Y-m-d', strtotime($value->created_at))}}</td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Product sale & buyers -->
                <div class="row match-height">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Customers</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Subsidiary</th>
                                                <th>Customer Name</th>
                                                <th>address</th>
                                                <th>phone_number</th>
                                                <th>updated_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recent_customers as $key => $value)
                                            @if($key < 5)
                                            <tr>
                                                <td class="text-truncate">{{$key+1}}</td>
                                                <td class="text-truncate">{{$value->subsidiary->name}}</td>
                                                <td class="text-truncate">{{$value->username}}</td>
                                                <td class="text-truncate">{{$value->address}}</td>
                                                <td class="text-truncate">{{$value->phone_number}}</td>
                                                <td class="text-truncate">{{date('Y-m-d', strtotime($value->updated_at))}}</td>
                                                
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Products</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Customer Name</th>
                                                <th>Progress</th>
                                                <th>Status</th>
                                                <th>Photo</th>
                                                <th>Update Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recent_products as $key => $value)
                                            @if($key < 10)
                                            <tr>
                                                <td class="text-truncate">{{$key+1}}</td>
                                                <td class="text-truncate">{{$value->customer->username?$value->customer->username:''}}</td>
                                                <td class="text-truncate">{{$value->progress}}</td>
                                                <td class="text-truncate">{{$value->status}}</td>
                                                <td class="text-truncate"><img src="{{$value->photo}}" width=40 /> </td>
                                                <td class="text-truncate">{{date('Y-m-d', strtotime($value->updated_at))}}</td>
                                               
                                            </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection