@extends('layouts.app')
@section('title', 'Mandaue Traffic System')
@section('content')


<div class="panel panel-default">
<div class="panel-body">
  <ul class="nav nav-tabs nav-justified">
    <li class="active"><a href="#vehicle" data-toggle="tab"><i class="fa fa-car"></i> VEHICLE</a></li>
    <li><a href="#violations" data-toggle="tab"><i class="fa fa-blind"></i> JAYWALKING</a></li>
  </ul>
  <div class="tab-content">

    <div class="tab-pane active" id="vehicle"><br><br>
      <!-- search -->
      <div class="row">
        <div class="col-sm-4">
          <form action="{{ route('homepage') }}" method="get">
            <div class="input-group">
              <input type="text" class="form-control input-lg" name="sTCT" placeholder="Search for TCT No" value="{{ isset($sTCT) ? $sTCT : ''}}">
              <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
        </div>
        <div class="col-sm-4">
          <form action="index.html" method="post">
            <div class="input-group">
              <input type="text" class="form-control input-lg" name="sDN" placeholder="Search for Driver name">
              <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
        </div>
        <div class="col-sm-4">
          <form action="index.html" method="post">
            <div class="input-group">
              <input type="text" class="form-control input-lg" name="sPN" placeholder="Search for Plate No">
              <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
        </div>
      </div>
      <!-- ===== --> <hr>

      @isset($stct)
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="bg-info">TCT No</th>
              <th class="bg-info">Name</th>
              <th class="bg-info">Violation</th>
              <th class="bg-info">Plate No</th>
              <th class="bg-info">License No</th>
              <th class="bg-info">Date</th>
              <th class="bg-info text-center">Actions</th>
            </tr>
          </thead>
          <tbody>


            @foreach ($violations as $Info)
            <tr>
              <th>{{ $Info-> tct_no }}</th>
              <td>{{ $Info-> driver_name }}</td>
              <td>{{ $Info-> violation }}</td>
              <td>{{ $Info-> plate_no }}</td>
              <td>{{ $Info-> license_no }}</td>
              <td>{{ date('F d, Y', strtotime($Info->created_at)) }}</td>
              <td class="text-center col-sm-2">
                <form action="{{ route('violation.destroy', $Info-> id) }}l" method="post">
                  <a href="{{ route('violation.show', $Info-> id) }}" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('violation.edit', $Info-> id) }}" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                  {{ csrf_field() }} {{ method_field('DELETE') }}
                  <button type="submit" title="Delete" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i></button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table> <hr>
        @endisset


      <!-- form -->
      <form class="form-horizontal" action="{{ route('violation.store') }}" method="post">
        <div class="row">
          {{ csrf_field() }}
        <div class="col-md-7">

<!-- TCT No -->
            <div class="form-group">
              <label for="tct_no" class="col-sm-3 control-label">TCT No: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control input-lg" id="tct_no" name="tct_no" autofocus>
              </div>
            </div>
<!-- Drivers Name -->
            <div class="form-group">
              <label for="driver_name" class="col-sm-3 control-label">Driver's Name: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="First + Last">
              </div>
            </div>
<!-- Address -->
            <div class="form-group">
              <label for="address" class="col-sm-3 control-label">Address: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="address" name="address">
              </div>
            </div>
<!-- Violation -->
            <div class="form-group">
              <label for="violation" class="col-sm-3 control-label">Violation: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="violation" name="violation">
              </div>
            </div>
<!-- Plate No -->
            <div class="form-group">
              <label for="plate_no" class="col-sm-3 control-label">Plate No: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="plate_no" name="plate_no">
              </div>
            </div>
<!-- License No -->
            <div class="form-group">
              <label for="license_no" class="col-sm-3 control-label">License No: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="license_no" name="license_no">
              </div>
            </div>
<!-- Officer -->
            <div class="form-group">
              <label for="officer" class="col-sm-3 control-label">Arresting Officer: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="officer" name="officer">
              </div>
            </div>
<!-- Remarks -->
            <div class="form-group">
              <label for="remark" class="col-sm-3 control-label">Remarks: </label>
              <div class="col-sm-9">
                <textarea name="remark" id="remark" class="form-control" rows="6"></textarea>
              </div>
            </div>
        </div>
        <div class="col-md-5">
          <h5 class="text-primary">Payment:</h5>
<!-- OR No -->
            <div class="form-group">
              <label for="or_no" class="col-sm-3 control-label">OR No: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="or_no" name="or_no">
              </div>
            </div>
<!-- Amount  -->
            <div class="form-group">
              <label for="amount" class="col-sm-3 control-label">Amount Paid: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control input-lg" id="amount" name="amount">
              </div>
            </div>
<!-- or_date  -->
            <div class="form-group">
              <label for="or_date" class="col-sm-3 control-label">OR Date: </label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="or_date" name="or_date">
              </div>
            </div>
<!-- Status -->
            <div class="form-group">
              <label for="status" class="col-sm-3 control-label">Status: </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="status" name="status">
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12  text-right">
          <button type="reset" class="btn-default btn btn-lg">CLEAR ALL</button>
          <button type="submit" class="btn btn-lg btn-primary">ADD RECORD</button>
        </div>
      </div>
    </form>
    <!-- ===== --> <hr>

    </div><!--end vehicle tab -->

<!-- ==================================================================================================================================================================================================================== -->

