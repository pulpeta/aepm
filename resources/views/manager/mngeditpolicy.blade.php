@extends('templates.mnglayout')

@section('title', 'AEPM Edit Policy')

@section('sectionname', 'AEPM Edit Policy')

@section('content')

    @foreach($policy as $p)

        <div class="row">
            <div class="col-sm-1">
                <form action="{{ url('/manager/policy/enablepolicy/'.$p->id) }}" method="POST" name="enablepolicy">
                    {!! csrf_field() !!}
                    {!! method_field('PATCH') !!}

                    @if($p->is_enabled)
                        <button class="btn btn-success btn-sm"><span class="far fa-arrow-up"></span></button>
                    @else
                        <button class="btn btn-warning btn-sm"><span class="far fa-arrow-down"></span></button>
                    @endif
                </form>
            </div>
            <div class="col-sm-11">
                <form action="{{url ('/manager/policy/update/'.$p->id) }}" method="post">

                    {{csrf_field()}}
                    {!! method_field('PATCH') !!}

                    <input type="text" name="policy_name" value="{{ $p->policy_name }}">

                    <input type="text" name="policy_name" value="{{ $p->description }}">

                    <button class="btn btn-primary btn-sm">Update</button>
                </form>
            </div>
        </div>

        <div class="row">
                <div class="col-sm-3">

                </div>
                <div class="col-sm-3">
                    Created at: {{$p->created_at}}
                </div>
                <div class="col-sm-3">
                    Updated at: {{$p->updated_at}}
                </div>
                <div class="col-sm-3">

                </div>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-sm-12">
                <h6>Related Actions</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1">
                Priority
            </div>
            <div class="col-sm-1">
                Active
            </div>
            <div class="col-sm-3">
                Action
            </div>
            <div class="col-sm-7">

            </div>
        </div>
        @foreach($action as $a)
            {{$a->is_active}}
            <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-1">
                    <form action="{{ url('/manager/policy/activeaction/'.$a->id) }}" method="POST" name="activeaction">
                        {!! csrf_field() !!}
                        {!! method_field('PATCH') !!}

                        @if($a->is_active)
                            <button class="btn btn-success btn-sm"><span class="far fa-arrow-up"></span></button>
                        @else
                            <button class="btn btn-warning btn-sm"><span class="far fa-arrow-down"></span></button>
                        @endif
                    </form>

                </div>
                <div class="col-sm-3">
                    {{$a->action}}
                </div>
                <div class="col-sm-7 text-left">
                    <form action="{{ url('/manager/policy/removeaction/'.$a->id) }}" method="POST" name="deleteaction">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger btn-sm"><span class="far fa-minus"></span></button>
                    </form>
                </div>
            </div>

        @endforeach

    @endforeach

@endsection

@section('footer')
    @parent

@endsection