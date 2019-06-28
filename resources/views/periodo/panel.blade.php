@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-2">
			@if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

			<div class="panel panel-default">
				<div class="panel-heading">
					Lista de Periodos
					<a class=" btn btn-sm btn-primary float-right" href="{{ route('periodos.create') }}" >
						Cargar Periodo
					</a>
				</div>

					<div class="panel-body">	
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Ver</th>
									<th>Editar</th>
									<th>Eliminar</th>
									{{-- <th colspan="3">&nbsp;</th> --}}
								</tr>
							</thead>

								<tbody>
									@foreach($periodos as $periodo)
										
										<tr>
											<td>{{ $periodo->nombre }}</td>
									
											<td width="10px">
											 <a href="#ver{{ $periodo->id }}"  data-original-title="Ver Periodo"  title="Ver" class="btn  btn-primary btn-sm " data-toggle="modal" role ="button" > Ver </a>

											</td>

											<td width="10px">
												
                                              {{-- Boton de Editar --}}
												 <a href="#edit{{ $periodo->id }}"  data-original-title="Editar Periodo"  title="Editar" class="btn  btn-warning btn-sm " data-toggle="modal" role ="button" > Editar </a>

											</td>

												<td width="10px">
													  <a href="#delete{{ $periodo->id }}"  data-original-title="Remove this user"  title="Eliminar" class="btn  btn-danger btn-sm " data-toggle="modal" role ="button" > Eliminar  <i class="fa fa-trash-o"></i></a>
													
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

   
       @foreach($periodos as $periodo)
        {{-- ***********************Modal de ver********************************* --}}
                <div class="modal fade" id="ver{{ $periodo->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        
                            <h4 class="modal-title custom_align" id="Heading">Ver Periodo </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                        </div>
                        
                        <div class="modal-body">            
                            <div class="form-group ">
                            <label for="usuario" >Nombre del Periodo:</label>
                                
                               {{$periodo->nombre}}
                                
                            </div>
                            	<div class="form-group">
					    	<label for="exampleFormControlInput1">Año </label>
					    	{{$periodo->ano}}
					  	</div>

					  	<div class="form-group">
					    	<label for="exampleFormControlInput1">Fecha de Inicio</label>
					    	{{$periodo->fecha_inicio}}
					  	</div>

					  	<div class="form-group">
					    	<label for="exampleFormControlInput1">Fecha de Fin </label>
					    	{{$periodo->fecha_fin}}
					  	</div>
                        
                        </div>
                        <div class="modal-footer  ">

											
							 
                        </div>
                    </div>
                    
                    <!-- /.modal-content --> 
                </div>
                    <!-- /.modal-dialog --> 
				</div>
  {{-- ***********************Modal de editar********************************* --}}
                <div class="modal fade" id="edit{{ $periodo->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        
                            <h4 class="modal-title custom_align" id="Heading">Edit Periodo </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                        </div>
                        <form method="POST" action="{{url('periodos/editar/'.$periodo->id)}}" class="bootstrap-form-with-validation">
                      {{ csrf_field() }}
					{{ method_field('PUT') }}
					@csrf
                        <div class="modal-body">            
                            <div class="form-group row">
                            <label for="usuario" class="col-md-4 col-form-label text-md-center">Nombre del Periodo:</label>
                                <div class="col-md-6">
                                <input class="form-control " name="nombre" value="{{$periodo->nombre}}" type="text" placeholder="">
                                </div>
                            </div>
                            	<div class="form-group">
					    	<label for="exampleFormControlInput1">Año </label>
					    	<input type="number" name="ano" class="form-control"  step="1" min="0" max="9999" placeholder="AAAA" value="{{$periodo->ano}}">
					  	</div>

					  	<div class="form-group">
					    	<label for="exampleFormControlInput1">Fecha de Inicio</label>
					    	<input type="date" name="fecha_inicio" class="form-control" value="{{$periodo->fecha_inicio}}">
					  	</div>

					  	<div class="form-group">
					    	<label for="exampleFormControlInput1">Fecha de Fin </label>
					    	<input type="date" name="fecha_fin" class="form-control" value="{{$periodo->fecha_fin}}">
					  	</div>
                        
                        </div>
                        <div class="modal-footer  ">

							<input type="submit" value="Actualizar " class="btn btn-info btn-lg" style="width: 100%;"></input>						
							 
                        </div>
                    </div>
                     </form> 
                    <!-- /.modal-content --> 
                </div>
                    <!-- /.modal-dialog --> 
				</div>
		
				 {{-- ***********************Modal de Delete********************************* --}}
                <div class="modal fade" id="delete{{ $periodo->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Eliminar Periodo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Está seguro que desea Eliminar este Periodo?</div> 
                        </div>
                        <div class="modal-footer ">
                        <form method="post" action="{{ url('periodos/eliminar/'.$periodo->id) }}">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                                                        
                            <button  class="btn btn-danger"  type="submit"><span class="fa fa-ok-sign"></span>Si</button></form> 
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-remove"></span> No</button>
                        </div>
                    </div>
                    <!-- /.modal-content --> 
                </div>
                    <!-- /.modal-dialog --> 
                </div>
 	@endforeach	
@endsection
