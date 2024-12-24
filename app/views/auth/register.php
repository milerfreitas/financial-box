<?php
// app/views/auth/register.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Caixinha</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-center text-3xl font-extrabold text-gray-900">
                Cadastro de Membro
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Preencha todos os campos abaixo para participar da caixinha
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <?php if (!empty($error)): ?>
                    <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">
                                    <?= htmlspecialchars($error) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form class="space-y-8" action="/register" method="POST">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nome Completo
                        </label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" required
                                   value="<?= htmlspecialchars($formData['name'] ?? '') ?>"
                                   class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="cpf" class="block text-sm font-medium text-gray-700">
                                CPF
                            </label>
                            <div class="mt-1">
                                <input id="cpf" name="cpf" type="text" required
                                       value="<?= htmlspecialchars($formData['cpf'] ?? '') ?>"
                                       placeholder="000.000.000-00"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">
                                Telefone
                            </label>
                            <div class="mt-1">
                                <input id="phone" name="phone" type="text" required
                                       value="<?= htmlspecialchars($formData['phone'] ?? '') ?>"
                                       placeholder="(00) 00000-0000"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="pix_key" class="block text-sm font-medium text-gray-700">
                                Chave PIX
                            </label>
                            <div class="mt-1">
                                <input id="pix_key" name="pix_key" type="text" required
                                       value="<?= htmlspecialchars($formData['pix_key'] ?? '') ?>"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="bank" class="block text-sm font-medium text-gray-700">
                                Banco
                            </label>
                            <div class="mt-1">
                                <select id="bank" name="bank" required class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Selecione</option>
                                    <option value="001">Banco do Brasil</option>
                                    <option value="237">Bradesco</option>
                                    <option value="104">Caixa Econômica Federal</option>
                                    <option value="341">Itaú</option>
                                    <option value="033">Santander</option>
                                    <option value="399">HSBC</option>
                                    <option value="745">Citibank</option>
                                    <option value="260">Nubank</option>
                                    <option value="290">PagBank</option>
                                    <option value="077">Banco Inter</option>
                                    <option value="756">Sicoob</option>
                                    <option value="041">Banrisul</option>
                                    <option value="422">Safra</option>
                                    <option value="748">Sicredi</option>
                                    <option value="212">Original</option>
                                    <option value="332">Agibank</option>
                                    <option value="633">C6 Bank</option>
                                    <option value="136">Unicred</option>
                                    <option value="323">Mercado Pago</option>
                                    <option value="655">Neon</option>
                                    <option value="670">PicPay</option>
                                    <option value="680">99Pay</option>
                                    <option value="707">Digio</option>
                                    <option value="746">Modalmais</option>
                                    <option value="208">BTG Pactual</option>
                                    <option value="479">Will Bank</option>
                                    <option value="623">Banco Pan</option>
                                    <option value="237-Next">Next</option>
                                    <option value="102">XP Investimentos</option>
                                    <option value="outro">Outro</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="quotes" class="block text-sm font-medium text-gray-700">
                                Cotas
                            </label>
                        <select id="quota_quantity" name="quota_quantity" required class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Selecione</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-4">
                            <label for="address_zipcode" class="block text-sm font-medium text-gray-700">
                                CEP
                            </label>
                            <div class="mt-1">
                                <input id="address_zipcode" name="address_zipcode" type="text" required
                                       value="<?= htmlspecialchars($formData['address_zipcode'] ?? '') ?>"
                                       placeholder="00000-000"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-8">
                            <label for="address_street" class="block text-sm font-medium text-gray-700">
                                Rua
                            </label>
                            <div class="mt-1">
                                <input id="address_street" name="address_street" type="text" required
                                       value="<?= htmlspecialchars($formData['address_street'] ?? '') ?>"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-4">
                            <label for="address_number" class="block text-sm font-medium text-gray-700">
                                Número
                            </label>
                            <div class="mt-1">
                                <input id="address_number" name="address_number" type="text" required
                                       value="<?= htmlspecialchars($formData['address_number'] ?? '') ?>"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-7">
                            <label for="address_complement" class="block text-sm font-medium text-gray-700">
                                Complemento
                            </label>
                            <div class="mt-1">
                                <input id="address_complement" name="address_complement" type="text"
                                       value="<?= htmlspecialchars($formData['address_complement'] ?? '') ?>"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="col-span-5">
                            <label for="address_district" class="block text-sm font-medium text-gray-700">
                                Bairro
                            </label>
                            <div class="mt-1">
                                <input id="address_district" name="address_district" type="text" required
                                       value="<?= htmlspecialchars($formData['address_district'] ?? '') ?>"
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Senha
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Confirme sua Senha
                            </label>
                            <div class="mt-1">
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                       class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function collectDeviceData() {
        const data = {
            screen_data: `${window.screen.width}x${window.screen.height}x${window.screen.colorDepth}`,
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            platform: navigator.platform,
            cookies_enabled: navigator.cookieEnabled
        };
        
        // Adiciona os campos hidden ao formulário
        Object.keys(data).forEach(key => {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = data[key];
            document.querySelector('form').appendChild(input);
        });
    }

    // Executa quando o documento carregar
    document.addEventListener('DOMContentLoaded', collectDeviceData);
    </script>

    <script>
    // Função genérica para aplicar máscara
    function maskInput(input, mask) {
        let value = input.value.replace(/\D/g, '');
        let formatted = '';
        let maskIndex = 0;
        let valueIndex = 0;

        while (maskIndex < mask.length && valueIndex < value.length) {
            if (mask[maskIndex] === '0') {
                formatted += value[valueIndex];
                valueIndex++;
            } else {
                formatted += mask[maskIndex];
            }
            maskIndex++;
        }

        input.value = formatted;
    }

    // Aplicando máscaras aos campos
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function() {
        maskInput(this, '000.000.000-00');
    });

    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function() {
        const phoneNumber = this.value.replace(/\D/g, '');
        if (phoneNumber.length <= 10) {
            maskInput(this, '(00) 0000-0000');
        } else {
            maskInput(this, '(00) 00000-0000');
        }
    });

    const cepInput = document.getElementById('address_zipcode');
    cepInput.addEventListener('input', function() {
        maskInput(this, '00000-000');
    });

    // Busca endereço pelo CEP
    cepInput.addEventListener('blur', async function() {
        const cep = this.value.replace(/\D/g, '');
        if (cep.length === 8) {
            try {
                const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const data = await response.json();
                
                if (!data.erro) {
                    document.getElementById('address_street').value = data.logradouro;
                    document.getElementById('address_district').value = data.bairro;
                    document.getElementById('address_city').value = data.localidade;
                    document.getElementById('address_state').value = data.uf;
                }
            } catch (error) {
                console.error('Erro ao buscar CEP:', error);
            }
        }
    });

    // Função para validar CPF
    function validateCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');
        
        if (cpf.length !== 11) return false;
        
        // Verifica se todos os dígitos são iguais
        if (/^(\d)\1+$/.test(cpf)) return false;
        
        // Validação dos dígitos verificadores
        let sum = 0;
        let remainder;
        
        for (let i = 1; i <= 9; i++) {
            sum += parseInt(cpf[i-1]) * (11 - i);
        }
        
        remainder = (sum * 10) % 11;
        if (remainder === 10 || remainder === 11) remainder = 0;
        if (remainder !== parseInt(cpf[9])) return false;
        
        sum = 0;
        for (let i = 1; i <= 10; i++) {
            sum += parseInt(cpf[i-1]) * (12 - i);
        }
        
        remainder = (sum * 10) % 11;
        if (remainder === 10 || remainder === 11) remainder = 0;
        if (remainder !== parseInt(cpf[10])) return false;
        
        return true;
    }

    // Validação do formulário antes do envio
    document.querySelector('form').addEventListener('submit', function(e) {
        const cpf = cpfInput.value.replace(/\D/g, '');
        
        if (!validateCPF(cpf)) {
            e.preventDefault();
            alert('Por favor, insira um CPF válido.');
            cpfInput.focus();
            return;
        }
        
        const phone = phoneInput.value.replace(/\D/g, '');
        if (phone.length < 10) {
            e.preventDefault();
            alert('Por favor, insira um telefone válido.');
            phoneInput.focus();
            return;
        }
        
        const cep = cepInput.value.replace(/\D/g, '');
        if (cep.length !== 8) {
            e.preventDefault();
            alert('Por favor, insira um CEP válido.');
            cepInput.focus();
            return;
        }
    });
    </script>
</body>
</html>