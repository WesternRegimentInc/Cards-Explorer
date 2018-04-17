@extends('admin.layouts.start')
@section('content')
<div id="main-wrapper">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Login</h4>
                            @if(!$errors->isEmpty())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('admin.login.post') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Email address <span class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input name="password" type="password" class="form-control" value="{{ old('password') }}" placeholder="Password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                    <!--
                                    <label class="pull-right">
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                    -->
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
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
        </div>
    </div>

</div>
@endsection
@section('js')
    <!-- Form validation -->
    <script src="{{ asset('js/lib/form-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/lib/form-validation/jquery.validate-init.js') }}"></script>
@endsection