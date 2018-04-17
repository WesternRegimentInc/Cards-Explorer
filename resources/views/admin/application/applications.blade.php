@extends('admin.layouts.app')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hire Applications </h3>
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
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content table-responsive">
                            <!-- start hire appplication list -->
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th>Client</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>DevType</th>
                                    <th>DevNo</th>
                                    <th>Skype ID</th>
                                    <th>Location</th>
                                    <th>Technologies</th>
                                    <th>Contract type</th>
                                    <th>Time Needed</th>
                                    <th>Remote Staff</th>
                                    <th>processed</th>
                                    <th>referrer</th>
                                    <th>Additional Info</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach($applications as $app)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $app->clientName }}</td>
                                        <td>{{ $app->clientEmail }}</td>
                                        <td>{{ $app->clientCompany }}</td>
                                        <td>{{ $app->devType }}</td>
                                        <td>{{ $app->devNum }}</td>
                                        <td>{{ $app->clientSkypeId }}</td>
                                        <td>{{ $app->clientLocation }}</td>
                                        <td>{{ $app->technologies }}</td>
                                        <td>{{ $app->contractType }}</td>
                                        <td>{{ $app->timeNeeded }}</td>
                                        <td>{{ $app->remoteStaff }}</td>
                                        <td>{{ $app->processed }}</td>
                                        <td>{{ $app->referral_link }}</td>
                                        <td>{{ $app->additionalInfo }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- end hire application list -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
