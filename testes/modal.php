<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo de Modais</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .modal-hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center">Demonstração de Modais</h1>

        <!-- Seção de botões -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <!-- Modal Simples -->
            <button onclick="simpleModal.open()" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-colors">
                Modal Simples
            </button>

            <!-- Modal de Formulário -->
            <button onclick="formModal.open()"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition-colors">
                Modal com Formulário
            </button>

            <!-- Modal de Confirmação -->
            <button onclick="confirmModal.open()"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition-colors">
                Modal de Confirmação
            </button>
        </div>

        <!-- Modal Simples -->
        <div id="simple-modal" class="modal-hidden">
            <div class="p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Modal Simples</h2>
                <p class="text-gray-600 mb-6">
                    Este é um exemplo de modal simples com apenas uma mensagem e um botão de fechar.
                </p>
                <div class="flex justify-end">
                    <button data-close-modal 
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition-colors">
                        Fechar
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal de Formulário -->
        <div id="form-modal" class="modal-hidden">
            <div class="p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Formulário de Cadastro</h2>
                <form id="demo-form" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Nome
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="name" type="text" placeholder="Seu nome">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="email" type="email" placeholder="seu@email.com">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button data-close-modal type="button"
                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition-colors">
                            Cancelar
                        </button>
                        <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition-colors">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal de Confirmação -->
        <div id="confirm-modal" class="modal-hidden">
            <div class="p-6 w-full max-w-md">
                <div class="mb-4">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold mb-2 text-center">Confirmar Exclusão</h2>
                    <p class="text-gray-600 text-center">
                        Tem certeza que deseja excluir este item? Esta ação não pode ser desfeita.
                    </p>
                </div>
                <div class="flex justify-center space-x-2">
                    <button data-close-modal
                            class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition-colors">
                        Cancelar
                    </button>
                    <button onclick="handleDelete()"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition-colors">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        class Modal {
            constructor(modalId) {
                this.modal = document.getElementById(modalId);
                this.overlay = document.createElement('div');
                this.overlay.className = 'fixed inset-0 bg-black bg-opacity-50 transition-opacity duration-300 opacity-0';
                this.overlay.style.display = 'none';
                this.isOpen = false;
                this.setupModal();
            }

            setupModal() {
                // Configurar overlay
                document.body.appendChild(this.overlay);
                
                // Adicionar classes necessárias ao modal
                this.modal.classList.add('fixed', 'top-1/2', 'left-1/2', 'transform', '-translate-x-1/2', '-translate-y-1/2',
                    'bg-white', 'rounded-lg', 'shadow-xl', 'transition-all', 'duration-300', 'z-50', 'scale-0', 'opacity-0');

                // Event listeners
                this.overlay.addEventListener('click', () => this.close());
                
                // Encontrar botão de fechar pelo atributo data-close-modal
                const closeButton = this.modal.querySelector('[data-close-modal]');
                if (closeButton) {
                    closeButton.addEventListener('click', () => this.close());
                }
            }

            open() {
                if (this.isOpen) return;
                
                // Limpar conteúdo dos inputs
                const inputs = this.modal.querySelectorAll('input, textarea');
                inputs.forEach(input => input.value = '');

                // Mostrar overlay com fade
                this.overlay.style.display = 'block';
                this.overlay.style.zIndex = '40';
                setTimeout(() => this.overlay.classList.add('opacity-100'), 10);

                // Mostrar e animar modal
                this.modal.classList.remove('modal-hidden', 'scale-0', 'opacity-0');
                this.modal.classList.add('scale-100', 'opacity-100');
                
                this.isOpen = true;
            }

            close() {
                if (!this.isOpen) return;

                // Fade out overlay
                this.overlay.classList.remove('opacity-100');
                
                // Animar fechamento do modal
                this.modal.classList.remove('scale-100', 'opacity-100');
                this.modal.classList.add('scale-0', 'opacity-0');

                // Remover overlay e esconder modal após animação
                setTimeout(() => {
                    this.overlay.style.display = 'none';
                    this.modal.classList.add('modal-hidden');
                    this.isOpen = false;
                }, 300);
            }
        }

        // Inicializar os modais
        const simpleModal = new Modal('simple-modal');
        const formModal = new Modal('form-modal');
        const confirmModal = new Modal('confirm-modal');

        // Manipulador para o formulário
        document.getElementById('demo-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            
            alert(`Dados enviados:\nNome: ${name}\nEmail: ${email}`);
            formModal.close();
        });

        // Função para simular exclusão
        function handleDelete() {
            alert('Item excluído com sucesso!');
            confirmModal.close();
        }
    </script>
</body>
</html>