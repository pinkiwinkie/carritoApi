<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cart;

class CartController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $carts = Cart::get();
    return response()->json($carts, 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $cart = new Cart();
    $cart->idProduct = $request->get('idProduct');
    $cart->quantity = $request->get('quantity');
    $cart->idUser = $request->get('idUser');
    $cart->save();
    return response()->json($cart, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($idUser)
  {
    $carts = Cart::where('idUser', $idUser)->get();
    return response()->json($carts, 200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $cart = Cart::where('id', $id)->get();
    $cart->quantity = $request->get('quantity');
    $cart->save();
    return response()->json($cart, 201);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($idCart)
  {
    $cart = Cart::where('id', $idCart);
    $cart->delete();
    return response()->json(null, 204);
  }
}
