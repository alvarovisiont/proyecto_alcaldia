@extends('layouts.app')

@section('view_descrip')
	<h3 class="text-center">Modificar Departamento {{ucwords($departamentos->programatica)}}</h3>
@endsection

@section('content')
	@include('compras.departamentos.partials.form')
@endsection

@section('script')

@endsection