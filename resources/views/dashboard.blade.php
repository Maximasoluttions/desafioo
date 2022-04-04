@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<div id="search-container" class="col-md-4">
    <h1>Lista de desejos</h1>
    <form action="/listar" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar: Usuário - Desejo - Data">
    </form>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nome do usuário</th>
                <th scope="col">desejo</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
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
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem nenhum produto cadastrado, <a href="/cadastro-usuario"></a>Cadastrar produto</p>
    @endif
</div>

@endsection