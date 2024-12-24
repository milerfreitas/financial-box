<?php
// app/views/auth/login.php
?>
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login - Caixinha</title>
    <link href='https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>
</head>
<body class='bg-gray-50'>
    <div class='min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8'>
        <div class='max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow'>
            <div>
                <h1 class='text-center text-3xl font-extrabold text-gray-900'>
                    Caixinha
                </h1>
                <h2 class='mt-6 text-center text-xl font-bold text-gray-900'>
                    Faça login em sua conta
                </h2>
            </div>
            
            <?php if (!empty($error)): ?>
                <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                    <span class='block sm:inline'><?php print $error; ?></span>
                </div>
            <?php endif; ?>

            <form class='mt-8 space-y-6' action='/login' method='POST'>
                <div class='rounded-md shadow-sm space-y-4'>
                    <div>
                        <label for='cpf' class='sr-only'>CPF</label>
                        <input id='cpf' name='cpf' type='text' required 
                            class='appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm' 
                            placeholder='CPF'>
                    </div>
                    <div>
                        <label for='password' class='sr-only'>Senha</label>
                        <input id='password' name='password' type='password' required 
                            class='appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm' 
                            placeholder='Senha'>
                    </div>
                </div>

                <div>
                    <button type='submit' class='group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500'>
                        <span class='absolute left-0 inset-y-0 flex items-center pl-3'>
                            <i class='fas fa-sign-in-alt'></i>
                        </span>
                        Entrar
                    </button>
                </div>
            </form>
            
            <div class='text-center mt-4'>
                <a href='/register' class='text-sm font-medium text-blue-600 hover:text-blue-500'>
                    Ainda não tem uma conta? Registre-se
                </a>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00', {reverse: true});
        });
    </script>
</body>
</html>