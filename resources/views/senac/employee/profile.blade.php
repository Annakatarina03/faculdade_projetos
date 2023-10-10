@extends('layouts.main')
@section('title', 'Funcionários')
@section('content')
    @livewire('employee.profile', ['id' => Auth::user()->id])
@endsection
