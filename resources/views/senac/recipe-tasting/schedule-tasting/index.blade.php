@extends('layouts.app')
@section('title', 'Receitas | Marcar degustação')
@section('content')
    @livewire('recipe-tasting.schedule-tasting.index')
    @livewire('component.modal')
@endsection
