@extends('templates.mnglayout')

@section('title', 'Manager Dashboard')

@section('sectionname', 'Manager Dashboard')

@section('content')

    @if(session()->has('message'))
        @component('components.alert-info')
            {{ session()->get('message') }}
        @endcomponent
    @endif

@endsection

@section('footer')
    @parent

@endsection