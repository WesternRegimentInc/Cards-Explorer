@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pull-left">Cards</h4>
                        <span class="nav pull-right panel_toolbox">
                            <a class="btn btn-success" href="{{ route('admin.card.create') }}">
                                <i class="fa fa-plus-circle"></i>Add New
                            </a>
                        </span>
                        <div class="clearfix"></div>
                        <div class="table-responsive m-t-40">
                            <p>
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                                @endif
                                </p>
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($cards))
	                                <?php $i = 1; ?>
                                    @foreach($cards as $card)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $card->title }}</td>
                                            <td>{{ $card->status }}</td>
                                            <td>
                                                <a href="{{ route('admin.card.edit', ['id'=> $card->id]) }}" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Details </a>
                                                <a href="{{ route('admin.card.edit', ['id'=> $card->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                <a href="{{ route('admin.card.delete', ['id'=> $card->id]) }}" data-url="{{ route('admin.card.delete', ['id'=> $card->id]) }}" class="btn btn-danger btn-xs delBtn" data-id="{{$card->id}}"><i class="fa fa-trash-o"></i> Deactivate </a>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="{{ asset('js/lib/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).on('click', '.delBtn', function (e) {
            $(".delBtn").attr("disabled", true);
            e.preventDefault();
            var id = $(this).data('id');
            var url = $(this).data('url');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Are you sure you want to delete this category?",
                text: "You will not be able to recover this category!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        _token: CSRF_TOKEN,
                        id:id
                    },
                    dataType: "html",
                    success: function (data) {
                        swal("Done!", "It was succesfully deleted!", "success");
                        $(".delBtn").attr("disabled", false);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            });
        });
    </script>
@endsection
