@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Panel del Administrador</div>

                <div class="card-body">
                    {{-- Mensaje de alerta --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            {{-- *************** Menu de Botones ******************************--}}
                    <div class="container">
                            <div class="row justify-content-center">
                                {{-- Panel de botones --}}
                                    <div class="links">
                                         {{-- Perfil --}}
                                        {{-- <a class="btn btn-outline-info  btn-lg" role="button"  href="{{ url('/perfil') }}"> --}}
                                            {{-- <img src="{{asset('img/perfil.jpg')}}" width="100" /><br> --}}
                                            {{-- <span class="label label-default">Perfil</span></a> --}}

                                        {{--boton de redireccion a  Aulas --}}
                                        <a class="btn btn-outline-danger  btn-lg" role="button" href="{{ url('/aulas') }}">
                                            {{-- <img src="{{asset('img/nuevo.png')}}" width="100" /><br> --}}
                                            <span class="label label-default">Aula  </span> </a>

                                        {{--boton de redireccion a  Edificio --}}
                                        <a class="btn btn-outline-warning  btn-lg" role="button" href="{{ url('/edificios') }}">
                                            {{-- <img src="{{asset('img/lista.png')}}" width="100" /><br> --}}
                                            <span class="label label-default">Edificio </span> </a>

                                        {{--boton de redireccion a  reservas --}}
                                        <a class="btn btn-outline-primary  btn-lg" role="button"  href="{{ url('/reserva') }}">
                                            {{-- <img src="{{asset('img/contacto.png')}}" width="100"/><br> --}}
                                            <span class="label label-default">Reservas </span></a>

                                             <a class="btn btn-outline-success  btn-lg" role="button"  href="{{ url('/periodos') }}">
                                            {{-- <img src="{{asset('img/contacto.png')}}" width="100"/><br> --}}
                                            <span class="label label-default">Periodo </span></a>

                                    </div>
                            </div>
                    </div>
        {{--*************** Fin de menu de botones **********************--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
