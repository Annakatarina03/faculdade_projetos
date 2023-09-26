@extends('layouts.main')
@section('title', 'Restaurantes')
@section('content')
    @livewire('restaurant.index')
    @livewire('component.modal')
@endsection
