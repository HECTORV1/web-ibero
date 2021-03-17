<!--<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Show</h1>
	<a href="{{ URL::previous() }}">Regresar</a>
	<hr>-->
@extends('layouts.master')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<a class="btn btn-primary" href="{{ URL::previous() }}">Regresar</a>

			<div class="card card-body">
				<h4>{{ $tarea->name }}</h4>
				<p class="mb-4">{{ $tarea->description }}</p>
				<p class="text-muted">Fecha de entrega: {{ $tarea->due_date }}</p>

				<hr>
				<br>
				<br>

				<div class="d-flex align-items-center">
					<div class="col">
						<form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button class="btn btn-danger btn-block" type="submit">BORRAR</button>
		
						</form>
					</div>
					<div class="col">		
						<div class="btn btn-info btn-block" href="{{ route('tareas.edit', $tarea->id) }}">EDITAR TAREA</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
	
	
	

	

@endsection
<!-- </body>
</html> -->