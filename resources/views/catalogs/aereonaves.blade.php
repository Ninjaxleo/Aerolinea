@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <h2>Aereonaves</h2>
            </div>
            <div class="col-2">
                <a href="{{route('create_aereonaves')}}" >Nueva aereonave</a>
            </div>
        </div>
        <div class="row">
            @error('mensaje')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Serie</th>
                        <th scope="col">Caracteristicas</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Tamaño</th>
                        <th scope="col">Fecha</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aereonaves as $aereonave)
                        <tr>
                            <th scope="row">{{$aereonave->descripcion}}</th>
                            <td>{{$aereonave->caracteristicas}}</td>
                            <td>{{$aereonave->tipo}}</td>
                            <td>{{$aereonave->tamanio}}</td>
                            <td>{{$aereonave->dtcreated}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Opciones
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('edit_aereonave',["id"=>$aereonave->id])}}">Editar</a></li>
                                        <li><a class="dropdown-item" href="{{route('delete_aereonave',["id"=>$aereonave->id])}}">Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
