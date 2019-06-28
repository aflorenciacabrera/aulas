@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Crear Caracteristicas de Aulas </h2>
				</div>
			
					<div class="panel-body">
						
			<form action="{{ route('caracteristicas.store') }}" method="POST">
				@csrf
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la Caracteristica </label>
					    <input type="text" name="nombre" class="form-control" required >
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Descripcion </label>
					    <input type="text" name="descripcion" class="form-control" required >
					  </div>
					

				<div class="form-group">
					<a class=" btn btn-light active float-right" href="{{ url('caracteristicas') }}"> Cancelar </a>
					<button type="submit" class="btn btn-primary float-right">Guardar</button>

				</div>

					
			</form>
					</div>
					
			</div>

		</div>
		
	</div>

</div>


@endsection