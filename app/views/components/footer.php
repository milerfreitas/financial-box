<?php
// app/views/components/footer.php
?>
<footer class="bg-white shadow-lg mt-8">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Links Úteis -->
            <div>
                <h3 class="text-gray-900 font-semibold mb-3">Links Úteis</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="/member/rules" class="text-gray-600 hover:text-gray-900 text-sm">Regras da Caixinha</a>
                    </li>
                    <li>
                        <a href="/member/privacy-policy" class="text-gray-600 hover:text-gray-900 text-sm">Política de Privacidade</a>
                    </li>
                    <li>
                        <a href="/member/terms" class="text-gray-600 hover:text-gray-900 text-sm">Termos de Uso</a>
                    </li>
                </ul>
            </div>

            <!-- Contato -->
            <div>
                <h3 class="text-gray-900 font-semibold mb-3">Contato</h3>
                <ul class="space-y-2">
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:suporte@caixinha.com.br" class="hover:text-gray-900">suporte@caixinha.com.br</a>
                    </li>
                    <li class="flex items-center text-sm text-gray-600">
                        <svg class="h-5 w-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                        </svg>
                        <a href="https://wa.me/5521964619443" target="_blank" class="hover:text-gray-900">WhatsApp Suporte</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <p class="text-center text-sm text-gray-500">
                &copy; <?= date('Y') ?> Caixinha. Todos os direitos reservados.
            </p>
        </div>
    </div>
</footer>