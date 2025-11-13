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

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="alert alert-info" role="alert">
                                <p class="mb-2">Seu endereço de email não foi verificado.</p>
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info">
                                        Clique aqui para reenviar o email de verificação
                                    </button>
                                </form>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-success">
                                        Um novo link de verificação foi enviado para seu endereço de email.
                                    </p>
                                @endif
                            </div>
                        @endif

                        @if (session('status') === 'profile-updated')
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="{{ route('perfil.index', auth()->id()) }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                        @endif

                        @if (session('status') === 'profile-updated')
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
                            <button type="submit" class="btn btn-primary">Salvar Senha</button>
                            
                            @if (session('status') === 'password-updated')
                                <p class="text-success m-0">Salvo!</p>
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
                    
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                        Excluir Conta
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir sua conta? Por favor, **digite sua senha** para confirmar que deseja apagar sua conta permanentemente.</p>
                    
                    <div class="mb-3">
                        <label for="password_delete" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" id="password_delete" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Confirmar Exclusão</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection