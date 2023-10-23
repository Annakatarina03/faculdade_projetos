@extends('layouts.app')
@section('title', 'Meu perfil')
@section('content')
    @livewire('employee.profile', ['id' => auth()->user()->id])
@endsection
