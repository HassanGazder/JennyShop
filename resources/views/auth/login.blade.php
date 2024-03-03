@extends('layout')

@section('master')
<style>

</style>

<div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full inner_page_head">
                     <h3>LOGIN</h3>
                  </div>
               </div>
            </div>
         </div>

<div class="container">

    <div class="row justify-content-center mt-4 mb-4">
        <div class="col-md-8">
            <div class="card" style="padding-top:30px;padding-bottom:30px;">
                <div class="card-header" style="display:none;">{{ __('Login') }}</div>

                <div class="col-lg-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                            <div class="col-md-12">
                                <input id="password" placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" style="margin-left:-220px;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" style="border: none;
padding: 15px 45px; width: auto;font-size: 16px;text-transform: capitalize; line-height: normal; margin: 0 auto; display: flex; background: #333;color: #fff;
    font-weight: 600;border-radius:5px;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="
    padding: 15px 20px;
    width: 233px;
    font-size: 16px;
    text-transform: capitalize;
    line-height: normal;
    margin: 10px auto;
    display: flex;
    border-radius:5px;
    background: #333;
    color: #fff;
    font-weight: 600;text-decoration:none;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
