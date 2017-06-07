@extends('layouts.app')

@section('view_descrip')
	<h3 class="text-center">Modificar Proveedor {{ucwords($proveedores->razon_social)}}</h3>
@endsection

@section('content')
	@include('compras.proveedores.partials.form')
@endsection

@section('script')

@endsection