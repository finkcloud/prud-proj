@extends('front.layouts.master')
@section('title',__('Login & Invest To Earn'))
@section('content')
    <div class="signin-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-wrap my-5">
                            <div class="signin-top d-flex justify-content-center align-items-center">
                                <h2 class="signin-title">{{__('Login to get access')}}</h2>
                            </div>
                            <div class="signin-form">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="{{__('Enter Email')}}" autofocus/>
                                        <i class="icon fas fa-envelope"></i>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="{{__('Enter Password')}}" autocomplete="current-password"/>
                                        <i class="icon fas fa-lock"></i>
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <div class="forgot-password">
                                            <a href="{{route('user.showEmailForm')}}">{{__('Forget Password ?')}} </a>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-base w-100">{{__('Login')}}</button>
                                </form>
                            </div>
                            <div class="signin-bottom text-center">
                                <p class="have-account">{{__('Do not have an account ?')}} <a href="{{route('register')}}">{{__('Sign Up now')}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
