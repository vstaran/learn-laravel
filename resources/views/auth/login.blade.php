@extends('layouts.login')

@section('title', 'Login')

@section('content')
    <main class="login-form form-signin">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <h3 class="card-header text-center">@lang('login.Login')</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('auth') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="@lang('login.Email')" id="email" class="form-control" name="email" required
                                           autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="@lang('login.Password')" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> @lang('login.Remember Me')
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">@lang('login.Signin')</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
