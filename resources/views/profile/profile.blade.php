
@extends('layouts.adminlte')

@section('title', 'Profile')

@section('user_image', $twitterAccount->profile_image_url)
@section('user_fullname', $twitterAccount->name)
@section('user_username', "@". $twitterAccount->screen_name)
@section('user_description', $twitterAccount->description)
@section('breadcrumb')
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Profile</li>
@endsection

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
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile" style="background-image:url('{{asset('image/profilebackground.jpg')}}');background-size:100%;background-repeat:no-repeat;background-position:center;color:#fff;">
              <img class="profile-user-img img-responsive img-circle" src="{{ $twitterAccount->profile_image_url }}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $twitterAccount->name }}</h3>
              <p class="text-center">{{ "@" . $twitterAccount->screen_name }}</p>

              <ul class="list-group list-group-unbordered profile-page-detail">
                <li class="list-group-item">
                  <span>Tweets</span> 
                  <a class="" style="font-weight:bold;color:#fff;">{{ $twitterAccount->statuses_count }}</a>
                </li>
                <li class="list-group-item">
                  <span>Followers</span> 
                  <a class="" style="font-weight:bold;color:#fff;">{{ $twitterAccount->followers_count }}</a>
                </li>
                <li class="list-group-item">
                  <span>Following</span> 
                  <a class="" style="font-weight:bold;color:#fff;">{{ $twitterAccount->friends_count }}</a>
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

                <!--
              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>
            -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div><!-- /.col -->
    </div>

@endsection
