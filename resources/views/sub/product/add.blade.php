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
                                    
                                    <form class="form form-horizontal" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="fa fa-eye"></i> Product Info</h4>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput3">Customer Name</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control" name="customer_id">
                                                                @foreach($customers as $customer)
                                                                    <option value="{{$customer->id}}">{{$customer->username}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput4">progress</label>
                                                        <div class="col-md-9">
                                                            <input type="number" id="progress" max="100" class="form-control border-primary" placeholder="Progress" name="progress" required data-validation-required-message="This field is required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="status" required data-validation-required-message="This field is required">status</label>
                                                        <div class="col-md-9">
                                                            <select class="select2 form-control" name="status">
                                                                <option value="pending">Pending</option>
                                                                <option value="completed">Completed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput5">Product Photo</label>
                                                        <div class="col-md-9">
                                                            <input type="file" class="custom-file-input" id="photo" name="photo" required data-validation-required-message="This field is required">
                                                            <label class="custom-file-label" for="inputGroupFile01" >Upload Photo</label>
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