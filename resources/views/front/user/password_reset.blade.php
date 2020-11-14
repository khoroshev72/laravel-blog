@extends('auth', ['title' => 'Восстановить пароль'])

@section('content')
    <div class="card-body register-card-body">

        @include('flash')

        <form action="#" method="post">
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

            <button type="submit" class="btn btn-primary btn-block">Восстановить пароль</button>

        </form>
    </div>
@endsection


