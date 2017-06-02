@extends('layouts.app')
@section('view_descrip')
<h3 class="text-center">
	Editando Usuario - {{$usuario->nombres}} {{$usuario->apellidos}}
</h3>
@endsection
@section('content')
	@include('partials.flash')
	@include('usuarios.partials.form_simple')
@endsection