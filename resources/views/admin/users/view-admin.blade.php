@extends('admin.layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profile</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{ asset('images/picture.jpg') }}" alt="Avatar" title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{ $user->name }}</h3>

                            <ul class="list-unstyled user_data">

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> {{ $user->post }}
                                </li>
                                <li>
                                    <i class="fa fa-envelope user-profile-icon"></i> {{ $user->email }}
                                </li>
                            </ul>

                            <a href="{{ route('admin.edit', ['id'=> $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="{{ route('admin.delete', ['id'=> $user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            <br />

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection