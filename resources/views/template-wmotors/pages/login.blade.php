@extends('layouts.template')

@section('title', 'Login - HS Automoveis')

@section('content')
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center mt-5 mb-5">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow">
          <div class="card-body p-5">
            <div class="text-center mb-4">
              <div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
            </div>

            @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="formulario-grupo">
                <label for="email">Email</label>
                <input 
                  id="email" 
                  type="email" 
                  name="email" 
                  class="@error('email') border-danger @enderror" 
                  value="{{ old('email') }}" 
                  required 
                  autofocus 
                  autocomplete="username"
                  placeholder="seu@email.com"
                >
                @error('email')
                  <small class="text-danger d-block mt-1">{{ $message }}</small>
                @enderror
              </div>

              <div class="formulario-grupo">
                <label for="password">Senha</label>
                <input 
                  id="password" 
                  type="password" 
                  name="password" 
                  class="@error('password') border-danger @enderror" 
                  required 
                  autocomplete="current-password"
                  placeholder="Sua senha"
                >
                @error('password')
                  <small class="text-danger d-block mt-1">{{ $message }}</small>
                @enderror
              </div>

              <div class="formulario-grupo">
                <label style="display: flex; align-items: center; gap: 0.5rem; font-weight: normal; cursor: pointer;">
                  <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember_me"
                    style="width: auto; margin: 0;"
                  >
                  <span>Lembrar-me</span>
                </label>
              </div>

              <div class="row mb-4 px-3">
                <small class="font-weight-bold">Não tem uma conta? <a href="{{ route('perfil.criar') }}" class="text-danger ">Registrar</a></small>
              </div>

              {{-- @if (Route::has('password.request'))
                <div class="formulario-grupo text-end">
                  <a href="{{ route('password.request') }}" style="text-decoration: none; color: var(--cor-primaria);">
                    Esqueceu sua senha?
                  </a>
                </div>
              @endif --}}

              <div class="formulario-grupo">
                <button type="submit" class="btn btn-primario btn-bloco">
                  Entrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
