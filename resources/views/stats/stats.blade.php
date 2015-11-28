@extends('layouts.adminlte')

@section('title', 'Stats')

@section('user_image', $twitterAccount->profile_image_url)
@section('user_fullname', $twitterAccount->name)
@section('user_username', "@". $twitterAccount->screen_name)
@section('user_description', $twitterAccount->description)
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Stats</li>
@endsection
@section('content')
<!-- BAR CHART -->
 <div class="row">
 	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		      <h3 class="box-title">Graphic</h3>
		      <div class="box-tools pull-right">
		        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		      </div>
		    </div>
		    <div class="box-body">
		      <div class="chart">
		        <canvas id="barChart" style="height:230px"></canvas>
		      </div>
		    </div><!-- /.box-body -->
		</div><!-- /.box -->
 	</div>
 </div>

@endsection
