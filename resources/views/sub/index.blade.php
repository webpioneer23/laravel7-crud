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
                   
                    <div class="col-xl-4 col-lg-6 col-12">
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
                    <div class="col-xl-4 col-lg-6 col-12">
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
                    
                    <div class="col-xl-4 col-lg-6 col-12">
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
                                                <th>Unique Key</th>
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
                                                <td class="text-truncate">{{$value->unique_key}}</td>
                                                <td class="text-truncate">{{$value->customer->username}}</td>
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
                <!--/ Product sale & buyers -->
                <!--Recent Orders & Monthly Salse -->
                <!-- <div class="row match-height">
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Orders</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>Total paid invoices 240, unpaid 150. <span class="float-right"><a href="project-summary.html" target="_blank">Invoice Summary <i class="feather icon-arrow-right"></i></a></span></p>
                                </div>
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Invoice#</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-truncate">PO-10521</td>
                                                <td class="text-truncate"><a href="#">INV-001001</a></td>
                                                <td class="text-truncate">Elizabeth W.</td>
                                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                                <td class="text-truncate">$ 1200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">PO-532521</td>
                                                <td class="text-truncate"><a href="#">INV-01112</a></td>
                                                <td class="text-truncate">Doris R.</td>
                                                <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                                <td class="text-truncate">$ 5685.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">PO-05521</td>
                                                <td class="text-truncate"><a href="#">INV-001012</a></td>
                                                <td class="text-truncate">Andrew D.</td>
                                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                                <td class="text-truncate">$ 152.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">PO-15521</td>
                                                <td class="text-truncate"><a href="#">INV-001401</a></td>
                                                <td class="text-truncate">Megan S.</td>
                                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                                <td class="text-truncate">$ 1450.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-truncate">PO-32521</td>
                                                <td class="text-truncate"><a href="#">INV-008101</a></td>
                                                <td class="text-truncate">Walter R.</td>
                                                <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                                <td class="text-truncate">$ 685.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body sales-growth-chart">
                                    <div id="monthly-sales" class="height-250"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="chart-title mb-1 text-center">
                                    <h6>Total monthly Sales.</h6>
                                </div>
                                <div class="chart-stats text-center">
                                    <a href="#" class="btn btn-sm btn-primary mr-1">Statistics <i class="feather icon-bar-chart"></i></a> <span class="text-muted">for the last year.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--/Recent Orders & Monthly Salse -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection