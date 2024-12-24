<!-- app/views/components/alert-modal.php -->
<div id="alertModal" 
     class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 transition-opacity duration-300 ease-in-out opacity-0">
    <div data-modal-content 
         class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white transition-transform duration-300 ease-in-out transform scale-95">
        <div class="mt-3 text-center">
            <div id="alertIcon" class="mx-auto flex items-center justify-center h-12 w-12 rounded-full">
                <i class="fas fa-check-circle text-2xl"></i>
            </div>
            <h3 id="alertTitle" class="text-lg leading-6 font-medium text-gray-900 mt-4"></h3>
            <div class="mt-2 px-7 py-3">
                <p id="alertMessage" class="text-sm text-gray-500"></p>
            </div>
            <div class="mt-4">
                <button data-close-modal 
                        class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                    OK
                </button>
            </div>
        </div>
    </div>
</div>