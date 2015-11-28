
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
