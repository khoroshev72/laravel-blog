@extends('auth', ['title' => 'Войти'])

@section('content')
    <div class="card-body register-card-body">

        @include('flash')

        <form action="{{route('user.login')}}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="invalid-feedback">@if($errors->has('email')) {{$errors->first('email')}} @endif</div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <div class="invalid-feedback">@if($errors->has('password')) {{$errors->first('password')}} @endif</div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>

        </form>
        <a href="{{route('password_reset')}}" class="d-block mt-2">Забыли пароль?</a>
    </div>
@endsection

