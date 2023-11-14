@extends('layouts.app')
@section('title', 'Livro de receitas')
@section('content')
    @livewire('cook-book.my-cook-books.index')
    @livewire('component.modal')
@endsection
