@extends('layouts.template')

@section('title', 'Perfil admin - HS Automoveis')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Perfil admin</h1>
            
            @if(Auth::check())
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Detalhes do Usuário
                    </div>
                    <div class="card-body">
                        
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">ID do Usuário:</div>
                            <div class="col-sm-9"><strong>{{ Auth::user()->id }}</strong></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">Nome:</div>
                            <div class="col-sm-9"><strong>{{ Auth::user()->name }}</strong></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">Email:</div>
                            <div class="col-sm-9"><strong>{{ Auth::user()->email }}</strong></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-sm-3 text-muted">Criado em:</div>
                            <div class="col-sm-9"><strong>{{ Auth::user()->created_at->format('d/m/Y') }}</strong></div>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('perfil.editar') }}" class="btn btn-warning me-2">Editar Perfil</a>
                        </div>
                        
                    </div>
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    Usuário não autenticado. Por favor, faça login para ver o perfil.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection