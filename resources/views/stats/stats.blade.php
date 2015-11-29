@extends('layouts.adminlte')

@section('title', 'Stats')

@section('user_image', $twitterAccount->profile_image_url)
@section('user_fullname', $twitterAccount->name)
@section('user_username', "@". $twitterAccount->screen_name)
@section('user_description', $twitterAccount->description)
@section('breadcrumb')
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Stats</li>
 <select style="width:100%" class="provinsi">
    <option value="kalbar">Kalimantan Barat</option>
    <option value="riau">Riau</option>
  </select>
@endsection
@section('content')
<!-- BAR CHART -->
 <div class="row">
 	<div class="col-md-12" style="margin-top:10px;">
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
		      <div class="more-detail">
		      	<span>Keterangan:</span>
		      	<ul>
		      		<li>
		      			<i class="fa fa-circle" style="color:#16a085;"></i><span class="label">Penebangan Liar</span>
		      		</li>
		      		<li>
		      			<i class="fa fa-circle" style="color:#c0392b;"></i><span class="label">Pembakaran Hutan dan Pembukaan Lahan</span>
		      		</li>
		      		<li>
		      			<i class="fa fa-circle" style="color:#3d35400;"></i><span class="label">Dukungan Masyarakat</span>
		      		</li>
		      		<li>
		      			<i class="fa fa-circle" style="color:#3498db;"></i><span class="label">Dukungan Pemerintah</span>
		      		</li>
		      		<li>
		      			<i class="fa fa-circle" style="color:#f39c12;"></i><span class="label">Penilaian Masyarakat</span>
		      		</li>
		      	</ul>
		      </div>
		    </div><!-- /.box-body -->
		</div><!-- /.box -->
 	</div>
 </div>

@endsection
