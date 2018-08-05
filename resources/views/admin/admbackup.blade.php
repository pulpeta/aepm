@extends('templates.admlayout')

@section('title', 'AEPM Backup')

@section('sectionname', 'AEPM Backup')

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