<x-app-layout>
    <div class='container'>
        @if ($errors->any())
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Danger
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="bg-gradient-to-tr from-fuchsia-300 to-sky-500">
            <section id="login" class="p-4 flex flex-col justify-center min-h-screen max-w-md mx-auto">
                <div class="p-6 bg-sky-100 rounded">
                    <div class="flex items-center justify-center font-black m-3 mb-12">
                        <h1 class="tracking-wide text-3xl text-gray-900">Create new Product</h1>
                    </div>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                        class="flex
                        flex-col justify-center">
                        @csrf
                        <label class="text-sm font-medium">Name</label>
                        @error('name')
                            <p class="text-red-700">{{ $message }} </p>
                        @enderror

                        <input
                            class="
               mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
               focus:outline-none
               focus:border-sky-500
               focus:ring-1
               focus:ring-sky-500
               focus:invalid:border-red-500 focus:invalid:ring-red-500"
                            type="text" name="name" id='name' value='{{ old('name') }}' placeholder="product name..">
                        <label class="text-sm font-medium">Description</label>
                        @error('description')
                            <p class="text-red-700">{{ $message }} </p>
                        @enderror
                        <textarea
                            class="
               mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
               focus:outline-none
               focus:border-sky-500
               focus:ring-1
               focus:ring-sky-500
               focus:invalid:border-red-500 focus:invalid:ring-red-500"
                          id='description'  name="description" placeholder="description..">{{ old('description') }}</textarea>
                        <label class="text-sm font-medium">Price</label>
                        @error('price')
                            <p class="text-red-700">{{ $message }} </p>
                        @enderror
                        <input
                            class="
               mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
               focus:outline-none
               focus:border-sky-500
               focus:ring-1
               focus:ring-sky-500
               focus:invalid:border-red-500 focus:invalid:ring-red-500"
                            type='number' name="price" value='{{ old('price') }}' id='price' placeholder="$150">

                        <label class="text-sm font-medium">3 Pieces Price</label>
                        @error('threepiecesprice')
                            <p class="text-red-700">{{ $message }} </p>
                        @enderror
                        <input
                            class="
               mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
               focus:outline-none
               focus:border-sky-500
               focus:ring-1
               focus:ring-sky-500
               focus:invalid:border-red-500 focus:invalid:ring-red-500"
                            type='number' name="threepiecesprice" value='{{ old('threepiecesprice') }}' id="threpiecesprice" placeholder="$300">

                        <label class="text-sm font-medium">5 Pieces Price</label>
                        @error('fivepiecesprice')
                            <p class="text-red-700">{{ $message }} </p>
                        @enderror
                        <input
                            class="
               mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
               focus:outline-none
               focus:border-sky-500
               focus:ring-1
               focus:ring-sky-500
               focus:invalid:border-red-500 focus:invalid:ring-red-500"
                            type='number' name="fivepiecesprice" id="fivepiecesprice" value='{{ old('fivepiecesPrice') }}' placeholder="$600">
                        <div class="flex items-center mb-4">

                            <input type="checkbox" name='instock' id='instock' 
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Is in
                                Stock?</label>
                        </div>
                        <label class="block mb-1 mt-5 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload Product Picture</label>
                        <input
                            class="mb-10 mt-5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            name='image' id='image' type="file">

                        <button
                            class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-pink-600 to-red-600 font-medium text-gray-100 block transition duration-300"
                            type="submit">
                            Submit
                        </button>
                    </form>
                </div>
        </div>
</x-app-layout>
