 // public/js/member/dashboard.js

// Funções para manipulação dos modais
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
    // Pequeno timeout para garantir que a transição funcione
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        modal.querySelector('div[class*="transform"]').classList.remove('scale-95');
        modal.querySelector('div[class*="transform"]').classList.add('scale-100');
    }, 10);

    // Fechar ao clicar fora
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal(modalId);
        }
    });
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('opacity-0');
    modal.querySelector('div[class*="transform"]').classList.remove('scale-100');
    modal.querySelector('div[class*="transform"]').classList.add('scale-95');
    
    // Aguarda a transição terminar antes de esconder
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Funções específicas do modal de empréstimo
document.getElementById('requestLoanBtn').onclick = () => {
    openModal('loanModal');
}

function closeLoanModal() {
    closeModal('loanModal');
}

function formatCurrency(value) {
    const numericValue = value.replace(/\D/g, '') / 100;
    return numericValue.toLocaleString('pt-BR', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function updateTotalAmount(value) {
    const numericValue = Number(value.replace(/\D/g, '')) / 100;
    const totalValue = numericValue * 1.2;
    
    document.getElementById('totalAmount').value = totalValue.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    
    document.getElementById('loanAmount').value = formatCurrency(value);
}

function confirmLoan() {
    const acceptRules = document.getElementById('acceptRules');
    const loanAmount = document.getElementById('loanAmount').value
        .replace(/\D/g, '')
        .replace(/(\d)(\d{2})$/, '$1.$2');

    if (!acceptRules.checked) {
        showAlert('error', 'Erro!', 'Você precisa aceitar as regras para continuar');
        return;
    }

    if (!loanAmount || loanAmount <= 0) {
        showAlert('error', 'Erro!', 'Por favor, informe um valor válido');
        return;
    }

    fetch('/member/process-loan', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `amount=${loanAmount}`
    })
    .then(response => response.json())
    .then(data => {
        closeLoanModal();
        
        if (data.success) {
            showAlert('success', 'Sucesso!', data.message);
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        } else {
            showAlert('error', 'Erro!', data.error);
        }
    })
    .catch(error => {
        closeLoanModal();
        showAlert('error', 'Erro!', 'Erro ao processar sua solicitação');
    });
}

// Funções do modal de alerta
function showAlert(type, title, message) {
    const alertIcon = document.getElementById('alertIcon');
    const alertTitle = document.getElementById('alertTitle');
    const alertMessage = document.getElementById('alertMessage');
    const alertButton = document.querySelector('#alertModal button');
    
    if (type === 'success') {
        alertIcon.className = 'mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100';
        alertIcon.querySelector('svg').className = 'h-6 w-6 text-green-600';
        alertButton.className = 'inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm';
    } else {
        alertIcon.className = 'mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100';
        alertIcon.querySelector('svg').className = 'h-6 w-6 text-red-600';
        alertButton.className = 'inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm';
    }
    
    alertTitle.textContent = title;
    alertMessage.textContent = message;
    
    openModal('alertModal');
}

function closeAlertModal() {
    closeModal('alertModal');
}

// Formatação do input de valor
document.getElementById('loanAmount').addEventListener('input', function(e) {
    const value = e.target.value;
    updateTotalAmount(value);
});