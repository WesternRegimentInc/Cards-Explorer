@extends('admin.layouts.app')
@section('css')
    <style>
        .sweet-alert {
            box-sizing : border-box;
            max-height : 100% !important;
            overflow-y : auto !important;
            padding : 0 17px 17px !important;
            width : 512px;

        //As default top and left are 50%, so it will transform those values and will set the modal exactly in the middle
        transform: translate(-50%, -50%);

        //remove margins
        margin: 0;
        }
        .sweet-alert:before {
            content : "";
            display : block;
            height : 17px;
            width : 0;
        }
    </style>
@endsection
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
                                        <th>Card Category</th>
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
                                                <td>{{ $card->card_category }}</td>
                                                <td>{{ $card->status }}</td>
                                                <td>
                                                    <button data-id="{{$card->cid}}"data-url="{{ route('admin.card.details', ['id'=> $card->cid]) }}" class="btn btn-success detailsBtn btn-xs"><i class="fa fa-pencil"></i> Details </button>
                                                    <a href="{{ route('admin.card.edit', ['id'=> $card->cid]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                                    @if($card->status == 'active')
                                                        <a href="{{ route('admin.card.deactivate', ['id'=> $card->cid]) }}" data-url="{{ route('admin.card.deactivate', ['id'=> $card->cid]) }}" class="btn btn-danger btn-xs deactBtn" data-id="{{$card->cid}}"><i class="fa fa-trash-o"></i> Deactivate </a>
                                                    @else
                                                        <a href="{{ route('admin.card.activate', ['id'=> $card->cid]) }}" data-url="{{ route('admin.card.activate', ['id'=> $card->cid]) }}" class="btn btn-info btn-xs actBtn" data-id="{{$card->cid}}"><i class="fa fa-trash-o"></i> Activate </a>
                                                    @endif
                                                    <a style="display: none" href="#" id="backUrl" data-back="{{ route('admin.cards') }}"></a>
                                                    <a style="display: none" href="#" id="homeUrl" data-back="{{ route('admin.cards') }}"></a>
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
        var $loading = $('#loading').hide();
        $(document).on('click', '.detailsBtn', function (e) {
            $(this).before('<span id="loading"></span>');
            e.preventDefault();
            var id = $(this).data('id');
            var url = $(this).data('url');
            var backUrl = $('#backUrl').data('back');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // add loading image to div
            $('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    _token: CSRF_TOKEN,
                    id:id
                },
                dataType:'json',
                success: function (data) {
                    var card_id = data[0]['did']
                    var title  = data[0]['title'];
                    var status  = data[0]['status'];
                    var card_details  = data[0]['card_details'];
                    var image  = data[0]['image'];
                    var apply_link  = data[0]['apply_link'];
                    var intro_apr  = data[0]['intro_apr'];
                    var regular_apr  = data[0]['regular_apr'];
                    var annual_fee  = data[0]['annual_fee'];
                    var credit_score  = data[0]['credit_score'];
                    swal({
                        title: "Card Details",
                        text: '<img src="http://cards.sap/storage/images/' + card_id + '/' + image + '" />' +
                        '<table class="table">' +
                        '<tbody>' +
                        '<tr>' +
                        '<th>Card Title</th>' +
                        '<td>' + title + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>Card Status</th>' +
                        '<td>' + status + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>Card Details</th>' +
                        '<td>' + card_details + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>apply_link</th>' +
                        '<td>' + apply_link + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>intro_appr</th>' +
                        '<td>' + intro_apr + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>regular_apr</th>' +
                        '<td>' + regular_apr + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>Annual Fee</th>' +
                        '<td>' + annual_fee + '</td>' +
                        '</tr>' +
                        '<tr>' +
                        '<th>Credit Score</th>' +
                        '<td>' + credit_score + '</td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>',
                        html: true,
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error Connecting!", "Please try again", "error");
                }
            });
        }).ajaxStart(function () {
            $loading.show();
            $('.detailsBtn').attr("disabled", true);
        })
            .ajaxStop(function () {
                $('.detailsBtn').attr("disabled", false);
                $('#loading').remove()
            });
        $(document).on('click', '.deactBtn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = $(this).data('url');
            var backUrl = $('#backUrl').data('back');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Deactivate Card?",
                text: "Are you sure you want to do this?",
                type: "warning",
                showCancelButton: true,
                showCloseButton: true,
                //timer: 1500,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, go ahead!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        _token: CSRF_TOKEN,
                        id:id
                    },
                    dataType:'json',
                    success: function (data) {
                        swal({
                            title: "Deactivated!",
                            text: "Card Deactivated!",
                            type: "success",
                        },function() {
                            window.location.href = backUrl;
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deactivating!", "Please try again", "error");
                    }
                });
            });
        });
        $(document).on('click', '.actBtn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = $(this).data('url');
            var backUrl = $('#backUrl').data('back');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: "Activate Card?",
                text: "please Confirm your Activation?",
                type: "success",
                showCancelButton: true,
                showCloseButton: true,
                //timer: 1500,
                confirmButtonColor: "#4BB543",
                confirmButtonText: "Yes, go ahead!",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function (isConfirm) {
                if (!isConfirm) return;
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        _token: CSRF_TOKEN,
                        id:id
                    },
                    dataType:'json',
                    success: function (data) {
                        swal({
                            title: "Activated!",
                            text: "Card Activated!",
                            type: "success",
                        },function() {
                            window.location.href = backUrl;
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deactivating!", "Please try again", "error");
                    }
                });
            });
        });
    </script>
@endsection
