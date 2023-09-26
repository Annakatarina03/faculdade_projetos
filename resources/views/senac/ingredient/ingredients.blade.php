@extends('layouts.main')
@section('title', 'Ingredientes')
@section('content')
    @livewire('ingredient.index')
    @livewire('component.modal')
@endsection
