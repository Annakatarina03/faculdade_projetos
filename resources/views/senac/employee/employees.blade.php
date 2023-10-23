@extends('layouts.app')
@section('title', 'Funcionários')
@section('content')
    @livewire('employee.index')
    @livewire('component.modal')
@endsection
