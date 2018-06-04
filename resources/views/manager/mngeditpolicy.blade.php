@extends('templates.mnglayout')

@section('title', 'AEPM Edit Policy')

@section('sectionname', 'AEPM Edit Policy')

@section('content')

    @foreach($pol as $p)
        <form action="/manager/policy/update/{{ $p->id }}" method="post">

            {{csrf_field()}}
            {!! method_field('PATCH') !!}

            <div class="row">
                <div class="col-sm-3 text-left">
                    <h4>{{ $p->policy_name }}</h4>
                </div>
                <div class="col-sm-9">
                    {{$p->description}}
                </div>
            </div>
            <div class="col-sm-3">
                {{$p->is_enabled}}
            </div>
            <div class="col-sm-3">
                Created at: {{$p->created_at}}
            </div>
            <div class="col-sm-3">
                Created at: {{$p->updated_at}}
            </div>
            <div class="col-sm-3">

            </div>
        </form>



    @endforeach

@endsection

@section('footer')
    @parent

@endsection