@extends('layouts.app')

@section('content')
<div class="row   login_holder mt-5">

    <div class="col-md-12 d-flex justify-content-center ">
        <div style="width:352px; box-shadow: 0 4px 12px rgb(0 0 0 / 15%); -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 15%); border-radius:8px;"  class="card pb-5">
            <div class=" login_header mt-2 text-center"><img src='{{ asset('img/logo.png') }}' alt="transmog_logo"  height="200"></div>

            <div class="card-body mt-2">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <div>
                            <input style="height:42px;  border-radius:4px; border:1px solid lightgray;" id="email" placeholder="Email"  type="email" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-flex">
                            <input style="height:42px; border-radius:4px; border:1px solid lightgray;" id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-center">
                        <div>


                            <button style="height:42px; border-radius:45px; width:100%; color:white; font:bold 12px tahoma;  background-color: #9d5e1b;border: 1px solid #d0a13c;" type="submit">
                                {{ __('Login') }}
                            </button>
                            <br/>

                            @if (Route::has('password.request'))
                                <a style="text-decoration:none;" class="btn btn-link text-muted" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <br/>
                            <p class="or_line">OR</p>



                            <a class="mt-2 text-center" style="display:inline-grid; text-decoration:none;" href="{{ route('register') }}">
                                <span class="text-muted">Don't have an Account?</span>
                                <i style="color:#d0a13c;" class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
