<?php
// app/views/member/password.php
?>

    <!-- Conteúdo Principal -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Alterar Senha</h2>
            </div>

            <?php if (!empty($success)): ?>
            <div class="p-4 mb-4 bg-green-50 border-l-4 border-green-400">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700"><?= htmlspecialchars($success) ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
            <div class="p-4 mb-4 bg-red-50 border-l-4 border-red-400">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700"><?= htmlspecialchars($error) ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <form action="/member/process-password" method="POST" class="p-6">
                <div class="space-y-6">
                    <div>
                        <label for="current_password" class="font-medium text-gray-700">Senha Atual</label>
                        <input type="password" name="current_password" id="current_password" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mt-2">
                    </div>

                    <div>
                        <label for="new_password" class="font-medium text-gray-700">Nova Senha</label>
                        <input type="password" name="new_password" id="new_password" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mt-2">
                               <p class="text-red-500">Mínimo de 6 caracteres</p>
                    </div>

                    <div>
                        <label for="confirm_password" class="font-medium text-gray-700">Confirmar Nova Senha</label>
                        <input type="password" name="confirm_password" id="confirm_password" required
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mt-2">
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <a href="/member" 
                           class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Alterar Senha
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

