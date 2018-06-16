@extends('templates.mnglayout')

@section('title', 'AEPM Assign Policy')

@section('sectionname', 'AEPM Assign Policy')

@section('content')

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-2 text-left">
                <a href="{{ url ('/manager/policy/assignment') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="col-sm-9">
                @foreach($name as $n)
                    <h4>{{ $n->policy_name }} </h4>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" style="padding: 10px;">

                <form class="form-group" method="post" action="/manager/policy/update_grp_assignments/{{$name[0]->id}}">

                    {{csrf_field()}}
                    {!! method_field('PATCH') !!}

                    <input type="hidden" name="policy_id" value="{{$name[0]->id}}">

                    <ul class="list-group form-control-sm">
                        @foreach($adg as $a)

                            <li class="list-group-item">
                                <input name = "adg{{$a->id}}" type="checkbox"
                                value = "{{$a->id}}"
                                @foreach($adgroup as $ad)
                                    @if($ad->adgroup_list_id == $a->id)
                                        checked
                                        @break
                                    @endif
                                @endforeach
                                style="margin-right: 10px;">{{$a->adgroup_name}}
                            </li>

                        @endforeach
                    </ul>

                    <div class="text-center" style="margin-top: 10px">
                        <button class="btn btn-sm btn-primary form-control-sm">Save</button>
                    </div>

                </form>

            </div>
            <div class="col-sm-6" style="padding: 10px;">

                <form class="form-group" method="post" action="/manager/policy/update_addr_assignments/{{$name[0]->id}}">

                    {{csrf_field()}}
                    {!! method_field('PATCH') !!}

                    <input type="hidden" name="policy_id" value="{{$name[0]->id}}">

                    <ul class="list-group form-control-sm">
                        @foreach($addr as $a)

                            <li class="list-group-item">
                                <input name = "adg{{$a->id}}" type="checkbox"
                                    value = "{{$a->id}}"
                                    @foreach($address as $ad)
                                        @if($ad->address_list_id == $a->id)
                                            checked
                                            @break
                                        @endif
                                    @endforeach
                                    style="margin-right: 10px;">{{$a->email}}
                            </li>

                        @endforeach
                    </ul>

                    <div class="text-center" style="margin-top: 10px">
                        <button class="btn btn-sm btn-primary form-control-sm">Save</button>
                    </div>

                </form>

            </div>
        </div>

@endsection

@section('footer')
    @parent

@endsection