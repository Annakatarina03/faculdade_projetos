@extends('layouts.main')
@section('title', 'Categorias')
@section('content')
    @livewire('category.index')
    @livewire('component.modal')
@endsection
