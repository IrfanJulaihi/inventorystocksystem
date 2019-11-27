@extends('products.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Product</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('foodmenu.store') }}" method="POST">
{{ csrf_field() }}
     
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Menu Name:</strong>

                <input type="text" name="share_name" class="form-control" placeholder="Name">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Price:</strong>

                <input type="text" name="price" class="form-control" placeholder="RM:">

            </div>

        </div>

        @if(Auth::user()->is_permission==0)
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Restaurant</strong>

               <input type="text" name="group_uid" value="{{Auth::user()->group_uid}}" class="form-control" readonly="text">


            </div>

        </div>
        @else
  <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Restaurant</strong>

               <input type="text" name="group_uid" value="" class="form-control" >


            </div>

        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

  

</form>

@endsection