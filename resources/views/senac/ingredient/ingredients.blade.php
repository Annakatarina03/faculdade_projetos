@extends('layouts.app')
@section('title', 'Ingredientes')
@section('content')
    @livewire('ingredient.index')
    @livewire('component.modal')
@endsection
