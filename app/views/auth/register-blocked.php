<?php
// app/views/auth/register-blocked.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Bloqueado - Caixinha</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="text-center">
                    <!-- Ícone de bloqueio -->
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Acesso Temporariamente Bloqueado
                    </h2>
                    
                    <div class="mt-4 text-center text-sm text-gray-600">
                        <p>Detectamos atividade suspeita e seu acesso foi temporariamente bloqueado.</p>
                        <p class="mt-2">Por favor, aguarde 24 horas antes de tentar novamente.</p>
                    </div>
                    
                    <div class="mt-6">
                        <div class="rounded-md bg-red-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        Por que fui bloqueado?
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <p>Este bloqueio ocorre quando detectamos:</p>
                                        <ul class="list-disc list-inside mt-1">
                                            <li>Múltiplas tentativas de registro</li>
                                            <li>Padrões suspeitos de atividade</li>
                                            <li>Violações das regras de cadastro</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <a href="/" 
                           class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Voltar para Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>