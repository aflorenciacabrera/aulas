@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Listado de Características
					
						<a class=" btn btn-sm btn-primary float-right" href="{{ route('caracteristicas.create') }}" >
							Agregar Características 
						</a>

				</div>
			
					<div class="panel-body">
					
						<table class="table table-striped table-hover">
							<thead>

								<tr>
									<th>ID</th>
									<th>Nombre de la Característica</th>
									<th>Descripcion</th>
									
									<th colspan="3">&nbsp;</th>
								</tr>

							</thead>
								<tbody>
									@foreach($caracteristicas as $caracteristica)
										<tr>
											<td>{{ $caracteristica->id }}</td>
											<td>{{ $caracteristica->nombre }}</td>
											<td>{{ $caracteristica->descripcion }}</td>

											<td width="10px">
												
                                               {{-- Boton de Editar --}}
												 <a href="#edit{{ $caracteristica->id }}"  data-original-title="Editar Perfil"  title="Editar" class="btn  btn-warning btn-sm " data-toggle="modal" role ="button" > Editar </a>
											</td>

												<td width="10px">
													  <a href="#delete{{ $caracteristica->id }}"  data-original-title="Remove this user"  title="Eliminar" class="btn  btn-danger btn-sm " data-toggle="modal" role ="button" > Eliminar  <i class="fa fa-trash-o"></i></a>
													
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
   
              @foreach($caracteristicas as $caracteristica)
             <div class="modal fade" id="edit{{ $caracteristica->id }}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Editar Característica</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                       </div> 
			
				<form method="POST" action="{{url('caracteristicas/editar/'.$caracteristica->id)}}" class="bootstrap-form-with-validation">
					
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					@csrf

				
                        <div class="form-group">
					    <label for="exampleFormControlInput1">Nombre de la Caracteristica </label>
					    <input type="text" name="nombre" value="{{ $caracteristica->nombre }}" class="form-control" required>
						</div>
		
					  
					  <div class="container">
                        <div class="form-group">
					    <label for="exampleFormControlInput1">Descripcion </label>
					    <input type="text" value="{{$caracteristica->descripcion}}" name="descripcion" class="form-control" required>
					  </div>

				

                        <div class="modal-footer  ">

							<input type="submit" value="Modificar Caracteristica " class="btn btn-info btn-lg" style="width: 100%;"></input>						
							 
                        </div>
                    </div>

                    


                    </div>
			</form> 
				<!-- /.modal-content --> 
		</div>
                    <!-- /.modal-dialog --> 
	</div>


</div>

{{-- ***********************  Modal de Delete Caracteristica  ********************************* --}}
         <div class="modal fade" id="delete{{ $caracteristica->id }}" tabindex="-1" role="dialog" aria-labelledby="eliminar" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title custom_align" id="Heading">Eliminar Caracteristica</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-times" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Está seguro que desea Eliminar La Caracteristica?</div> 
                        </div>
                        <div class="modal-footer ">
                        <form method="post" action="{{ url('caracteristicas/eliminar/'.$caracteristica->id) }}">
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




@endforeach	

@endsection