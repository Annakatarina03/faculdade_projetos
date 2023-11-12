@extends('layouts.app')
@section('title', 'Receitas | Minhas degustação')
@section('content')
    @livewire('recipe-tasting.my-tasting.index')
    @livewire('component.modal')
@endsection
