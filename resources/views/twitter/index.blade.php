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
                  <b>Statuses</b> <a class="pull-right">{{ $twitterAccount->statuses_count }}</a>
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
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">

                    <form class="form-horizontal" method="POST" action="{{ route('twitter_status_update') }}">
                        {!! csrf_field() !!}
                        <div class="form-group margin-bottom-none">
                          <div class="col-sm-9">
                            <input name="status" class="form-control input-sm" placeholder="Status">
                          </div>                          
                          <div class="col-sm-3">
                            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Update</button>
                          </div>                          
                        </div>                        
                    </form>

                </div><!-- /.post -->
              </div><!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
    </div>

@endsection
