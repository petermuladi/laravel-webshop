<?php

namespace App\Http\Controllers;
use App\Models\Product;

class CartController extends Controller
{

  //cartlist
  public function list()
  {
    $cart = session()->get('cart', []);

    if (isset($cart)) {
      return view('cartlist', compact('cart'));
    }
    return view('cartlist');
  }

  //add cart
  public function addToCart(string $id)
  {

    $product = Product::findOrFail($id);

    //$cart = []
    $cart = session()->get('cart', []);


    if (isset($cart[$id]["product"])) {
      $cart[$product->id]['quantity'] += 1;
    } else {
      $cart[$product->id]['quantity'] = 1;
      $cart[$product->id]['product'] = $product;
    }

    $data = CalculateController::calculateThreeAndFivePiecesDiscount($product, $cart[$id]['quantity']);
    $subtotal = CalculateController::calculateSubTotal($cart);

    session()->put('cart', $cart);
    session()->put('data-' . $id, $data);
    session()->put('subtotal', $subtotal);

    return redirect('/dashboard')->with('message', 'Product Added to Cart');

  }

  //quantity +
  public function increment(string $id)
  {

    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    if ($cart[$id]) {

      $cart[$id]['quantity'] += 1;

      $data = CalculateController::calculateThreeAndFivePiecesDiscount($product, $cart[$id]['quantity']);
      $subtotal = CalculateController::calculateSubTotal($cart);

      session()->put('cart', $cart);
      session()->put('data-' . $id, $data);
      session()->put('subtotal', $subtotal);

    }
    return redirect('/cart');
  }

  //quantity -
  public function decrement(string $id)
  {

    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    if ($cart[$id]) {
      $cart[$id]['quantity'] -= 1;

      if ($cart[$id]['quantity'] == 0) {
        $cart[$id]['quantity'] = 1;
      }

      $data = CalculateController::calculateThreeAndFivePiecesDiscount($product, $cart[$id]['quantity']);
      $subtotal = CalculateController::calculateSubTotal($cart);

      session()->put('cart', $cart);
      session()->put('data-' . $id, $data);
      session()->put('subtotal', $subtotal);

    }
    return redirect('/cart');
  }

  //delete from cart
  public function unset(string $id)
  {
    $cart = session()->get('cart', []);

    if ($cart[$id]) {

      unset($cart[$id]);
    }

    $subtotal = CalculateController::calculateSubTotal($cart);

    session()->put('cart', $cart);
    session()->put('subtotal', $subtotal);

    return redirect('/cart')->with('message', 'Deleted the product from the cart');
  }

}