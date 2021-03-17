@extends('layouts.master')
@section('content')
<div class="container-fluid mb-4">

	<!-- Modal de bootstrap -->
	<div class="row">
		<div class="col-md-8">
			<div class="title-page px-4 py-5">
			<h3 class="display-1">¡Bienvenido Usuario!</h3>
			<p>Esta es una gran aplicación de tareas, utilizala todos los dias.</p>
			</div>
		</div>

		<div class="col-md-4">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  				Crear Nuevo Proyecto
			</button>
		</div>
	</div>	
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" class="pe-4" action="{{ route('proyectos.store')}}">
      	{{ csrf_field() }}
      	<div class="modal-body">
      		<div class="form-group mb-3"> 
					<label>Nombre de proyecto</label>
					<br>
					<input type="form-control" type="text" name="name" placeholder="Nombre de Tarea">
					

				</div>
				

				<div class="form-group mb-3">
					<label>Descripción</label><br>
					<textarea class="form-control" name="description"></textarea>
				</div>
				
				<div class="form-group mb-3">
					<label>Fecha Final</label>
					<input class="form-control" type="date" name="final_date">
				</div>

				<div class="form-group mb-3">
					<label>Color de Proyecto</label><br>
					<input class="form-control" type="color" name="hex"></textarea>
				</div>
				
				<!-- Guardar formulario -->
				<button class="btn btn-success" type="submit">Guardar Proyecto</button>

			</form>	
		</div>
		
       	 
      	
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
       <!-- <button type="button" class="btn btn-primary">Guardar Tarea</button>-->
      </div>
    </div>
  </div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col col-md-4">
			<!--<form method="POST" class="pe-4" action="{{ route('tareas.store')}}">
				<!-- Nuestro campo de protección de formulario 
				{{ csrf_field() }}
				<!-- Campos de formulario 
				<div class="form-group mb-3"> 
					<label>Nombre de tarea</label>
					<br>
					<input type="form-control" type="text" name="name" placeholder="Nombre de Tarea">
					

				</div>
				

				<div class="form-group mb-3">
					<label>Descripción</label><br>
					<textarea class="form-control" name="description"></textarea>
				</div>
				
				<div class="form-group mb-3">
					<label>Fecha de Entrega</label>
					<input class="form-control" type="date" name="due_date">
				</div>
				
				<!-- Guardar formulario 
				<button class="btn btn-success" type="submit">Guardar Tarea</button>

				
		</div>  -->
	</div>

	

	
			<div class="col-mt-8">
				<div class="card">
					<h5 class="card-header">Listado de Proyectos</h5>
					<div class="card-body">
						<h5 class="card-title">Proyectos en curso</h5>
						<p class="card-text">Este es tu listado principal de proyectos, ponte a trabajar :)</p>
					</div>
				</div>
			</div>

			<div class="row">
				@foreach($proyectos as $proyecto)
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<h4>{{ $proyecto->name }}</h4>
							<p>{{ $proyecto->description }}</p>
							
						</div>
						<div class="tareas">
							<ul>
								<li>Tarea 1</li>
								<li>Tarea 2</li>
								<li>Tarea 3</li>
							</ul>
							
						</div>
						
					</div>
					
				</div>
				@endforeach
			</div>
		</div>
		@endsection		
				