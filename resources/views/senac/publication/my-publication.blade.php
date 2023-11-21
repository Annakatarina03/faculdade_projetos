@extends('layouts.app')
@section('title', 'Publicações | Minhas publicações')
@section('content')
    @livewire('publication.my-publication.index')
    @livewire('component.modal')
@endsection
