<hr>

<h2 class="title">Lista Miembros</h2>
<ul>
@foreach ($consulta as $element)
@if ($element->nombre != "" && $element->email)
	 <li>Alumno: {{ $element->nombre }} <br>Correo: {{ $element->email }}</li>
@else
	No hay miembros registrados
@endif	
@endforeach
</ul>

