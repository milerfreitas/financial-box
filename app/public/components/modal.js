// Modal Component
class Modal {
    constructor(id) {
        this.modal = document.getElementById(id);
        this.isOpen = false;
        this.setupModal();
    }

    setupModal() {
        // Fecha modal ao clicar fora
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.close();
            }
        });

        // Procura e configura botão de fechar
        const closeBtn = this.modal.querySelector('[data-close-modal]');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => this.close());
        }
    }

    open() {
        this.modal.classList.remove('hidden');
        // Pequeno timeout para garantir que a transição funcione
        setTimeout(() => {
            this.modal.classList.remove('opacity-0');
            const content = this.modal.querySelector('[data-modal-content]');
            if (content) {
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }
        }, 10);
        this.isOpen = true;
        
        // Previne scroll do body
        document.body.style.overflow = 'hidden';
    }

    close() {
        this.modal.classList.add('opacity-0');
        const content = this.modal.querySelector('[data-modal-content]');
        if (content) {
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
        }
        
        // Aguarda a transição terminar antes de esconder
        setTimeout(() => {
            this.modal.classList.add('hidden');
            this.reset();
        }, 300);
        
        this.isOpen = false;
        document.body.style.overflow = '';
    }

    reset() {
        // Limpa formulários
        const forms = this.modal.querySelectorAll('form');
        forms.forEach(form => form.reset());
        
        // Limpa inputs
        const inputs = this.modal.querySelectorAll('input:not([type="hidden"])');
        inputs.forEach(input => input.value = '');
        
        // Desmarca checkboxes
        const checkboxes = this.modal.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => checkbox.checked = false);
    }
}