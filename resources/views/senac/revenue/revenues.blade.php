@extends('layouts.app')
@section('title', 'Receitas | Todas as receitas')
@section('content')
    @livewire('revenue.revenues.index')
    @livewire('component.modal')
@endsection
