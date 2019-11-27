@extends('products.layout')

   

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit Product</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('foodmenu.index') }}"> Back</a>

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

  

    <form action="{{ route('foodmenu.update',$foodmenu->id) }}" method="POST">

        {{csrf_field()}}

       <input name="_method" type="hidden" value="PUT">

   

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" value="{{ $foodmenu->share_name }}" class="form-control" placeholder="Name" disabled="">

                </div>

            </div>
            <strong>Other Restaurant`s {{$foodmenu->share_name}} price:</strong>
@foreach ($foodmenuall as $menuall )
            @if($menuall->share_name===$foodmenu->share_name)
          
<table border="1" style="width:70%;" cellspacing="50px">

                       <tr>
                    <td>{{ $menuall->share_name }}</td>    <td> {{$menuall->group_uid}}</td> <td>RM:{{$menuall->price}}</td>

             </tr>
    
    
    </table>
    @endif
@endforeach
Set price for {{$foodmenu->share_name}} in {{$foodmenu->group_uid}} <input type="text" name="price">
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection