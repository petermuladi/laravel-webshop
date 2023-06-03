<?php

use App\Http\Controllers\CalculateController;

/***
 * 
 * run: php artisan test tests/Unit/CalculateSubtotalTest.php
 * 
 */

test('calculate without discount', function(){

 $cart = [
    'product-1' => [
        'product' => [
            'price' => 5,
            'threepiecesprice' => null,
            'fivepiecesprice' => null,
        ],
        'quantity' => 2,
    ],
    'product-2' => [
        'product' => [
            'price' => 15,
            'threepiecesprice' => null,
            'fivepiecesprice' => null,
        ],
        'quantity' => 4,
    ],
];


$totalPrice = CalculateController::calculateSubTotal($cart);
$expectedTotalPrice = (2*5)+(4*15);

$this->assertSame($expectedTotalPrice, $totalPrice);

});

test('calculate with 3pieces price', function(){

    $cart = [
       'product-1' => [
           'product' => [
               'price' => 5,
               'threepiecesprice' => 15,
               'fivepiecesprice' => null,
           ],
           'quantity' => 3,
       ],
       'product-2' => [
           'product' => [
               'price' => 15,
               'threepiecesprice' => 30,
               'fivepiecesprice' => null,
           ],
           'quantity' => 3,
       ],
   ];
   
   
   $totalPrice = CalculateController::calculateSubTotal($cart);
   $expectedTotalPrice = (15)+(30);
   
   $this->assertSame($expectedTotalPrice, $totalPrice);
   
});

test('calculate with 5pieces price', function(){

    $cart = [
       'product-1' => [
           'product' => [
               'price' => 5,
               'threepiecesprice' => 15,
               'fivepiecesprice' => 30,
           ],
           'quantity' => 5,
       ],
       'product-2' => [
           'product' => [
               'price' => 15,
               'threepiecesprice' => 30,
               'fivepiecesprice' => 50,
           ],
           'quantity' => 5,
       ],
   ];
   
   
   $totalPrice = CalculateController::calculateSubTotal($cart);
   $expectedTotalPrice = (50)+(30);
   
   $this->assertSame($expectedTotalPrice, $totalPrice);
   
});

