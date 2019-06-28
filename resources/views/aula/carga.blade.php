@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Crear Aula </h2>
				</div>
			
		<div class="panel-body">
						
					<form action="{{route('aulas.store')}}" method="POST">
						@csrf
					  <div class="form-group">
					    <label for="exampleFormControlInput1">Nombre del Aula </label>
					    <input type="text" name="nombre" class="form-control" required>
					  </div>

					  <div class="form-group">
					    <label for="exampleFormControlInput1">Capacidad </label>
					    <input type="text" name="capacidad" class="form-control" required>
					  </div>
					  
					  <div class="form-group row">
						 <div class="col-12">
							<label for="exampleFormControlSelect1">Edificio</label>
							<a class=" btn btn-sm btn-primary float-right" href="{{ route('edificios.create') }}" >
								<span class="fa fa-plus"></span>	Agregar Edificio 
							</a>
						 
					  
					  
					    <select class="form-control" name="edificio_id">
					    	 @if($edificios->count() > 0)
								@foreach($edificios as $edificio)
								<option value="{{ $edificio->id }}">{{ $edificio->nombre }}</option>
							@endforeach
							  @else
           							No Record Found
            				  @endif   
					    </select>

					  </div>
					  </div>
					  <div class="form-group row">
							 <div class="col-12">
							<label for="exampleFormControlSelect1">Piso</label>
							<a class=" btn btn-sm btn-primary float-right" href="{{ route('pisos.create') }}" >
						<span class="fa fa-plus"></span>	Agregar Piso 
						</a>
					    <select class="form-control" name="piso_id">
							@if ($pisos->count())
									@foreach($pisos as $piso)
									<option value="{{$piso->id}}">{{ $piso->nombre }}</option>
									@endforeach
										@else
									 <option value=""> -  </option>
							@endif
							</select>
							
							 </div>
					  </div>
 												
			<div class="form-group row">
				<div class="col-12">
						<label >Características Del Aula</label>
						<a class=" btn btn-sm btn-primary float-right" href="{{ route('caracteristicas.index') }}" >
						<span class="fa fa-plus"></span>	Agregar Características 
						</a>
						<div class="form-check">
							@if ($caracteristicas->count())
								@foreach($caracteristicas as $caracteristica)	
								<input class="form-check-input" type="checkbox" name="caracteristicas[]" value="{{$caracteristica->id}}">
												<label class="form-check-label" for="defaultCheck1">	 
													{{ $caracteristica->nombre }}
												</label><br/>
								@endforeach
							@else
								No hay característica   
							@endif
						</div>
				</div>
			</div>

				<div class="form-group">
					<a class=" btn btn-light active float-right" href="{{ url('/aulas') }}"> Cancelar </a>
					<button type="submit" class="btn btn-primary float-right">Aceptar</butto>
				</div>
				
			</form>
					</div>
					
			</div>

		</div>
		
	</div>

</div>

@endsection
