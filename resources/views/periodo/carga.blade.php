@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Crear</h2>
				</div>
			
					<div class="panel-body">
						
					<form action="{{route('periodos.store')}}" method="POST">
					@csrf
						<div class="form-group">
					    	<label for="exampleFormControlInput1">Nombre del Periodo </label>
					    	<input type="text" name="nombre" class="form-control" required>
					  	</div>

					  	<div class="form-group">
					    	<label for="exampleFormControlInput1">Año </label>
					    	<input type="number" name="ano" class="form-control"  step="1" min="0" max="9999" placeholder="AAAA" required>
					  	</div>

					  	<div class="form-group">
					    	<label for="exampleFormControlInput1">Fecha de Inicio</label>
					    	<input type="date" name="fecha_inicio" class="form-control" required>
					  	</div>

					  	<div class="form-group">
					    	<label for="exampleFormControlInput1">Fecha de Fin </label>
					    	<input type="date" name="fecha_fin" class="form-control" required>
					  	</div>

					<div class=" text-muted d-flex justify-content-end">
                        <div class="col-sm-11 input-column">
                          <a href="{{ url('/') }}" data-original-title="cancelar" data-toggle="tooltip" role ="button"  class="btn  btn-light active ">Cancelar</a>  </div>
                       
                        <button class="btn btn-primary" type="submit">Siguiente</button>
					</div>
					  
						{{-- <div class="form-group">
							<a class=" btn btn-light active float-right" href="{{ url('/periodos') }}"> Cancelar </a>
							 <div class="col-sm-11 input-column">
							<button type="submit" class="btn btn-primary float-right">Enviar</button>
						</div>
						</div> --}}

					
					</form>
					</div>
					
			</div>

		</div>
		
	</div>

</div>

@endsection
