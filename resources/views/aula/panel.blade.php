@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		
		<div class="col-md-12 col-md-offset-2">
			<div class="panel panel-default">
				 <div class="d-flex">
					{{------ Buscar ------ --}}
					 <input type="text" name="buscar" class="form-control input-sm " placeholder="Ingresar Aula que desea buscar " >
					  <div class="col-md-3">
                        <button class="btn btn-sl btn-default">Buscar</button>
					  </div>
					 {{-- -------- Boton de Agregar Aula y Característica -------- --}}
					 <div class="col-md-4">
						<a class=" btn btn-sl btn-primary float-right" href="{{ route('aulas.create') }}" >
							Cargar Aula 
						</a>
					</div>
						{{-- <a class=" btn btn-sl btn-primary float-right" href="{{ route('caracteristicas.index') }}" >
							Agregar Características 
						</a> --}}
				</div>
					<br> {{--  Enter Espacio --- titulo --}}
				<div class="panel-heading">
					<h2>Listado de Aulas</h2>
				</div>
			
					<div class="panel-body">
					
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Nombre del Aula</th>
									<th>Capacidad</th>
									<th >Edificio</th>
									<th >Piso</th>
									<th >Caracteristícas</th>
									{{-- <th colspan="3">&nbsp;</th> --}}
									<th >Editar</th>
									<th >Eliminar</th>
									
								</tr>
							</thead>
								<tbody>
									@foreach($aulas as $aula)
										<tr>
											<td>{{ $aula->nombre }}</td>

											<td>{{ $aula->capacidad }}</td>

											<td>{{ $aula->edificio->nombre }}</td>
											
											
											<td>{{ $aula->piso->nombre }}</td>
											

									
										 <td width="10px">
												<a href="#ver{{ $aula->id }}"  data-original-title="Editar Perfil"  title="Editar" class="btn btn-sm btn-default" data-toggle="modal" role ="button" > Ver</a>
											</td>

											<td width="10px">
												
                                               {{-- Boton de Editar --}}
												 <a href="#edit{{ $aula->id }}"  data-original-title="Editar Perfil"  title="Editar" class="btn  btn-warning btn-sm " data-toggle="modal" role ="button" > Editar </a>
											</td>

												<td width="10px">
													  <a href="#delete{{ $aula->id }}"  data-original-title="Remove this user"  title="Eliminar" class="btn  btn-danger btn-sm " data-toggle="modal" role ="button" > Eliminar  <i class="fa fa-trash-o"></i></a>
													
												</td>
										</tr>
										


										@endforeach
									
								</tbody>
							
						</table>


					</div>
					
			</div>

		</div>
		
	</div>

</div>


{{-- ***********************Modal de Edit********************************* --}}
   
              @foreach($aulas as $aula)
             <div class="modal fade" id="edit{{ $aula->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Editar Aula</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                       </div> 
			
				<form method="POST" action="{{url('aulas/editar/'.$aula->id)}}" class="bootstrap-form-with-validation">
					
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					@csrf

					<div class="container">
                        <div class="form-group">
					    <label for="exampleFormControlInput1">Nombre del Aula </label>
					    <input type="text" name="nombre" value="{{ $aula->nombre }}" class="form-control" required>
						</div>
		
					  
					
                        <div class="form-group">
					    <label for="exampleFormControlInput1">Capacidad </label>
					    <input type="text" value="{{$aula->capacidad}}" name="capacidad" class="form-control" required>
					  </div>

					  <div class="form-group row">
						 <div class="col-12">
							<label for="exampleFormControlSelect1">Edificio</label>
					  
					    <select class="form-control" name="edificio_id">

					    	
							<option value="{{ $aula->edificio->id }}">{{ $aula->edificio->nombre }}</option>
						 

					    	<option value="{{ $aula->edificio->id }}">{{ $aula->edificio->nombre }}</option>
								@foreach($edificios as $edificio) 
								<option value="{{ $edificio->id }}">{{ $edificio->nombre }}</option>
							@endforeach
							 

					    </select>

					  </div>
					  </div>
					  <div class="form-group row">
							 <div class="col-12">
							<label for="exampleFormControlSelect1">Piso</label>
							
					    <select class="form-control" name="piso_id">

							@foreach($pisos as $piso)
								<option value="{{$piso->id}}">{{ $aula->piso->nombre }}</option>

							@endforeach
									 

								<option value="{{$aula->piso->id}}">{{ $aula->piso->nombre }}</option>
									@foreach($pisos as $piso)
									<option value="{{$piso->id}}">{{ $piso->nombre }}</option>
									@endforeach
							

							</select>
							
							 </div>
					  </div>
 												
			<div class="form-group row">
				<div class="col-12">
						<label >Características Del Aula</label>
						<div class="form-check">
 
						
								@foreach($caracteristicas as $caracteristica)	
								<input class="form-check-input" type="checkbox" name="caracteristicas[]"
									@if ($aula->caracteristicas->has($caracteristica->id))
										checked = "checked"									
									@endif 
								value="{{$caracteristica->id}}">
									<label class="form-check-label" for="defaultCheck1">	 
										{{ $caracteristica->nombre }}
									</label><br/>
								@endforeach


						</div>
				</div>
			</div>
                        <div class="modal-footer  ">

							<input type="submit" value="Modificar Aula " class="btn btn-info btn-lg" style="width: 100%;"></input>						
							 
                        </div>
                    </div>

                    


                    </div>
			</form> 
				<!-- /.modal-content --> 
		</div>
                    <!-- /.modal-dialog --> 
	</div>


</div>

		{{-- ***********************Modal de Delete********************************* --}}
         <div class="modal fade" id="delete{{ $aula->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Eliminar Aula</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Está seguro que desea Eliminar El Aula?</div> 
                        </div>
                        <div class="modal-footer ">
                        <form method="post" action="{{ url('aulas/eliminar/'.$aula->id) }}">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                    
                                                   	@csrf
                                                
                            <button  class="btn btn-danger"  type="submit"><span class="fa fa-ok-sign"></span>Si</button></form> 
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-remove"></span> No</button>
                        </div>
                    </div>
                    <!-- /.modal-content --> 
                </div>
                    <!-- /.modal-dialog --> 
                </div>

{{-- ***********************Modal de Ver Caracteristicas ********************************* --}}

 <div class="modal fade" id="ver{{ $aula->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    	
                       <div class="form-check">
                       	<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Características del Aula</th>
									<th>Descripcion</th>
									
								</tr>
							</thead>
		
                       	<tbody>
							@foreach($aula->caracteristicas as $caracteristica)
								<tr>
									<td>{{ $caracteristica->nombre }}</td></br>
									<td>{{ $caracteristica->descripcion }}</td></br>
											
								</tr>
										

							@endforeach
									
						</tbody>
					</table>
						</div>

                    </div>
                    <!-- /.modal-content --> 
                </div>
                    <!-- /.modal-dialog --> 
         </div>


@endforeach	

@endsection
