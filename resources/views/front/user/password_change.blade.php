@extends('auth', ['title' => 'Новый пароль'])

@section('content')
    <div class="card-body register-card-body">

        <form action="{{route('password_store', $item->email)}}" method="post">
            @csrf

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

            <button type="submit" class="btn btn-primary btn-block">Сохранить пароль</button>

        </form>
    </div>
@endsection

