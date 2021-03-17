<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Editar</h1>
	<p>Aquí voy a editar mis tareas</p>
	<hr>
	<form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
	<!-- Nuestro campo de protección de formulario -->
	{{ crsf_field() }}
	{{ method_field('PUT') }}
	<!-- Campos de formulario -->
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
	<button type="submit">Guardar Tarea</button>

	<h2>Tareas</h2>
	<hr>
	

</form>
</body>
</html>