@extends('adminlte::page')

@section('title', 'Meus Produtos')

@section('content')

<div id="search-container" class="col-md-4">
    <h2>Lista de desejos</h2>
    <form action="/listar" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar: Usuário - Desejo - Data">
    </form>
</div>
<div id="col-md-10 offset-md-1 dashboard-events-container">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    
        @foreach($events as $event)
        <div class="col-md-10 offset-md-1 dashboard-events-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome do usuário</th>
                    <th scope="col">Desejo</th>
                    <th scope="col">Data</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a>{{ $event->usuario }}</a></td>
                    <td><a>{{ $event->desejo }}</a></td>
                    <td><a>{{ $event->updated_at }}</a></td>
                    
                    <td>
                        <form action="/view/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg> Deletar
                            </button>
                        </form>
                    </td>
                    <td>
                </tr>
            </tbody>
                @endforeach
                @if(count($events) == 0 && $search)
                <p>Não foi possível encontrar nenhum produto com {{$search}}! <a href="/listar">Ver todos</a></p>
                @elseif(count($events) == 0)
                <p>Não há produtos disponíveis</p>
                @endif

</div>

@endsection