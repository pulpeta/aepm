@extends('templates.mnglayout')

@section('title', 'AEPM Policy Management')

@section('sectionname', 'AEPM Policy Management')

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
                       <input class="form-control form-control-sm" type="text" placeholder="Filter Policy">
                   </div>
                   <div class="col-sm-2">
                       <button type="submit" class="btn btn-sm btn-primary"><span class="far fa-search"></span></button>
                   </div>

               </div>
           </form>
       </div>
       <div class="col-sm-4"></div>
       <div class="col-sm-4 text-right">
           <a href="#" class="btn btn-sm btn-primary">
               <span class="far fa-plus"></span> New Policy
           </a>
       </div>
   </div>

    <ul class="list-group">
        @foreach($policy as $p)
            {{$p->policy_name}}
            @foreach($policy->actions as $a)
                {{$a->action}}
            @endforeach
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