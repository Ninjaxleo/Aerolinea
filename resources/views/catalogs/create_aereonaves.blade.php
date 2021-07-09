@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                @if(isset($aereonave))
                    <h2>Modificar Aereonave</h2>
                @else
                    <h2>Crear nueva Aereonave</h2>
                @endif
            </div>
            <div class="col-2">
                <a href="{{route('aereonaves')}}">Regresar</a>
            </div>
        </div>
        @if(isset($aereonave))
            <form  method="POST" action="{{ route('update_aereonave',$aereonave->id) }}">
                {{ method_field('PUT') }}
        @else
            <form  method="POST" action="{{ route('new_aereonave') }}">
        @endif


            <div class="row">
                @error('mensaje')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                @csrf
                <div class="col-12 mb-3">
                    <label for="descripcion" class="form-label">Serie</label>
                    @if(isset($aereonave))
                        <input type="text" name="descripcion" class="form-control" value="{{$aereonave->descripcion}}">
                    @else
                        <input type="text" name="descripcion" class="form-control" placeholder="">
                    @endif
                </div>
                <div class="col-12 mb-3">
                    <label for="caracteristicas" class="form-label">Características</label>
                    @if(isset($aereonave))
                        <textarea class="form-control" name="caracteristicas" rows="3">{{$aereonave->caracteristicas}}</textarea>
                    @else
                        <textarea class="form-control" name="caracteristicas" rows="3"></textarea>
                    @endif
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="id_tipo_aereonave" class="form-label">Tipo</label>
                    <select class="form-select" aria-label="id_tipo_aereonave" name="id_tipo_aereonave">
                        @foreach($tipos as $tipo)
                            @if(isset($aereonave))
                                @if($tipo->id==$aereonave->id_tipo_aereonave)
                                    <option value="{{$tipo->id}}" selected>{{$tipo->descripcion}}</option>
                                @else
                                    <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                @endif
                            @else
                                <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <label for="id_tamanio_aereonave" class="form-label">Tamaño</label>
                    <select class="form-select" aria-label="id_tamanio_aereonave" name="id_tamanio_aereonave">
                        @foreach($tamanios as $tamanio)
                            @if(isset($aereonave))
                                @if($tamanio->id==$aereonave->id_tamanio_aereonave)
                                    <option value="{{$tamanio->id}}" selected>{{$tamanio->descripcion}}</option>
                                @else
                                    <option value="{{$tamanio->id}}">{{$tamanio->descripcion}}</option>
                                @endif
                            @else
                                <option value="{{$tamanio->id}}">{{$tamanio->descripcion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-6 mb-5">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">
                            @if(isset($aereonave))
                                Guardar cambios
                            @else
                                Guardar
                            @endif
                        </button>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-5">
                    <div class="d-grid gap-2">
                        @if(isset($aereonave))
                            <a class="btn btn-secondary" type="button" href="{{route("aereonaves")}}">Cancelar</a>
                        @else
                            <button class="btn btn-secondary" type="reset">Cancelar</button>
                        @endif

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
