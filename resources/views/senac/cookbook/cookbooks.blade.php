@extends('layouts.app')
@section('title', 'Livro de receitas')
@section('content')
    @livewire('cook-book.cook-books.index')
    @livewire('component.modal')
@endsection
