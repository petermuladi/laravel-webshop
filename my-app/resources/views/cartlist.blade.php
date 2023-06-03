<x-app-layout>
    @include('success-message')
    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10">
            <div class="w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                </div>
                {{--  --}}
                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold  text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                    <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                    <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                </div>
                {{-- if -else logic --}}
                @if (session('cart', []) != [])
                    {{-- foreach --}}
                    @foreach (session('cart', []) as $item)
                        {{--  --}}
                        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-2/5">
                                <!-- product -->
                                <div class="w-20">
                                    <a href="{{ route('product.show',['id'=>$item['product']->id]) }}">
                                    <img class="h-24" src="{{asset('storage/images/'. $item['product']->product_pics) }}" alt="">
                                    </a>
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">{{ $item['product']->name }}</span>
                                    <span class="text-purple-500 text-xs">{{ $item['product']->description }}</span>
                                    <form method='post'
                                        action='{{ route('cart.unset', ['id' => $item['product']->id]) }}'>
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-2 text-xs font-medium text-center text-white bg-red-400 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Remove</button>
                                    </form>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                {{-- decrement --}}
                                <form method='post'
                                    action='{{ route('cart.decrement', ['id' => $item['product']->id]) }}'>
                                    @csrf
                                    <button type='submit'>-</button>
                                </form>
                                {{-- input value --}}
                                <h1 class="mr-2 ml-2">{{ $item['quantity'] }}</h1>
                                {{-- increment --}}
                                <form method='post'
                                    action='{{ route('cart.increment', ['id' => $item['product']->id]) }}'>
                                    @csrf
                                    <button type='submit'>+</button>
                                </form>
                            </div>
                            {{-- discount price 3pieces 5pieces --}}
                            <span class="text-center  w-1/5 font-semibold text-xm">${{ session('data-'.$item['product']->id)['price']}}</span>
                            <span class="text-center w-1/5 font-semibold text-xm">${{ session('data-'.$item['product']->id)['total']}}</span>
                        </div>
                    @endforeach
                    {{-- end foreach --}}
                @else
                    cart is empty...
                @endif
                {{-- continue shopping --}}
                <a href="{{ route('dashboard') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                    <svg class="fill-current mr-2 text-purple-600 w-4" viewBox="0 0 448 512">
                        <path
                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                    </svg>
                    Continue Shopping
                </a>
            </div>
            {{-- summary --}}
            <div id="summary" class="w-1/4 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-center text-sm uppercase">
                    {{-- 1 piece -> item 2-3-4-5...->items --}}
                        @if (session('cart', []) != [] && count(session('cart', [])) > 1)
                            {{ count(session('cart', [])) }} items
                        @elseif(session('cart', []) == [])
                            cart is empty....
                        @elseif(count(session('cart', [])) == 1)
                            {{ count(session('cart', [])) }} item
                        @endif
                    </span>
                </div>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        {{-- Total cost --}}
                        <span>Total cost</span>
                        <span>${{ session('subtotal') }}</span>
                    </div>
                    <button
                        class="bg-purple-800 font-semibold hover:bg-purple-500 py-3 text-sm text-white uppercase w-full">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
