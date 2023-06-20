@extends('layouts.app')

<link rel="stylesheet" href="{{asset('css/style.css')}}">

@section('content')
<div class="container">

                <div class="container">
                    <input type="checkbox" id="check">
                    <div class="login form">
                    <header>Login</header>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" placeholder="EMAIL" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                        <a href="#">Forgot password?</a>
                        <input type="submit" class="button" value="Login" >
                    </form>
                    <div class="signup">
                        <span class="signup">Don't have an account?
                        <label for="check">Signup</label>
                        </span>
                    </div>
                    </div>
                    <div class="registration form">
                    <header>Signup</header>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input id="name" placeholder="Nama" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        <input type="submit" class="button" value="Signup">
                    </form>
                    <div class="signup">
                        <span class="signup">Already have an account?
                        <label for="check">Login</label>
                        </span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


