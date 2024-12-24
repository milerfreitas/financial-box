<?php 
// app/views/components/header.php
?>
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <h1 class="text-xl font-semibold">Caixinha</h1>
            </div>
            <div class="flex items-center space-x-4">
                <button onclick="toggleUserMenu()" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <?= htmlspecialchars($member_name ?? '') ?>
                </button>
                <div class="relative">
                    <button onclick="toggleUserMenu()" class="p-1 rounded-full text-gray-600 hover:text-gray-700">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    <div id="userMenu" class="hidden absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <a href="/member/rules" class="flex items-center px-4 py-2 text-sm text-red-700 hover:bg-gray-100">
                                <svg class="mr-3 h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16M4 8h16M4 12h16M4 16h16" />
                                </svg>
                                Ver Regras
                            </a>
                        </div>
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