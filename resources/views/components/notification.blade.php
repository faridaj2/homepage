<div id="toast-notification"
    class="w-full max-w-xs p-4 text-gray-900 bg-white rounded-lg shadow-md absolute top-10 right-10"
    x-data="{ open: true }" x-show="open" role="alert">
    <div class="flex items-center mb-3" @click="open= !open">
        <span class="mb-1 text-sm font-semibold text-gray-900 ">New notification</span>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 "
            data-dismiss-target="#toast-notification" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    <div class="flex items-center">

        <div class="ms-3 text-sm font-normal">
            <div class="text-sm font-semibold text-gray-900 ">Kesalahan</div>
            <div class="text-sm font-normal">Email/Password yang anda masukkan salah</div>
        </div>
    </div>
</div>
