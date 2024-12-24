<!-- app/views/components/loan-modal.php -->
<div id="loanModal" 
     class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 transition-opacity duration-300 ease-in-out opacity-0">
    <div data-modal-content 
         class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white transition-transform duration-300 ease-in-out transform scale-95">
        <div class="mt-3">
            <div class="flex items-center justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Solicitar Empréstimo</h3>
                <button data-close-modal class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="loanForm" class="mt-6">
                <div class="mb-4">
                    <label class="font-medium text-gray-700">Valor do Empréstimo</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">R$</span>
                        </div>
                        <input type="text" 
                               id="loanAmount" 
                               name="loanAmount"
                               class="appearance-none block w-full px-8 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                               placeholder="0,00"
                               required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="font-medium text-gray-700">Chave PIX</label>
                    <div class="mt-1">
                        <input type="text" 
                               id="pixKey" 
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50" 
                               readonly 
                               value="<?= htmlspecialchars($_SESSION['member_pix_key'] ?? '') ?>">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="font-medium text-gray-700">Valor Total com Juros (20%)</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">R$</span>
                        </div>
                        <input type="text" 
                               id="totalAmount" 
                               class="appearance-none block w-full px-8 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50" 
                               readonly>
                    </div>
                </div>

                <div class="mb-6">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="acceptRules" 
                                   name="acceptRules" 
                                   type="checkbox" 
                                   required
                                   class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="acceptRules" class="font-medium text-gray-700">
                                Li e concordo com as <a href="/member/rules#emprestimos" target="_blank" class="text-indigo-600 hover:text-indigo-500">regras do empréstimo</a>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                        <i class="fas fa-check-circle mr-2"></i>
                        Solicitar Empréstimo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>