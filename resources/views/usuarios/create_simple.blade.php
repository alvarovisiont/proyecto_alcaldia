@extends('layouts.app')
@section('view_descrip')
<h3 class="text-center">Usuarios
	<span class="pull-right">
		<a href="{{ route('usuarios.create_simple') }}" class="btn btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo usuario</a>
	</span>
</h3>
@endsection
@section('content')
	@include('partials.flash')
	@include('usuarios.partials.form_simple')
@endsection