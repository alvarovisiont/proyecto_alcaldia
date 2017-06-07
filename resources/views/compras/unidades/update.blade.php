@extends('layouts.app')

@section('view_descrip')
	<h3 class="text-center">Modificar Unidad {{ucwords($unidades->codigo)}}</h3>
@endsection

@section('content')
	@include('compras.unidades.partials.form')
@endsection

@section('script')

@endsection