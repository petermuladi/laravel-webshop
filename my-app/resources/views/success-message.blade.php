@if (session()->has('message'))
    <div id="alert-additional-content-1"
        class="p-4 mb-4 text-white border border-blue-300 rounded-lg bg-purple-900 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
        role="alert">
        <div class="flex justify-center">
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <h3 class="text-lg font-medium">Hey! Info</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-center">
            {{ session('message') }}
        </div>
        <div class="mt-2 mb-4 text-sm">
        </div>
        <div class="flex justify-center">
            <button type="button"
                class="text-white bg-transparent border border-white hover:bg-yellow-300 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-600 dark:border-yellow-600 dark:text-blue-400 dark:hover:text-white dark:focus:ring-yellow-300"
                data-dismiss-target="#alert-additional-content-1" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>
@endif
