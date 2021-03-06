@extends('adminlte::page')

@section('title', 'SISGA')

@section('content_header')
    
@stop

@section('content')

<div class="container">
	<div class="row">
		<div class="col card-especie mr-3 border-style"> <!--Form y Validación-->
			<div class="title-header border-bottom">Registro de Patolog</div>
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
					<form action="" method="POST">
						@csrf
						@error('patologia')
				        <div class="alert alert-warning alert-dismissible fade show" role="alert">
				        	<strong>Atención!</strong> El campo Nombre Patología es obligatorio.
				            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				        </div>
				        @enderror
				        @error('nomenclatura')
				          <div class="alert alert-warning alert-dismissible fade show" role="alert">
				            <strong>Atención!</strong> El campo Nomenclatura es obligatorio.
				            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				              <span aria-hidden="true">&times;</span>
				            </button>
				          </div>
				        @enderror
					 	<div class="form-group">
						    <label>Especie:</label>
						    <input 
						    class="form-control" 
						    id="nombre" 
						    type="text" 
						    name="nombre"  
						    placeholder="Nombre de Especie" 
						    value="">

					    <label class="my-2">Nomenclatura:</label>
						    <input 
						    class="form-control" 
						    id="nomenclatura" 
						    type="text" 
						    name="nomenclatura" 
						    placeholder="Nomenclatura" 
						    value="">
					  </div>
					
						  <button type="submit" class="btn alert-success aling-boton">
						  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-broadcast" viewBox="0 0 16 16">
			  	     	  <path d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 0 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707zM10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
						  </svg> Registrar</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col card-especie-grid ml-3 border-style"> <!--Grid -->
			<div class="title-header border-bottom">Listado de Especies</div>
			<table class="table table-especie">
	  			<thead>
				    <tr>
				      <th scope="col">Especie</th>
				      <th scope="col">Nomenclatura</th>
				      <th scope="col">Acción</th>
				    </tr>
	  			</thead>
	  			<tbody>
	  		
		    		<tr>
				      
				      <td>
				      	
				      </td>
				        <td>
				      
				      </td>
				      <td>
				      	<a href="" class="btn alert-success btn-sm">
					    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
		  					<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
		 					<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
							</svg> 
						</a>

				      	<form action="#" class="d-inline" method="POST">
						    @method('DELETE')
						    @csrf
						    <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
	  						<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
	 						<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							</svg> </button>
						</form> 
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
