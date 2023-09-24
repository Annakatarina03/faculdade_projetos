@extends('layouts.main')
@section('title', 'Funcionários')
@section('content')
    @livewire('employee.index')
    @livewire('component.modal')
@endsection
