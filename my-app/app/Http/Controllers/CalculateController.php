<?php

namespace App\Http\Controllers;

abstract class CalculateController extends Controller
{
  public static function calculateThreeAndFivePiecesDiscount($product, $quantity)
  {

    $price = 0;
    $total = 0;
    $data = [];

    if ($product->threepiecesprice != null && $quantity == 3) {

      $total = $product->threepiecesprice;
      $price = 'discount-price';

      $data = [
        'price' => $price,
        'total' => $total,
      ];

      return $data;
    } elseif ($product->threepiecesprice != null && $quantity == 5) {

      $total = $product->fivepiecesprice;
      $price = 'discount-price';

      $data = [
        'price' => $price,
        'total' => $total,
      ];

      return $data;
    }

    $price = $product->price;
    $total = $product->price * $quantity;

    $data = [
      'price' => $price,
      'total' => $total,
    ];

    return $data;
  }

  public static function calculateSubTotal($sessionCart)
  {

    $total = 0;

    foreach ($sessionCart as $item) {

      $product = $item['product'];

      if ($product['threepiecesprice'] != null && $item['quantity'] == 3) {
        $total += $product['threepiecesprice'];

      } elseif ($product['fivepiecesprice'] != null && $item['quantity'] == 5) {

        $total += $product['fivepiecesprice'];

      } else {
        $total += $product['price'] * $item['quantity'];
      }
    }
    return $total;
  }

}