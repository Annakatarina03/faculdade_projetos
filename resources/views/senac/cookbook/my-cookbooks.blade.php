@extends('layouts.app')
@section('title', 'Livro de receitas')
@section('content')
    @livewire('cookbook.my-cookbooks.index')
    @livewire('component.modal')
@endsection
