@extends('templates.mnglayout')

@section('title', 'AEPM Edit Policy')

@section('sectionname', 'AEPM Edit Policy')

@section('content')

    @foreach($policy as $p)
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
            <div class="row">
                <div class="col-sm-3">

                    @if($p->is_enabled)
                        <input type="checkbox" name="is_enabled" value="is_enabled" checked="checked"/> Enabled
                    @else
                        <input type="checkbox" name="is_enabled" value="is_enabled" /> Disabled
                    @endif

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
        </form>

        <div class="row" style="margin-top: 30px">
            <div class="col-sm-12">
                <h6>Related Actions</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1">
                Priority
            </div>
            <div class="col-sm-3">
                Action
            </div>
            <div class="col-sm-2">
                Is Active
            </div>
            <div class="col-sm-6">

            </div>
        </div>
        @foreach($action as $a)
            <div class="row">
                <div class="col-sm-1">
                    {{$a->priority}}
                </div>
                <div class="col-sm-3">
                    {{$a->action}}
                </div>
                <div class="col-sm-2">
                    @if($a->is_active)
                        <input type="checkbox" name="is_active" value="is_active" checked="checked"/>
                    @else
                        <input type="checkbox" name="is_active" value="is_active" />
                    @endif
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        @endforeach



    @endforeach

@endsection

@section('footer')
    @parent

@endsection