@extends('templates.mnglayout')

@section('title', 'AEPM Policy Assignment')

@section('sectionname', 'AEPM Policy Assignment')

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

       </div>
   </div>

   <div class="accordion" id="accordion">
       <div class="card mb-0">
           @foreach($policy as $p)
               <div class="card-header">
                   <a style="text-decoration: none; color: black" class="card-title card-link"  data-toggle="collapse" href="#collapse{{$p->id}}">
                       <h6 class="text-primary">{{$p->policy_name}}</h6>
                   </a>
               </div>
               <div id="collapse{{$p->id}}" class="collapse" data-parent="#accordion">
                   <div class="container" style="padding-bottom: 20px;">
                       <div class="row" style="margin-top: 10px;">
                           <div class="col-sm-6">



                           </div>
                           <div class="col-sm-6">



                           </div>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>

    <ul class="list-group">

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