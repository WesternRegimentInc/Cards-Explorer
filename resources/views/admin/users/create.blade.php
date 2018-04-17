@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h3 class="panel-title">@if(isset($dataTypeContent->id)){{ 'Edit Admin' }}@else{{ 'Create New' }}@endif</h3>
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
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
                    <div class="basic-form">
                        <form class="form-edit-add" role="form"
                              action="@if(isset($dataTypeContent->id)){{ route('admin.edit', $dataTypeContent->id) }}@else{{ route('admin.create') }}@endif"
                              method="POST" enctype="multipart/form-data">
                            <!-- CSRF TOKEN -->
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control input-flat" name="name"
                                       placeholder="Name" id="name"
                                       value="@if(isset($dataTypeContent->id)){{ old('name', $dataTypeContent->name) }}@else{{old('name')}}@endif">
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control input-flat" name="email"
                                       placeholder="Email" id="email"
                                       value="@if(isset($dataTypeContent->id)){{ old('email', $dataTypeContent->email) }}@else{{old('email')}}@endif">
                            </div>

                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input type="text" class="form-control input-flat" name="phone"
                                       placeholder="Phone" id="phone"
                                       value="@if(isset($dataTypeContent->id)){{ old('phone', $dataTypeContent->phone) }}@else{{old('phone')}}@endif">
                            </div>

                            <div class="form-group">
                                <label for="password">Password @if(isset($dataTypeContent->id))(Leave empty if you don't want to change password)@endif</label>
                                <input type="password" class="form-control input-flat" name="password"
                                       placeholder="Password" id="password"
                                       value="{{old('password')}}">
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

    <!-- End PAge Content -->
</div>
@endsection
@section('js')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@stop
