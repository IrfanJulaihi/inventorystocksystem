@extends('products.layout')



@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="flex-center position-ref full-height">
@if (Route::has('login'))
<div class="top-right links">
@if (Auth::check())
    <a href="{{ url('/home') }}"><button>Home</button></a>
@else
    <a href="{{ url('/login') }}">Login</a>
    <a href="{{ url('/register') }}">Register</a>
@endif
</div>
@endif
<div class="row">

<div class="col-lg-12 margin-tb">

<div class="pull-left">

<h2>CRUD</h2>

</div>

<div class="pull-right">

<a class="btn btn-success" href="{{ route('foodmenu.create') }}"> Create New Products</a>

</div>

</div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

<p>{{ $message }}</p>

</div>

@endif



<table class="table table-bordered">

<tr >

<th>No</th>

<th>Menu Name</th>

<th>@sortablelink('Price')</th>

<th>@sortablelink('group_uid')</th>





<th width="280px">Action</th>

</tr>
<!--to loop everything in menu-->
@if( Auth::user()->is_permission===0 )
@foreach ($foodmenu as $menu)



<tr >

<td>{{ ++$i }}</td>

<td >{{ $menu->share_name }}</td>

<td>RM {{ $menu->price}}</td>

<td>{{$menu->group_uid}}













<td>



{{csrf_field()}}

<a class="btn btn-info" href="{{ route('foodmenu.show',$menu->id) }}">Show Details</a>
<a class="btn btn-primary" href="{{ route('foodmenu.edit',$menu->id) }}">Edit</a></td>

</tr>
@endforeach
@else




@foreach ($foodmenuall as $menuall)



<tr >

<td>{{ ++$i }}</td>

<td >{{ $menuall->share_name }}</td>

<td>RM {{ $menuall->price}}</td>


<td>{{ $menuall->group_uid}}</td>









<td>





<a class="btn btn-info" href="{{ route('foodmenu.show',$menuall->id) }}">Show Details</a>
<a class="btn btn-primary" href="{{ route('foodmenu.edit',$menuall->id) }}">Edit</a>










</td>

</tr>
</form>
@endforeach
@endif



</table>



{!! $foodmenu->links() !!}



@endsection