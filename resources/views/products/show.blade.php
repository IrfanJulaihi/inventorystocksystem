@extends('products.layout')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $product->name }}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>In stock:</strong>

                {{ $product->price }}

            </div>

        </div>
<strong>Ingredients for:</strong>
    @foreach($productsjoinfoodmenu as $iterate)
     @if($iterate->id==$product->menu_fooduid )
{{ $iterate->share_name}}

            @endif
@endforeach    

                
          
<br>
<br>
                <strong>Details:</strong>

                {{ $product->detail }}

        
   


       

@endsection