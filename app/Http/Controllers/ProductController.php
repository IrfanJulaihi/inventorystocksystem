<?php

  

namespace App\Http\Controllers;


use App\Product;
use App\foodmenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
  

class ProductController extends Controller

{protected $user;

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    


    public function index(Request $request)

    {

        $user = auth()->user();






        $products = Product::sortable()->where('group_uid',$user->group_uid)->paginate(20);
        $productsall=Product::sortable()->paginate(20);
        
         $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';





        return view('products.index',compact('products','productsall'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

   

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create(foodmenu $foodmenu)

    {
        $user = auth()->user();
        $foodsall=foodmenu::sortable()->paginate(20);
       $foodmenus= foodmenu::sortable()->where('group_uid',$user->group_uid)->paginate(5);
        return view('products.create',compact('foodmenus','foodsall'));

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
        

            'name' => 'required',

            'detail' => 'required',

            'price' => 'required',

            'quantity' => 'required',

            'group_uid' => 'required',

            'menu_fooduid' =>'required',

        ]);

  

        Product::create($request->all());

   
        
        return redirect()->route('products.index')

                        ->with('success','Product created successfully.');

    }

   

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {



          
   /**   $response = request('GET', 'https://dev.tescolabs.com/grocery/products/?query=onion&offset=0&limit=10', [
    'headers' => ['Ocp-Apim-Subscription-Key' =>'2d1e93f0738c49e592381e2254298650']]);
$jsonArray = json_decode($response,true);*/


        $productsjoinfoodmenu=\DB::table('products')
        ->join('foodmenus', 'foodmenus.id', '=', 'products.menu_fooduid')
        ->select('*')
                   ->get();

        return view('products/show',compact('product','productsjoinfoodmenu'));
        
       
       
      

       
    }

   

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Product $product)

    {

        return view('products.edit',compact('product'));

    }

  

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Product $product)

    {

        $this->validate($request, [

            'name' => 'required',

            'detail' => 'required',

            'price' => 'required',

            'quantity' => 'required',

        ]);

  

        $product->update($request->all());

  

        return redirect()->route('products.index')

                        ->with('success','Product updated successfully');

                        

    }

  

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {

        $product->delete();

  

        return redirect()->route('products.index')

                        ->with('success','Product deleted successfully');

    }

}