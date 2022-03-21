@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <p>Авторизация</p>
                @auth
                    <div class="alert alert-success">Вы успешно авторизованы</div>
                @endauth
                @guest
                    @error('auth')
                        <div class="alert alert-danger">Неверный логин или пароль</div>
                    @enderror
                    @if(session()->has('register'))
                        <div class="alert alert-primary">Регистрация прошла успешно, выполните авторизацию</div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="inputLogin" aria-describedby="inputLoginValidation" placeholder="Логин">
                            @error('login')
                            <div id="inputLoginValidation" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" aria-describedby="inputPasswordValidation" placeholder="Пароль">
                            @error('password')
                            <div id="inputPasswordValidation" class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
