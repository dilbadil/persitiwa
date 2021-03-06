@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('user_image', $twitterAccount->profile_image_url)
@section('user_fullname', $twitterAccount->name)
@section('user_username', "@". $twitterAccount->screen_name)
@section('user_description', $twitterAccount->description)
<!-- @section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
@endsection -->

@section('content')
    @if (session('message'))
        @if (session('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ session('message') }}
            </div>
        @else
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ session('message') }}
            </div>
        @endif
    @endif

    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ $twitterAccount->profile_image_url }}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $twitterAccount->name }}</h3>
              <p class="text-muted text-center">{{ "@" . $twitterAccount->screen_name }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Tweets</b> <a class="pull-right">{{ $twitterAccount->statuses_count }}</a>
                </li>
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">{{ $twitterAccount->followers_count }}</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">{{ $twitterAccount->friends_count }}</a>
                </li>
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-twitter margin-r-5"></i> Last Status</strong>
              <p>{{ $twitterAccount->status->text }}</p>
              <hr>

              <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
              <p class="text-muted">
                {{ $twitterAccount->description }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted">
                {{ $twitterAccount->location }}
              </p>
              <hr>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
        
        
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Tweet dengan klik daerah</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                <div id="map" style="overflow-x: scroll !important;"></div> 
                </div><!-- /.post -->
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          </div><!-- /.nav-tabs-custom -->

          <div class="nav-tabs-custom peristiwa-kita">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Peristiwa Kita</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <ul class="tweets">
                    @foreach($statuses as $status)
                        <li class="tweet">
                          <div class="head-tweet">
                            <a href=""><img class="profile-user-img img-responsive img-circle" src="{{ $status->user->profile_image_url }}" alt="User profile picture"></a>
                            <div class="username">
                              <span class="profile-username ">{{ $status->user->username }}</span>
                            <p class="text-muted ">{{ "@" . $status->user->username }}</p>
                            </div>
                          </div>
                          <div class="content-tweet">
                            <p>{{ $status->body }}</p>
                          </div>
                        </li>
                    @endforeach

                  </ul><!-- end-tweets-->
                </div><!-- /.post -->
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
    </div>
@endsection
