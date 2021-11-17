@extends('layouts.auth')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h1 class="card-title text-center mb-5 display-6 fw-bolder">Lupa Password</h1>
            <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="form-floating mb-2">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                <label for="floatingInput">Email address</label>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Reset Password</button>
              </div>
              <hr class="my-2">
              <div class="d-grid mb-2">
                <a href="/login" class="btn btn-google btn-login text-uppercase fw-bold">
                  <i class="fab fa-google me-2"></i> Sign In
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection