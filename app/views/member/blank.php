<?php
// app/views/member/default-blank.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Caixinha</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold">Caixinha</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button onclick="toggleUserMenu()" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <?= htmlspecialchars($_SESSION['member_name']) ?>
                    </button>
                    <div class="relative">
                        <button onclick="toggleUserMenu()" class="p-1 rounded-full text-gray-600 hover:text-gray-700">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <a href="/logout" class="flex items-center px-4 py-2 text-sm text-red-700 hover:bg-gray-100">
                                    <svg class="mr-3 h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sair
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    <div class="max-w-7xl mx-auto px-4 mt-6">
        <nav class="text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center">
                <?php foreach (getBreadcrumbs() as $index => $crumb): ?>
                    <li class="inline-flex items-center">
                        <?php if ($index > 0): ?>
                            <span class="mx-2 text-gray-400">/</span>
                        <?php endif; ?>
                        
                        <?php if ($crumb['active']): ?>
                            <span class="text-gray-500">
                                <?= htmlspecialchars($crumb['name']) ?>
                            </span>
                        <?php else: ?>
                            <a href="<?= htmlspecialchars($crumb['url']) ?>" 
                               class="text-gray-600 hover:text-gray-900">
                                <?= htmlspecialchars($crumb['name']) ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    </div>

    <!-- Conteúdo Principal -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        
        
    </div>

    <!-- Rodapé -->
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
                            <a href="member/privacy-policy" class="text-gray-600 hover:text-gray-900 text-sm">Política de Privacidade</a>
                        </li>
                        <li>
                            <a href="member/terms" class="text-gray-600 hover:text-gray-900 text-sm">Termos de Uso</a>
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

                <!-- Redes Sociais -->
                <!-- <div>
                    <h3 class="text-gray-900 font-semibold mb-3">Redes Sociais</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-500 hover:text-gray-900">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                </div> -->
            </div>

            <!-- Copyright -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <p class="text-center text-sm text-gray-500">
                    &copy; <?= date('Y') ?> Caixinha. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </footer>

    <script>
    function toggleUserMenu() {
        const menu = document.getElementById('userMenu');
        menu.classList.toggle('hidden');
        // Fecha o menu ao clicar fora dele
        document.addEventListener('click', function closeMenu(e) {
            if (!menu.contains(e.target) && !e.target.closest('button')) {
                menu.classList.add('hidden');
                document.removeEventListener('click', closeMenu);
            }
        });
    }
    </script>
</body>
</html>