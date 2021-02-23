@extends('adminlte::page')

@section('title', 'Detalhe do Plano {$plan->name}')

@section('content_header')
    <lo class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index',$plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.create',$plan->url) }}">Novo</a></li>
    </lo>
    <h1>Detalhes do Plano {{ $plan->name }} <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="vard-body">
            #form
        </div>
    </div>
@endsection
