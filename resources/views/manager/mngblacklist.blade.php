@extends('templates.mnglayout')

@section('title', 'AEPM Blacklist')

@section('sectionname', 'AEPM Blacklist')

@section('content')

   @if(session()->has('message'))
       @component('components.alert-info')
           {{ session()->get('message') }}
       @endcomponent
   @endif

   <div class="row" style="margin-bottom: 20px;">
       <div class="col-sm-4">
           <form>
               <div class="form-row">
                   <div class="col-sm-10">
                       <input class="form-control form-control-sm" type="text" placeholder="Filter Domain">
                   </div>
                   <div class="col-sm-2">
                       <button type="submit" class="btn btn-sm btn-primary"><span class="far fa-search"></span></button>
                   </div>

               </div>

           </form>
       </div>
       <div class="col-sm-4"></div>
       <div class="col-sm-4 text-right">
           <a href="/manager/blacklist/new" class="btn btn-sm btn-primary">
               <span class="far fa-plus"></span> Add Domain
           </a>
       </div>
   </div>

    <ul class="list-group">
        @foreach($list as $l)

            <li class=" list-group-item d-flex justify-content-between align-items-center">
               {{$l->domain}}
                <div class="row">
                    <a style="margin-right: 10px;" href="/manager/blacklist/edit/{{$l->id}}" class="btn btn-sm btn-primary">
                        <span class="far fa-pencil-alt"></span>
                    </a>
                    <form action="{{ url('/manager/blacklist/delete/'.$l->id) }}" method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger btn-sm"><span class="far fa-minus"></span></button>
                    </form>
                </div>
            </li>

        @endforeach
    </ul>

@endsection

@section('footer')
    @parent

    <script>
        $('document').ready(function (){
            $('div.alert').fadeOut(3000);
        });
    </script>

@endsection