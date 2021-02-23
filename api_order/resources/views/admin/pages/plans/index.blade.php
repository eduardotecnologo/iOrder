@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i></a></h1>
    <lo class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}" class="active">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('plans.index') }}">Planos</a>
        </li>
    </lo>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search')}}" class="form  form-inline" method="POST">
                @csrf
                <input style="width: 250px;" type="text" name="filter" class="form-control" value="{{ $filters['filter'] ?? ''}}"
                placeholder="Pesquisar nome do Plano">
                <button style="margin-left: 5px;" type="submit" class="btn btn-dark"><i class="fas fa-search-plus"></i></button>
            </form>
        </div>
        <div class="vard-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>
                            <td>
                                {{$plan->description}}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.')}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-info">Detalhes</a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-warning">Editar</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-primary">Visualizar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
              {!! $plans->appends($filters)->links() !!}
            @else
              {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
