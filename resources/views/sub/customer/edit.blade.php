@extends('layouts.app')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-colored-controls">Customer Profile</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    
                                    <form class="form form-horizontal" method="post" action="{{route('customer.update',$result->id)}}">
                                        @csrf
                                        @method('patch')
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput3">Username</label>
                                                        <div class="col-md-9">
                                                            <input type="text" value="{{$result->username}}" id="username" class="form-control border-primary" placeholder="Username" name="username" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput4">Address</label>
                                                        <div class="col-md-9">
                                                            <input type="text" value="{{$result->address}}"  id="address" class="form-control border-primary" placeholder="Address" name="address" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h4 class="form-section"><i class="feather icon-mail"></i> Contact Info & Bio</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput5">Email</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control border-primary" type="email" placeholder="email" id="userinput5">
                                                        </div>
                                                    </div> -->

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput6" required data-validation-required-message="This field is required">Phone Number</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control border-primary" value="{{$result->phone_number}}"   type="text" placeholder="Phone Number" id="phone_number" name="phone_number" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>

                                                   
                                                </div>
                                              
                                            </div>
                                        </div>

                                        <div class="form-actions right">
                                            <button type="reset" class="btn btn-warning mr-1">
                                                <i class="feather icon-x"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection