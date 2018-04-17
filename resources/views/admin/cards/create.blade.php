@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pull-left"> @if(isset($edit)) Edit @else New @endif Card</h4>
                        <span class="nav pull-right panel_toolbox">
                            <a class="btn btn-success" href="{{ route('admin.cards') }}">
                                <i class="fa fa-arrow-circle-left"></i>Back
                            </a>
                        </span>
                        <div class="clearfix"></div>
                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if(isset($edit)) {{ route('admin.card.edit', ['id' => $card->id]) }} @else {{ route('admin.card.create') }} @endif" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Card Name <span class="text-danger">*</span></label>
                                <input name="title" type="text" class="form-control" value=" @if(isset($edit)) {{ $card->title }} @else {{ old('title') }} @endif" placeholder="Card Name">
                            </div>
                            <div class="form-group">
                                <label>Info <span class="text-danger">*</span></label>
                                <textarea name="info" class="form-control" placeholder="Brief Info">@if(isset($edit)) {{ $card->info }} @else {{ old('info') }} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                @if(isset($edit))
                                    <select class="form-control" name="status">
                                        <option @if($card->status == '') selected @endif value="">None</option>
                                        <option @if($card->status == 'active') selected @endif value="active">Active</option>
                                        <option @if($card->status == 'deactivated') selected @endif value="deactivated">Deactivated</option>
                                    </select>
                                @else
                                    <select class="form-control" name="status">
                                        <option @if( old('status') == '') selected @endif value="">None</option>
                                        <option @if( old('status') == 'active') selected @endif value="active">Active</option>
                                        <option @if( old('status') == 'deactivated') selected @endif value="deactivated">Deactivated</option>
                                    </select>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default btn-primary btn-flat m-b-30 m-t-30">
                                @if(isset($edit)) Update @else Add @endif
                            </button>
                            <!--
                            <div class="register-link m-t-15 text-center">
                                <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                            </div>
                            -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
@endsection

@section('js')

@endsection
