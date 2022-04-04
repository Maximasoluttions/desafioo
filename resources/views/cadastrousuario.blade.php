@extends('adminlte::page')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">{{ __('') }}</div>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-20">

              <form action="/events" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Usuário</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="usuario" readonly>
                  </div>
                  <div class="form-group">
                    <label>Desejo</label>
                    <input type="text" class="form-control" name="desejo" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-primary">Registrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection