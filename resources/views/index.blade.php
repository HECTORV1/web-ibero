<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>INDEX</h1> -->
<!-- se comentan para poner estilo -->
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
  				Crear Nueva Tarea
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
      <form method="POST" class="pe-4" action="{{ route('tareas.store')}}">
      	{{ csrf_field() }}
      	<div class="modal-body">
      		<div class="form-group mb-3"> 
					<label>Nombre de tarea</label>
					<br>
					<input type="form-control" type="text" name="name" placeholder="Nombre de Tarea">
					

				</div>
				

				<div class="form-group mb-3">
					<label>Descripción</label><br>
					<textarea class="form-control" name="description"></textarea>
				</div>

				@php
					$proyectos = App\Models\Project::all();
				@endphp

				<div class="form-group mb-3">
					<label>Proyectos</label>
					<select class="form-control" name=´"project_id">
						@foreach($proyectos as $proyecto)
							<option value="{{ $proyecto->id }}">{{ $proyecto->name }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group mb-3">
					<label>Fecha de Entrega</label>
					<input class="form-control" type="date" name="due_date">
				</div>
				
				<!-- Guardar formulario -->
				<button class="btn btn-success" type="submit">Guardar Tarea</button>

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
					<h5 class="card-header">Listado de tareas</h5>
					<div class="card-body">
						<h5 class="card-title">Tareas Pendientes</h5>
						<p class="card-text">Este es tu listado principal de tareas, ponte a trabajar :)</p>

		<table class="table">
			<thead>
	   			<tr>
		 			<th scope="col">#</th>
		 			<th scope="col">Estado</th>
					<th scope="col">Tarea</th>
					<th scope="col">Descripción</th>
					<th scope="col">Fecha de Entrega</th>
					<th scope="col">Acciones</th>
				</tr>
			 </thead>
			<tbody>
				@foreach($tareas as $tarea)
				<tr>
					<th scope="row">{{ $tarea->id }}</th>
					<th>
						@if($tarea->completed == true)
						<span class="badge bg-succes">Completada</span>
						@else
						<span class="badge bg-warning">Incompleta</span>
						@endif
					</th>
					<td>{{ $tarea->completed }}</td>
					<td>{{ $tarea->name }}</td>
					<td>{{ $tarea->description }}</td>
					<td>{{ $tarea->due_date }}</td>
					<td>
						<div class= aria-label="Toolbar with button groups">
							<form method="POST" action="{{ route('completar.tarea', $tarea->id) }} ">
								{{ csrf_field() }}
								<button class="btn btn-sm btn-warning" type="submit">Completar Tarea</button>
								
							</form>
							<div class="aria-label="First group">
								<a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-sm btn-primary">Ver</a>
							</div>
							<div class= aria-label="Second group">
								<a href="javascript(0)" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editarTarea">Editar</a>
							</div>
							<div class= aria-label="Third group"></div>
							<form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE')}}
								<button class="btn btn-sm btn-danger" type="submit">Borrar</button>
							</form>
						</div>	
					</td>



				</tr>
					<tr>
					<div class="modal" id="editarTarea" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Editar Tarea</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>
					      <div class="modal-body">
					        
					        <form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
					        {{ csrf_field() }}
							{{ method_field('PUT') }}
								<label>Nombre de tarea</label>
								<br>
								<br>
								<input type="text" name="name" placeholder="Nombre de Tarea" value="{{ $tarea->name }}">
								<br>
								<br>
								<label>Descripción</label><br>
								<textarea name="description">{{ $tarea->description }}</textarea>
								<br>
								<br>
								<label>Fecha de Entrega</label>
								<br>
								<br>
								<input type="date" name="due_date"value="{{ $tarea->due_date }}">
								<br>
								<br>
								
								<!-- Guardar formulario -->
								

								
							  </div>
					      
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
					        <button type="submit" class="btn btn-success">Guardar Tarea</button>
					      </div>
					    </div>
					  </div>
					</div>		


							</form>



					    

					</tr>
								
	 @endforeach
		</tbody>
		</table>
					</div>

			</div>
					
		</div>
	</div>

	


@endsection