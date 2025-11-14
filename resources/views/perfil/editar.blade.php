@extends('layouts.template')

@section('title', 'Editar Perfil - HS Automoveis')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Editar Perfil</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                                    name="name" value="{{ old('name', $user->name) }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                                    name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="{{ route('perfil.show', auth()->id()) }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                        @if (session('status') === 'perfil atualizado')
                            <div class="alert alert-success mt-3" role="alert">
                                Perfil atualizado com sucesso!
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Atualizar Senha</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Senha Atual *</label>
                            <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                                   id="current_password" name="current_password" required autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Nova Senha *</label>
                            <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                                   id="password" name="password" required autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Nova Senha *</label>
                            <input type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                                   id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                            @error('password_confirmation', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 align-items-center">
                            <button type="submit" class="btn btn-primary" id="saveSenhaBtn">Salvar Senha</button>
                            
                            @if (session('status') === 'password-updated')
                                <div class="alert alert-success mt-2 mb-0" role="alert">
                                    Senha atualizada com sucesso!
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-danger mb-5">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Excluir Conta</h5>
                </div>
                <div class="card-body">
                    <p>
                        Ao excluir sua conta, todos os seus dados serão permanentemente apagados. 
                        Antes de excluir, você deve digitar sua senha para confirmar a ação.
                    </p>
                    
                    <a href="{{ route('perfil.delete') }}">
                        <button type="submit" class="btn btn-danger">
                            Excluir conta
                        </button>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection