@extends('layouts.template')

@section('title', 'Excluir perfil - HS Automóveis')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-warning mt-3">
                    <strong>Atenção!</strong> Esta ação é irreversível.<br>
                    Confirme digitando sua senha para excluir sua conta permanentemente.
                </div>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="mb-3">
                        <label for="password_delete" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" id="password_delete" required>
                    </div>

                    <button type="submit" class="btn btn-danger">
                        Confirmar exclusão
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
