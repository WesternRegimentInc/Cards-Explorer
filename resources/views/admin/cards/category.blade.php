@extends('admin.layouts.app')
@section('css')
    <link href="{{ asset('css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-4">
                <h3>Categories</h3>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form method="post" action="{{ route('admin.cards.category.create') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class=""> Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" />
                    </div>
                    <!--
                    <div class="form-group">
                        <label class=""> Slug</label>
                        <input type="text" class="form-control" placeholder="slug" name="slug" value="{{ old('slug') }}" />
                    </div>
                    -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
                <br />
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('admin.cards.table.category')
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
    <script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>

    <script src="{{ asset('js/lib/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).on('click', '.delBtn', function (e) {
            $(".delBtnConfirm").attr("disabled", true);
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
                confirmButtonClass: "delBtnConfirm",
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
                        setTimeout(function () {
                            swal("Done!", "It was succesfully deleted!", "success");
                            window.location.reload(true);
                        },3000);
                        $(".delBtnConfirm").attr("disabled", false);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            });
        });
    </script>
@endsection
