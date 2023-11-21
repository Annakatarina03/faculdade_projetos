@extends('layouts.app')
@section('title', 'Publicações | Publicar livro')
@section('content')
    @livewire('publication.publish.index')
    @livewire('component.modal')
@endsection
