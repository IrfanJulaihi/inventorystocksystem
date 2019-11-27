<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foodmenu;
use App\Product;
class foodmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
$user = auth()->user();

        $foodmenu = foodmenu::sortable()->where('foodmenus.group_uid',$user->group_uid)->paginate(20);
        $foodmenuall = foodmenu::sortable()->paginate(20);
        $foodmenu_products=\DB::table('foodmenus')
        ->join('products', 'foodmenus.id', '=', 'products.menu_fooduid')
        ->select('*')
        ->where('foodmenus.group_uid',$user->group_uid)
            ->get();
         $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';



        return view('foodmenu.index',compact('foodmenu','foodmenu_products','foodmenuall'))
->with('i', (request()->input('page', 1) - 1) * 5);
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */}
    public function create()
    {
          $user = auth()->user();
       $foodmenus= foodmenu::sortable()->where('group_uid',$user->group_uid)->paginate(5);
        return view('foodmenu.create',compact('foodmenus'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        

            'share_name' => 'required',

            'price' => 'required',
            'group_uid' => 'required',

           

        ]);

  

        foodmenu::create($request->all());

   
        
        return redirect()->route('foodmenu.index')

                        ->with('success','Menu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(foodmenu $foodmenu)
    {

        
        $products = Product::sortable()->where('group_uid',$foodmenu->group_uid)->paginate(5);
          return view('foodmenu.show',compact('foodmenu','products'));

     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(foodmenu $foodmenu)
    {
        $foodmenuall = foodmenu::sortable()->paginate(20);
        return view('foodmenu.edit',compact('foodmenu','foodmenuall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,foodmenu $foodmenu)
    {
     $this->validate($request, [

           

            'price' => 'required'

          

        ]);

  

        $foodmenu->update($request->all());

  

        return redirect()->route('foodmenu.index')

                        ->with('success','Price updated successfully');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
