@extends('layouts.app')
@section('title', 'Mandaue Traffic System')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-sm-2">
        <a class="text-success" href="{{ route('homepage') }}"><h5><i class="fa fa-chevron-left"></i> Back</h5></a>
      </div>
      <div class="col-sm-10 text-right">
        <button type="button" onclick="printContent('print')" class="btn btn-success">PRINT <i class="fa fa-print"></i></button>
      </div>
    </div>
  </div>
  <div class="panel-body">
    <div class="container">
      <div id="print">
        <h3 class="text-center"><u><b>C E R T I F I C A T I O N</b></u></h3><br><br>
        <p>To Whom It May Concern</p>
        <p class="text-justify indent">
          This is to certify that the beare <b style="margin: 0 10px 0 10px;"><u>{{ ucfirst($violations->driver_name) }}</u></b> resident of <b style="margin: 0 10px 0 10px;"><u>{{ $violations->address }}</u></b> of legal age _______________
          Filipino has no pending traffic violation in our office as of this date, without prejudice however of his/her previous traffic violation/s he/she might <head>
            commited that can be verified only through the computer but not yet encoded as of this date.
          </head>
        </p>
        <p class="indent">This certification is issued upon his/her request for employment purpose and or any legal purpose this may serve him/her best</p><br>
        <p><b>O.R No.: {{ $violations->or_no }}</b></p><br>
        <p><b>Date Issued: {{ $violations->or_date }}</b></p>
      </div>
    </div>
    </div>
  <div class="panel-footer">

  </div>
</div>

@endsection

@section('admin')
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
      <div class="col-sm-8">
        <h3>TCT No: {{ $violations->tct_no}}</h3>
      </div>
      <div class="col-sm-4">
        <h5 class="text-muted"><b>Encoded By:</b> {{ ucfirst($violations->user->fname) }} {{ ucfirst($violations->user->lname) }}</h5>
        <h5 class="text-muted"><b>Date Encoded:</b> {{ date('F d, Y', strtotime($violations->created_at)) }}</h5>
      </div>
    </div>
    <hr>
    <table class="table borderless">
      <tbody>
        <tr><th>Driver's Name:</th> <td>{{ ucfirst($violations->driver_name) }}</td></tr>
        <tr><th>Address:</th> <td>{{ $violations->address }}</td></tr>
        <tr><th>Violation:</th> <td>{{ $violations->violation }}</td></tr>
        <tr><th>Plate No::</th> <td>{{ $violations->plate_no }}</td></tr>
        <tr><th>License No::</th> <td>{{ $violations->license_no }}</td></tr>
        <tr><th>Arresting Officer:</th> <td>{{ ucfirst($violations->officer) }}</td></tr>
        <tr><th>Remarks::</th> <td>{{ $violations->remark }}</td></tr>
        <tr><td></td></tr>
        <tr><th class="text-success">OR No:</th> <td>{{ $violations->or_no }}</td></tr>
        <tr><th class="text-success">Amount::</th> <td>{{ $violations->amount }}</td></tr>
        <tr><th class="text-success">OR Date::</th> <td>{{ $violations->or_date }}</td></tr>
        <tr><th class="text-success">Status:</th> <td>{{ $violations->status }}</td></tr>
      </tbody>
    </table>
  </div>
</div>
@endsection


<script>
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML= printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
