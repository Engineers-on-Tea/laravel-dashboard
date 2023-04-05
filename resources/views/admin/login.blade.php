@extends('admin.layouts.auth')

@section('title', $pageTitle)

@section('content')
    <!-- Authentication card start -->
    <form class="md-float-material form-material" action="{{ route('dashboard.login.submit') }}" method="post">
        @csrf
        @method('POST')
        <div class="text-center">
            <img src="{{asset('admin_dashboard/assets/images/logo.png')}}" alt="logo.png">
        </div>
        <div class="auth-box card">
            <div class="card-block">
                <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-center">{{('Sign in')}}</h3>
                    </div>
                </div>
                <div class="form-group form-primary">
                    <input type="email" name="email" class="form-control" required placeholder="Your Email Address">
                    <span class="form-bar"></span>
                </div>
                <div class="form-group form-primary">
                    <input type="password" name="password" class="form-control" required="" placeholder="Password">
                    <span class="form-bar"></span>
                </div>
                <div class="row m-t-25 text-left">
                    <div class="col-12">
                        <div class="checkbox-fade fade-in-primary d-">
                            <label>
                                <input type="checkbox" value="" name="remember">
                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                <span class="text-inverse">{{('Remember me')}}</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <button type="submit"
                                class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                            {{('Sign in')}}
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-10">
                        <p class="text-inverse text-left m-b-0">{{('Thank you')}}.</p>
                        <p class="text-inverse text-left"><a href="{{ route('home') }}"><b class="f-w-600">{{('Back to website')}}</b></a>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <img src="{{asset('admin_dashboard/assets/images/auth/Logo-small-bottom.png')}}"
                             alt="small-logo.png">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end of form -->
@endsection
