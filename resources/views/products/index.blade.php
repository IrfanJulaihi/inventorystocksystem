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

                <h2>Restaurant Inventory System</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('products.create') }}"> Add New Ingredients</a>

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

            <th>Name</th>

            <th>Details</th>

            <th>Price</th>

            <th>@sortablelink('Quantity') </th>
          


            <th width="280px">Action</th>

        </tr>
@if( Auth::user()->is_permission===0 )
        @foreach ($products as $product)
@if($product->Quantity<=5 )



        <tr style="background-color:#F54242 ">

            <td>{{ ++$i }}</td>

            <td >{{ $product->name }}</td>

            <td>{{ $product->detail }}</td>
<td>RM {{ $product->price }}</td>
<td> {{ $product->Quantity }}</td>

            <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

   {{csrf_field()}}

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

   

                   
<input name="_method" type="hidden" value="Delete">
                    

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

@else
<tr >

            <td>{{ ++$i }}</td>

            <td >{{ $product->name }}</td>

            <td>{{ $product->detail }}</td>
<td>RM {{ $product->price }}</td>
<td> {{ $product->Quantity }}</td>

            <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

   {{csrf_field()}}

                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

   

                   
<input name="_method" type="hidden" value="Delete">
                    

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>
@endif
        @endforeach

    </table>

 



<!--admin view-->

@else
        @foreach ($productsall as $productall)
@if($productall->Quantity<=5 )



        <tr style="background-color:#F54242 ">

            <td>{{ ++$i }}</td>

            <td >{{ $productall->name }}</td>

            <td>{{ $productall->detail }}</td>
<td>RM {{ $productall->price }}</td>
<td> {{ $productall->Quantity }}</td>

            <td>

                <form action="{{ route('products.destroy',$productall->id) }}" method="POST">

   {{csrf_field()}}

                    <a class="btn btn-info" href="{{ route('products.show',$productall->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('products.edit',$productall->id) }}">Edit</a>

   

                   
<input name="_method" type="hidden" value="Delete">
                    

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

@else
<tr >

            <td>{{ ++$i }}</td>

            <td >{{ $productall->name }}</td>

            <td>{{ $productall->detail }}</td>
<td>RM {{ $productall->price }}</td>
<td> {{ $productall->Quantity }}</td>

            <td>

                <form action="{{ route('products.destroy',$productall->id) }}" method="POST">

   {{csrf_field()}}

                    <a class="btn btn-info" href="{{ route('products.show',$productall->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('products.edit',$productall->id) }}">Edit</a>

   

                   
<input name="_method" type="hidden" value="Delete">
                    

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>
@endif
        @endforeach

    </table>

  @endif



    {!! $products->links() !!}

      

@endsection