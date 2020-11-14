@extends('auth', ['title' => 'Регистрация'])

@section('content')
    <div class="card-body register-card-body">

        <form action="{{route('user.store')}}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" value="{{old('name')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <div class="invalid-feedback">@if($errors->has('name')) {{$errors->first('name')}} @endif</div>
            </div>

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

            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <div class="invalid-feedback">@if($errors->has('password_confirmation')) {{$errors->first('password_confirmation')}} @endif</div>
            </div>


            <button type="submit" class="btn btn-primary btn-block">Register</button>

        </form>

        <a href="{{route('user.login')}}" class="text-center d-inline-block mt-2">У меня уже есть аккаутн</a>
    </div>
@endsection
