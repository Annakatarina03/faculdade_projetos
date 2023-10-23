@extends('layouts.app')
@section('title', 'Restaurantes')
@section('content')
    @livewire('restaurant.index')
    @livewire('component.modal')
@endsection
