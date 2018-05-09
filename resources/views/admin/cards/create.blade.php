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
                        @if(isset($edit))
                            @if($edit)
                                <div class="text-center">
                                    @if(isset($card->image))
                                        @if($card->image == 'images/user.png')
                                            <img src="{{ asset('/') }}images/img.jpg" alt="..." class="img-circle profile_img">
                                        @else
                                            <a href="{{ asset('storage/images/'. $card->id . '/' .$card->image) }}" class="text-center"><img src="{{ asset('storage/images/'. $card->id . '/' .$card->image) }}" alt="logo" width="140" height="140" border="0" class="img-circle"></a>
                                        @endif
                                    @else
                                        <img src="{{ asset('/') }}images/img.jpg" width="140" height="140" border="0" alt="logo" class="img-circle profile_img">
                                    @endif
                                </div>
                            @endif
                        @endif
                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="@if(isset($edit)) {{ route('admin.card.edit', ['id' => $card->cid]) }} @else {{ route('admin.card.create') }} @endif" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Card Name <span class="text-danger">*</span></label>
                                <input name="title" type="text" class="form-control" value=" @if(isset($edit)) {{ $card->title }} @else {{ old('title') }} @endif" placeholder="Card Name">
                            </div>
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="card_category">
                                    @if(isset($edit))
                                        <option @if( $card->card_category == "") selected @endif value="">None</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option @if( $card->card_category == $category->name) selected @endif value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    @else
                                        <option value="">None</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Info <span class="text-danger">*</span></label>
                                <textarea name="info" class="form-control" rows="3" placeholder="Brief Info">@if(isset($edit)) {{ $card->info }} @else {{ old('info') }} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Card Details <span class="text-danger">*</span></label>
                                <textarea name="card_details" class="form-control" rows="3" placeholder="Card Details">@if(isset($edit)) {{ $card->card_details }} @else {{ old('card_details') }} @endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Apply Link <span class="text-danger">*</span></label>
                                <input name="apply_link" type="text" class="form-control" value="@if(isset($edit)) {{ $card->apply_link }} @else {{ old('apply_link') }} @endif" placeholder="Apply Link">
                            </div>
                            <div class="form-group">
                                <label>Intro_apr <span class="text-danger">*</span></label>
                                <input name="intro_apr" type="text" class="form-control" value=" @if(isset($edit)) {{ $card->intro_apr }} @else {{ old('intro_apr') }} @endif" placeholder="intro_apr">
                            </div>
                            <div class="form-group">
                                <label>regular_apr <span class="text-danger">*</span></label>
                                <input name="regular_apr" type="text" class="form-control" value=" @if(isset($edit)) {{ $card->regular_apr }} @else {{ old('regular_apr') }} @endif" placeholder="regular_apr">
                            </div>
                            <div class="form-group">
                                <label>Annnual Fee <span class="text-danger">*</span></label>
                                <input name="annual_fee" type="text" class="form-control" value=" @if(isset($edit)) {{ $card->annual_fee }} @else {{ old('annual_fee') }} @endif" placeholder="Annual Fee">
                            </div>
                            <div class="form-group">
                                <label>Credit Score <span class="text-danger">*</span></label>
                                <input name="credit_score" type="text" class="form-control" value="@if(isset($edit)) {{ $card->credit_score }} @else {{ old('credit_score') }} @endif" placeholder="Credit Score">
                            </div>
                            <div class="form-group">
                                <label>Image <span class="text-danger">*</span></label> <br />
                                Select an image(leave empty if you don't want to change your photo)
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                @if(isset($edit))
                                    <select class="form-control" name="status">
                                        <option @if($card->status == 'active') selected @endif value="active">Active</option>
                                        <option @if($card->status == 'draft') selected @endif value="draft">Draft</option>
                                        <option @if($card->status == 'deactivated') selected @endif value="deactivated">Deactivated</option>
                                    </select>
                                @else
                                    <select class="form-control" name="status">
                                        <option @if( old('status') == 'active') selected @endif value="active">Active</option>
                                        <option @if( old('status') == 'draft') selected @endif value="draft">Draft</option>
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
