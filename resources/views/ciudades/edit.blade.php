@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">{{$titulo}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actualizar datos de ciudades</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('ciudades.update', $ciudad->id)}}">
                        @csrf
                         <input type="hidden" name="_method" value="PUT">
  
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Municipio</label>
                                    <select class="form-control" name="municipios">
                                        @foreach($municipios as $municipio)
                                        <option value="{{$municipio->id}}" {{$municipio->id == $ciudad->municipio->id ? 'selected' : ''}} >{{$municipio->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Ciudad
                                    </label>
                                    <input type="text" name="nombreCiudad" class="form-control" value="{{$ciudad->nombre}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                              <a href="#" class="btn btn-secondary">Cancel</a>
                              <input type="submit" value="Guardar" class="btn btn-success float-right">
                            </div>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
