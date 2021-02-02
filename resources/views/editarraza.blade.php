@extends('adminlte::page')

@section('title', 'SISGA')

@section('content_header')
    
@stop

@section('content')

<div class="container">
	<div class="row">
		<div class="col card-especie mr-3 border-style"> <!--Form y Validación-->
			<div class="row row-list border-bottom">
				<div class="col title-header">Edición de Raza</div>
			</div>
			@if(session('msj'))
		 		<div class="alert alert-success alert-dismissible fade show" role="alert">
			  	<strong>¡Felicidades!</strong> {{ session('msj') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
				</div>
 			@endif
			<div class="row my-4">
				<div class="form-registro">
					<form action="{{ route('raza.update', [$raza->idraza, $finca->id_finca]) }}" method="POST">
						@method('PUT')
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
					            value="{{ $raza->descripcion }}">

				          	<label class="my-2">Nomenclatura:</label>
					          <input 
					            class="form-control" 
					            id="nombreraza" 
					            type="text" 
					            name="nombreraza"  
					            placeholder="Nomenclatura" 
					            value="{{ $raza->nombreraza }}">

					        <label class="col-form-label">Especie:</label>
							    <select class="form-select" name="especie" 
							    id="especie" aria-label="select example">
	                            
	                            <option value=" " selected>Seleccione una opción</option>
	                            @foreach($tableraza as $tr )
	                            	<option value="{{ $tr->id_especie }}" selected>{{ $tr->nombre." (".$tr->nomenclatura.")" }}</option>
	                            @endforeach()

	                            @foreach($especie as $item)
		                         	<option value="{{ $item->id }}">{{ $item->nombre." (".$item->nomenclatura.")" }}</option>	
	                          	@endforeach()	
	                          	</select>    
					  </div>
					
						<button type="submit" class="btn alert-success aling-boton">
						 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
				  		<path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
				  		<path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
						</svg> Guardar</button>

						  <a href="{{ route('admin',$finca->id_finca) }}" class="btn btn-warning aling-boton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
				  		  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
						  </svg> volver</a>
					</form>
				</div>
			</div>
		</div>
		<div class="col card-especie-grid ml-3 border-style"> <!--Grid -->
			
			<div class="row row-list border-bottom">
				<div class="title-header">Listado de Raza</div>
			</div>
			<table class="table table-especie">
	  			<thead>
				    <tr>
				      <th scope="col">Raza</th>
				      <th scope="col">Nomenclatura</th>
				      <th scope="col">Especie</th>
				    </tr>
	  			</thead>
	  			<tbody>
	
		    		<tr>
				      <td>
				      	{{ $tr->descripcion }}
				      </td>
				      <td>
				      	{{ $tr->nombreraza }}
				      </td>
				      <td>
				  		{{ $tr->nombre }}
				      </td>
				    </tr>
				 
	  			</tbody>
			</table>
		</div>

	</div>
</div>
@stop

@section('css')
<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
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


