@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">Manage Permission</div>


                <div class="panel-body">


                    @if(checkPermission(['user','superadmin']))

                    <a href="{{ url('permissions-all-users') }}"><button>Stock Inventory</button></a>

                    @endif

                     @if(checkPermission(['user','superadmin']))

                    <a href="{{ url('permissions-all-users-foodmenu') }}"><button>Menu Inventory</button></a>

                    @endif


                <!--     @if(checkPermission(['superadmin']))

                    <a href="{{ url('permissions-superadmin') }}"><button>Access Only Superadmin</button></a>

                    @endif -->


                </div>

            </div>

        </div>

    </div>

</div>

@endsection
