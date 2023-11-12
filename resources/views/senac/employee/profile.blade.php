@extends('layouts.app')
@section('title', 'Meu perfil')
@section('content')
    @livewire('employee.profile.index', ['id' => auth()->user()->id])
    @livewire('component.modal')
@endsection
