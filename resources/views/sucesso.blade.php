@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                <form action="/cadastro-usuario">
                    <main>
                        <div class="container-fluid">
                            <div class="row">
                                @if(session('msg'))
                                <p class="msg">{{ session('msg')}}</p>
                                @endif
                                @yield('content')
                            </div>
                        </div>
                    </main>
                        <button type="submit" class="btn btn-success">Cadastrar novo desejo</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