<!-- [ TICKET ]        -->
    <div class="tab-pane" id="violations"><br><br>
      <div class="row">
        <div class="col-sm-4">
          <form class="" action="index.html" method="post">
            <div class="input-group">
              <input type="text" class="form-control input-lg" name="s" placeholder="Search Apprehended Name">
              <span class="input-group-btn">
                <button class="btn btn-default btn-lg" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
        </div>
        <div class="col-sm-8 text-right">
          <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#jaywalking"><i class="fa fa-plus"></i> NEW RECORD</button>
        </div>

        <div class="modal fade" id="jaywalking" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ADD RECORD</h4>
              </div>
              <form class="form-horizontal" action="{{ route('jaywalking.store') }}" method="post">
              <div class="modal-body">
                <div class="row">
                    {{ csrf_field() }}
                  <div class="col-md-7">

      <!-- TCT No -->
                      <div class="form-group">
                        <label for="tct_no" class="col-sm-3 control-label">TCT No: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control input-lg" id="tct_no" name="tct_no">
                        </div>
                      </div>
      <!-- Drivers Name -->
                      <div class="form-group">
                        <label for="app_name" class="col-sm-3 control-label">Apprehend's Name: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="app_name" name="app_name" placeholder="First + Last">
                        </div>
                      </div>
      <!-- Address -->
                      <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="address" name="address">
                        </div>
                      </div>
      <!-- Violation -->
                      <div class="form-group">
                        <label for="violation" class="col-sm-3 control-label">Violation: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="violation" name="violation" value="JAY WALKING">
                        </div>
                      </div>
      <!-- Date_app -->
                      <div class="form-group">
                        <label for="app_date  " class="col-sm-3 control-label">Date Apprehend: </label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="app_date  " name="app_date  ">
                        </div>
                      </div>
      <!-- Officer -->
                      <div class="form-group">
                        <label for="officer" class="col-sm-3 control-label">Arresting Officer: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="officer" name="officer">
                        </div>
                      </div>
      <!-- Remarks -->
                      <div class="form-group">
                        <label for="remark" class="col-sm-3 control-label">Remarks: </label>
                        <div class="col-sm-9">
                          <textarea name="remark" id="remark" class="form-control" rows="6"></textarea>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-5">
                    <h5 class="text-primary">Payment:</h5>

      <!-- OR No -->
                      <div class="form-group">
                        <label for="or_no" class="col-sm-3 control-label">OR No: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="or_no" name="or_no">
                        </div>
                      </div>
      <!-- Amount  -->
                      <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Amount Paid: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control input-lg" id="amount" name="amount">
                        </div>
                      </div>
      <!-- or_date  -->
                      <div class="form-group">
                        <label for="or_date" class="col-sm-3 control-label">OR Date: </label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="or_date" name="or_date">
                        </div>
                      </div>
      <!-- Status -->
                      <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status: </label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="status" name="status">
                        </div>
                      </div>

                  </div>



                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-lg">Save Record</button>
              </div>
            </form>
            </div>
          </div>
        </div>

      </div>

      <hr>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="bg-success">TCT No</th>
            <th class="bg-success">Name</th>
            <th class="bg-success">Address</th>
            <th class="bg-success">Arresting Officer</th>
            <th class="bg-success">Date</th>
            <th class="bg-success text-center">Actions</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($jaywalkings as $Info)
              <tr>
                <th>{{ $Info-> tct_no }}</th>
                <td>{{ $Info-> app_name }}</td>
                <td>{{ $Info-> address }}</td>
                <td>{{ $Info-> officer }}</td>
                <td>{{ date('F d, Y', strtotime($Info->app_date)) }}</td>
                <td class="text-center col-sm-2">
                  <form action="{{ route('jaywalking.destroy', $Info-> id) }}l" method="post">
                  <a href="{{ route('jaywalking.show', $Info-> id) }}" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                  <a href="{{ route('jaywalking.edit', $Info-> id) }}" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                    <button type="submit" title="Delete" class="btn btn-default" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i></button>
                  </form>
                </td>
              </tr>
          @endforeach



        </tbody>
      </table>
    </div>
<!-- end -->
  </div>  <!--tab content-->
</div>  <!--panel body-->
</div>  <!--panel-->

@endsection
@section('admin')
<div class="panel panel-default">
<div class="panel-heading">
  <div class="row">
    <div class="col-sm-6">
      <h3 class="panel-title">Admin</h3>
    </div>
    <div class="col-sm-6 text-right">
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
  </div>
</div>
<div class="panel-body">
  <img src="{{ asset('img/user.png') }}" alt="account pic" class="img-responsive center-block img-circle" width="200" height="200"><br>
  <div class="row">
    <div class="col-sm-12 text-center">
      <h3 class=""> {{ ucfirst(auth::user()->fname) }} {{ ucfirst(auth::user()->lname) }}</h3>
      <small>{{ auth::user()->email }}</small><br>
      <small><i class="fa fa-circle text-success"></i> Online</small>
    </div>
  </div>
</div>
<div class="panel-footer">

</div>
</div>
@endsection















<!-- <div class="form-group">
<label for="owner_name" class="col-sm-3 control-label">Owner's Name: (Optional) </label>
<div class="col-sm-9">
<input type="text" class="form-control" id="owner_name" name="owner_name">
</div>
</div> -->
