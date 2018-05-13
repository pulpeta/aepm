@extends('templates.admlayout')

@section('title', 'Users List')

@section('sectionname', 'Users List')

@section('content')

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-12 text-center">
            <button class="btn btn-sm btn-primary">
                <span class="far fa-plus-circle"></span> Add User
            </button>
        </div>
    </div>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-sm-12">

                <ul id="users" class="list-group align-middle">

                    @foreach($admins as $admin)

                        <li class="list-group-item">

                            @if($admin->is_enabled)
                            <div class="row">
                            @else
                            <div class="row text-muted">
                            @endif
                                <div class="col-sm-3">
                                    {{$admin->name}}
                                </div>
                                <div class="col-sm-5">
                                    {{$admin->email}}
                                </div>
                                <div class="col-sm-2">
                                    @if($admin->is_admin)
                                        Administrator
                                    @else
                                        Operator
                                    @endif
                                </div>
                                <div class="col-sm-1 text-right">
                                <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{$admin->id}}">
                                    <span class="fa fa-pencil-alt"></span>
                                </a>
                            </div>
                                <div class="col-sm-1 text-right">
                                    <form action="{{ url('/admin/users/delete/'.$admin->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}

                                        <button class="btn btn-danger btn-sm"><span class="far fa-minus"></span></button>
                                    </form>
                                </div>
                            </div>

                        </li>

                    @endforeach

                </ul>

        </div>
    </div>
@endsection

@section('footer')
    @parent

@endsection