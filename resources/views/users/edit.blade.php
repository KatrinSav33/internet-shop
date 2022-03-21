@extends('welcome')

@section('title-content')
    Добавление товара
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h1 class="display-5 my-4">Редактировать аккаунт</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success">Изменения сохранены</div>
                @endif
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="inputFull_name" aria-describedby="inputFull_nameValidation" placeholder="ФИО">
                        @error('full_name')
                        <div id="inputFull_nameValidation" class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="inputAddress" aria-describedby="inputAddressValidation" placeholder="Адрес">
                        @error('address')
                        <div id="inputAddressValidation" class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" aria-describedby="inputPasswordValidation" placeholder="Пароль">
                        @error('password')
                        <div id="inputPasswordValidation" class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation"  class="form-control" id="inputConfirmedPassword" placeholder="Повторите пароль">
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
