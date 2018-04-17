@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pull-left">Admins</h4>
                        <span class="nav pull-right panel_toolbox">
                            <a class="btn btn-success" href="{{ route('admin.create') }}">
                                <i class="fa fa-arrow-circle-left"></i>Add New
                            </a>
                        </span>
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div class="clearfix"></div>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <!--<th>Avatar</th>-->
                                    <th>Email</th>
                                    <th>Date Joined</th>
                                    <th>#Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <!--<th>Avatar</th>-->
                                    <th>Email</th>
                                    <th>Date Joined</th>
                                    <th>#Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @isset($users)
	                                <?php $i = 1; ?>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <!--<td>
                                                <ul class="list-inline">
                                                    <li><img src="{{ asset($user->avatar) }}" class="avatar" alt="Avatar"></li>
                                                </ul>
                                            </td>-->
                                            <td class="project_progress">{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('F jS, Y h:i A') }}</td>
                                            <td>
                                                <a href="{{ route('admin.view', ['id'=> $user->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                                <a href="{{ route('admin.edit', ['id'=> $user->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                <a href="{{ route('admin.delete', ['id'=> $user->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>
@endsection
