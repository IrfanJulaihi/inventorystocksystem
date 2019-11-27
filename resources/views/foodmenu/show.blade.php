@extends('products.layout')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('foodmenu.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $foodmenu->share_name }}

            </div>

        </div>
     


            

                <strong>Food indgredients</strong>
             
@foreach ($products as $menu2)
@if($menu2->Quantity<=5 && $menu2->group_uid ===Auth::user()->group_uid && $menu2->menu_fooduid===$foodmenu->id)
              

               <ol style="background-color:#FEA6A6 "> {{ $menu2->name}} X {{ $menu2->Quantity}}</ol>
@endif
 @if($menu2->Quantity>=5 && $menu2->group_uid ===Auth::user()->group_uid && $menu2->menu_fooduid===$foodmenu->id)
               <ol  > {{ $menu2->name}} X {{ $menu2->Quantity}}</ol>
@endif



            
        

   
 
    @endforeach

@endsection