@extends('adminlte::page')

@section('title', 'SISGA')

@section('content_header')
    
@stop

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6"> <!-- Col1 -->
			<div class="card">
              	<div class="card-header">
                	<div class="col title-header">Registro de Raza</div>
              	</div><!-- /.card-header -->
              	@if(session('msj'))
	 			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  		<strong>¡Felicidades!</strong> {{ session('msj') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
				</div>
	 			@endif
	              
                <div class="card-body">
                	<div class="form-registro">
          			<form action="{{ route('raza.crear', $finca->id_finca) }}" method="POST">
            		@csrf
		            @error('descripcion')
		              <div class="alert alert-warning alert-dismissible fade show" role="alert">
		                <strong>Atención!</strong> El campo Nombre de la raza es obligatorio o ya existe.
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                </button>
		              </div>
		            @enderror
		            @error('nombreraza')
		              <div class="alert alert-warning alert-dismissible fade show" role="alert">
		                <strong>Atención!</strong> El campo Nomenclatura es obligatorio o ya existe. 
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                </button>
		              </div>
		            @enderror
		            @error('especie')
		              <div class="alert alert-warning alert-dismissible fade show" role="alert">
		                <strong>Atención!</strong> El nombre de la especie es obligatorio.
		                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                  <span aria-hidden="true">&times;</span>
		                </button>
		              </div>
		            @enderror
            		<div class="form-group">
                		<label>Nombre:</label>
		                    <input 
		                      	class="form-control" 
		                      	id="descripcion" 
		                      	type="text" 
		                      	name="descripcion"  
		                      	placeholder="Nombre de la Raza" 
		                      	value="{{ old('descripcion') }}">
                   		<label>Nomenclatura:</label>
		                    <input 
			                    class="form-control" 
			                    id="nombreraza" 
			                    type="text" 
			                    name="nombreraza"  
			                    placeholder="Nomenclatura" 
			                    value="{{ old('nombreraza') }}">
                  		
                  		<label class="col-form-label">Especie:</label>
	                  		<select class="form-select" name="especie" 
                  				id="especie" aria-label="select example">
                              	<option value=" " selected>Seleccione una opción</option>
                              	
                              	@foreach($especie as $item)
                              	
                              	<option value="{{ $item->id }}">{{ $item->nombre." (".$item->nomenclatura.")" }}</option> 
                              
                              	@endforeach() 
	                        </select>    
           				</div>
        			</div>
                </div>  <!-- /.card-body -->

	            <div class="card-footer clearfix">
	            	<button type="submit" class="btn alert-success aling-boton">
              		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-broadcast" viewBox="0 0 16 16">
                  		<path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 0 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
              		</svg> Registrar</button>
              		<a href="{{route('admin',$finca->id_finca)}}" class="btn btn-warning aling-boton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                	<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              		</svg> volver</a>
          			</form>
	           		</div>
	        	</div>
		</div> <!--/.col1 -->
		<div class="col-md-6">
			<div class="card">
              	<div class="card-header">
               		<div class="col title-header">Listado de Raza</div>
              	</div><!-- /.card-header -->
             	<div class="card-body">
             		<table class="table">
				        <thead>
				            <tr>
				              <th scope="col">Raza</th>
				              <th scope="col">Nomenclatura</th>
				              <th scope="col">Especie</th>
				              <th scope="col">Acción</th>
				            </tr>
				        </thead>
          				<tbody>
		         		@foreach($raza as $item)
		            		<tr>
				              <td>
				                {{ $item->descripcion }}
				              </td>
				              <td>
				                {{ $item->nombreraza }}
				              </td>
				              <td>
				                {{ $item->nombre }}
				              </td>
				              <td>
				               	<a href="{{ route ('raza.editar', [$finca->id_finca, $item->idraza]) }}" class="btn alert-success btn-sm">
					              	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					              	<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					            	<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					            	</svg> 
				            	</a>
				                <form action="{{ route('raza.eliminar',[$finca->id_finca, $item->idraza] ) }}" class="d-inline" method="POST">
				                @method('DELETE')
				                @csrf
					                <button type="submit" class="btn btn-danger btn-sm">
					                	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
					                	<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
					              		<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
					              		</svg> 
					              	</button>
				            	</form> 
				              </td>
		            		</tr>
			        	@endforeach()
	          			</tbody>
	      				</table>
              	</div>
              	<!-- /.card-body -->
              	<div class="card-footer clearfix">
                	<div class="col">{{$raza->links()}}</div> 
              	</div>
	        </div> 
		</div> <!-- /.col2-->
	</div>
</div>
@stop

@section('css')
<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">
    $(".alert-dismissible").fadeTo(3000, 500).slideUp(500, function(){
       $(".alert-dismissible").alert('close');
});
    </script>
    

@stop
