@extends('layouts.main')
@section('title', 'Receitas | Marcar degustação')
@section('content')
    @livewire('recipe-tasting.index')
    @livewire('component.modal')
@endsection
