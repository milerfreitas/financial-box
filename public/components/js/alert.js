// Alert Modal Handler
class AlertModal extends Modal {
    constructor(id) {
        super(id);
        this.timeout = null;
        this.callback = null;
    }

    // Limpa timeout ao fechar
    close() {
        if (this.timeout) {
            clearTimeout(this.timeout);
            this.timeout = null;
        }
        super.close();
        
        // Executa callback se existir
        if (typeof this.callback === 'function') {
            setTimeout(() => {
                this.callback();
                this.callback = null;
            }, 300);
        }
    }
}

// Instancia o modal de alerta
const alertModal = new AlertModal('alertModal');

/**
 * Exibe um alerta modal
 * @param {string} type - Tipo do alerta ('success', 'error', 'warning', 'info')
 * @param {string} title - Título do alerta
 * @param {string} message - Mensagem do alerta
 * @param {object} options - Opções adicionais
 */
function showAlert(type, title, message, options = {}) {
    const {
        autoClose = false,    // Fecha automaticamente após X millisegundos
        callback = null,      // Função a ser executada após fechar
        buttonText = 'OK'     // Texto do botão
    } = options;

    const alertIcon = document.getElementById('alertIcon');
    const alertTitle = document.getElementById('alertTitle');
    const alertMessage = document.getElementById('alertMessage');
    const alertButton = document.querySelector('#alertModal button[data-close-modal]');
    
    // Configurações de estilo baseadas no tipo
    const styles = {
        success: {
            iconBg: 'bg-green-100',
            icon: 'fa-check-circle text-green-600',
            buttonBg: 'bg-green-600 hover:bg-green-700 focus:ring-green-500'
        },
        error: {
            iconBg: 'bg-red-100',
            icon: 'fa-exclamation-circle text-red-600',
            buttonBg: 'bg-red-600 hover:bg-red-700 focus:ring-red-500'
        },
        warning: {
            iconBg: 'bg-yellow-100',
            icon: 'fa-exclamation-triangle text-yellow-600',
            buttonBg: 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500'
        },
        info: {
            iconBg: 'bg-blue-100',
            icon: 'fa-info-circle text-blue-600',
            buttonBg: 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500'
        }
    };
    
    const style = styles[type] || styles.info;
    
    // Configura o ícone
    alertIcon.className = `mx-auto flex items-center justify-center h-12 w-12 rounded-full ${style.iconBg}`;
    alertIcon.innerHTML = `<i class="fas ${style.icon} text-2xl"></i>`;
    
    // Configura o botão
    alertButton.className = `inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white ${style.buttonBg} focus:outline-none focus:ring-2 focus:ring-offset-2 sm:text-sm`;
    alertButton.textContent = buttonText;
    
    // Define título e mensagem
    alertTitle.textContent = title;
    alertMessage.textContent = message;
    
    // Limpa timeout anterior se existir
    if (alertModal.timeout) {
        clearTimeout(alertModal.timeout);
        alertModal.timeout = null;
    }
    
    // Configura callback
    alertModal.callback = callback;
    
    // Abre o modal
    alertModal.open();
    
    // Configura auto-close se necessário
    if (autoClose && typeof autoClose === 'number') {
        alertModal.timeout = setTimeout(() => {
            alertModal.close();
        }, autoClose);
    }
}

// Atalhos úteis para diferentes tipos de alertas
const Alert = {
    success(title, message, options = {}) {
        showAlert('success', title, message, options);
    },
    
    error(title, message, options = {}) {
        showAlert('error', title, message, options);
    },
    
    warning(title, message, options = {}) {
        showAlert('warning', title, message, options);
    },
    
    info(title, message, options = {}) {
        showAlert('info', title, message, options);
    },
    
    confirm(title, message, onConfirm, onCancel = null) {
        const confirmModal = document.getElementById('confirmModal');
        if (!confirmModal) return;
        
        const modal = new Modal('confirmModal');
        const confirmTitle = confirmModal.querySelector('#confirmTitle');
        const confirmMessage = confirmModal.querySelector('#confirmMessage');
        const confirmButton = confirmModal.querySelector('[data-confirm]');
        const cancelButton = confirmModal.querySelector('[data-cancel]');
        
        confirmTitle.textContent = title;
        confirmMessage.textContent = message;
        
        // Remove event listeners antigos
        const newConfirmButton = confirmButton.cloneNode(true);
        const newCancelButton = cancelButton.cloneNode(true);
        confirmButton.parentNode.replaceChild(newConfirmButton, confirmButton);
        cancelButton.parentNode.replaceChild(newCancelButton, cancelButton);
        
        // Adiciona novos event listeners
        newConfirmButton.addEventListener('click', () => {
            modal.close();
            if (typeof onConfirm === 'function') onConfirm();
        });
        
        newCancelButton.addEventListener('click', () => {
            modal.close();
            if (typeof onCancel === 'function') onCancel();
        });
        
        modal.open();
    }
};