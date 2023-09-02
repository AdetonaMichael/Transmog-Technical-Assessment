@extends('layouts.app')

@section('content')
            <div class="row   login_holder">

                <div class="col-md-12 d-flex justify-content-center">
                    <div style="width:352px; "  class="card pb-5">
                        <div class=" login_header mt-2 text-center"><img src='{{ asset('img/logo.png') }}' alt="Adonbox-shadow: 0 4px 12px rgb(0 0 0 / 15%); -webkit-box-shadow: 0 4px 12px rgb(0 0 0 / 15%); border-radius:8px;is Logo"  height="200"></div>

                        <div class="card-body mt-2">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <div>
                                        <input style="height:42px;  border-radius:4px; border:1px solid lightgray;" id="name" placeholder="Username"  type="text" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                       @enderror
                                    </div>
                                </div>
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
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="password-addon">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="mb-3">
                                        <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                                        <button style="height:42px; border-radius:45px; width:100%; color:white; font:bold 12px tahoma;        background-color: #9d5e1b;border: 1px solid #d0a13c;  }" type="submit">
                                            {{ __('Register') }}
                                        </button>
                                        <br/>
                                        <a class="mt-2 text-center" style="display:inline-grid; text-decoration:none" href="{{ route('login')}}">
                                            <span class="text-muted text-sm mt-2">Already Have an Account?</span>
                                            <i style="color:#d0a13c;" class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function () {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // toggle the icon
                this.classList.toggle("bi-eye");
            });

            // prevent form submit
            // const form = document.querySelector("form");
            // form.addEventListener('submit', function (e) {
            //     e.preventDefault();
            // });
        </script>
</section>

@endsection
