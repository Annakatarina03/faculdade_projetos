@extends('layouts.app')
@section('title', 'Publicações | Todas publicações')
@section('content')
    @livewire('publication.publications.index')
    @livewire('component.modal')
@endsection
