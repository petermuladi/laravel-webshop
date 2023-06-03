        {{-- summ Quantity all Products in cart --}}
        @php
            $totalquantity = 0;
        @endphp
        @foreach (session('cart', []) as $item)
            {{-- dd($item['quantity']) --}}
            @php
                $totalquantity += $item['quantity'];
            @endphp
        @endforeach


         <div class="relative inline-flex items-center justify-end">
                {{-- cart icon --}}
                <a href="{{ route('cart.list') }}">
                    <button type="button"
                        class="p-3 text-sm font-medium text-center text-white bg-blue-400 rounded-lg hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{-- product quantity --}}
                        <div
                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                            {{ $totalquantity }}
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </button>
                </a>
            </div>