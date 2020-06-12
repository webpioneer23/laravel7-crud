
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WPseeds | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="fonts/font-awesome.min.css"> -->
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <style type="text/css">
.page-header {
    background-color: #f6f6f6;
}
.page-header {   
    margin: 0px 0 20px !important;
    padding-top: 0px;
}
.invoice-info {
    margin-bottom: 20px;
}
thead {
    background-color: #8cc63e;
}

.total {
    background-color: #af3a46;
  }
.invoice {
    border: 1px solid;
    padding: 10px;
}
.table-responsive {
    overflow: hidden;
}
  </style>
  <!-- Main content -->
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <section class="invoice">
    <div class="row invoice-info">
      <div class="col-xs-6 invoice-col">        
          <h2>Productr Report</h2>
          Report No# {{$result->unique_key}}<br>
          Date : {{date('Y-m-d', strtotime(now()))}}<br>
      </div>
      <!-- /.col -->      

    </div>
    <!-- /.row -->



    <!-- Table row -->
    <div class="row" >
      <div class="col-xs-6">
        <Label><h4>Subsidiareis Information</h4></Label>
      </div>
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Owner Name:</th>
                <td> {{$result->subsidiary->name}} </td>
              </tr>
              <tr>
                <th>Owner Email:</th>
                <td> {{$result->subsidiary->email}} </td>
              </tr>
            </table>
          </div>    
      </div>
    </div>

      
    <div class="row">
      <div class="col-xs-12">
        <Label><h4>Customer Information</h4></Label>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <td>Customer Name:</td>
              <td> {{$result->customer->username}} </td>
              <td>|</td>
              <td>Phone_number:</td>
              <td> {{$result->customer->phone_number}}</td>
            </tr>
            <tr>
              <td>Address:</td>
              <td colspan="4"> {{$result->customer->address}}</td>
            </tr>
            <!-- <tr>
              <td>Phone_number:</td>
              <td> {{$result->customer->phone_number}}</td>
            </tr>             -->
          </table>
        </div>  
      </div>
    </div>
    

      <!-- /.col -->
   

    <div class="row">
      <div class="col-xs-12">
          <Label><h4> Product Information</h4></Label>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Product Progress:</th>
                <td> 
                {{$result->progress}} %
                <!-- <div class="progress" style="margin-bottom:0px;">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{$result->progress}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$result->progress}}%"> -->
                  <!-- {{$result->progress}} %
                  </div>
                </div> -->
                </td>
              </tr>
              <tr>
                <th>Status:</th>
                <td> {{$result->status}} </td>
              </tr>
              <tr>
                <th>Image:</th>
                <td> <img src="{{ ($result->photo)}}" width=40 alt="photo" />   </td>
              </tr>
            </table>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
</div>
</div>
<!-- ./wrapper -->
</body>
</html>
