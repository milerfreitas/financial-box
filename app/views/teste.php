<?php
// app/views/register-success.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Realizado - Caixinha</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div>
                    <!-- Ícone de sucesso -->
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Bem-vindo(a), Maxmiler!
                    </h2>
                    
                    <div class="mt-4 text-sm text-gray-600">
                        <p>Seu cadastro foi realizado com sucesso. Confira seus dados:</p>
                        <div class="mt-4 bg-gray-100 rounded-md p-4">
                            <p><strong>Nome:</strong> Maxmiler Freitas</p>
                            <p><strong>CPF:</strong> 107.101.107-31</p>
                            <p><strong>Telefone:</strong> (21) 98227-1667</p>
                            <p><strong>Chave PIX:</strong> 21988124039</p>
                            <p><strong>Banco:</strong> Nubank</p>
                            <p><strong>Quantidade de Cotas:</strong> 1</p>
                            <p><strong>Endereço:</strong> Rua Oliveira Bueno, 333 - Segundo Andar Anchieta CEP: 21645-440</p>
                        </div>
                    </div>
                    
                    <div class="mt-6 rounded-md bg-blue-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3 text-center">
                                <h2 class="text-sm font-medium font-bold text-blue-800">
                                    Importante
                                </h2>
                                <div class="mt-2 text-sm text-blue-700">
                                    <p>Caso haja algum erro nos dados cadastrados, entre em contato com o administrador pelo WhatsApp.</p>
                                    <div class="mt-4">
                                        <a href="https://wa.me/5511999999999?text=Olá,%20preciso%20de%20ajuda%20com%20meu%20cadastro%20na%20caixinha" target="_blank"
                                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <svg class="-ml-1 mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                            </svg>
                                            Falar com Admin
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <a href="/login" 
                           class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ir para Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>