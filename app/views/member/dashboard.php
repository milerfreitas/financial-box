<?php
// app/views/member/dashboard.php

// Funções auxiliares para o status
function getStatusClass($status) {
    switch ($status) {
        case 'paid':
            return 'bg-green-100 text-green-800';
        case 'pending':
            return 'bg-yellow-100 text-yellow-800';
        case 'late':
            return 'bg-red-100 text-red-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
}

function getStatusText($status) {
    switch ($status) {
        case 'paid':
            return 'Pago';
        case 'pending':
            return 'Pendente';
        case 'late':
            return 'Atrasado';
        default:
            return $status;
    }
}
?>
<!-- Alertas -->
<?php if ($dashboardData['quotas']['status_pagamento']['atrasado']): ?>
    <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-base text-red-700">
                    O pagamento deste mês está em atraso. Por favor, regularize sua situação o mais breve possível.
                </p>
            </div>
        </div>
    </div>
<?php elseif ($dashboardData['quotas']['status_pagamento']['proximo_vencimento']): ?>
    <div class="mb-4 bg-yellow-50 border-l-4 border-yellow-400 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-base text-yellow-700">
                    O vencimento da cota deste mês está próximo. Não se esqueça de realizar o pagamento até o dia 10.
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Cards de Resumo -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium">Total Acumulado</h3>
        <p class="text-2xl font-semibold text-gray-900">
            R$ <?= number_format($dashboardData['quotas']['total_pago'], 2, ',', '.') ?>
        </p>
        <p class="text-sm text-gray-500 mt-2">
            <?= $dashboardData['quotas']['total'] ?> cota<?= $dashboardData['quotas']['total'] > 1 ? 's' : '' ?> 
            de R$ <?= number_format($dashboardData['quotas']['valor_total'] / ($dashboardData['quotas']['total'] ?: 1), 2, ',', '.') ?>
        </p>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium">Cotas Ativas</h3>
        <p class="text-2xl font-semibold text-gray-900"><?= $dashboardData['quotas']['total'] ?></p>
        <p class="text-sm text-gray-500 mt-2">
            Total: R$ <?= number_format($dashboardData['quotas']['valor_total'], 2, ',', '.') ?>/mês
        </p>
    </div>
    
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium">Empréstimos Ativos</h3>
        <?php if ($dashboardData['loan']): ?>
            <p class="text-2xl font-semibold text-gray-900">
                R$ <?= number_format($dashboardData['loan']['valor'], 2, ',', '.') ?>
            </p>
            <p class="text-sm text-gray-500 mt-2">
                Vencimento: <?= date('d/m/Y', strtotime($dashboardData['loan']['vencimento'])) ?>
            </p>
        <?php else: ?>
            <p class="text-2xl font-semibold text-gray-900">-</p>
            <p class="text-sm text-gray-500 mt-2">Nenhum empréstimo ativo</p>
        <?php endif; ?>
    </div>
</div>

<!-- Seção de Históricos -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Histórico de Pagamentos -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Histórico de Pagamentos</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mês/Ano</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Valor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data Pgto</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($dashboardData['payments'] as $payment): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= htmlspecialchars($payment['mes_ano']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    R$ <?= number_format($payment['valor'], 2, ',', '.') ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= getStatusClass($payment['status']) ?>">
                                        <?= getStatusText($payment['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= $payment['data_pagamento'] ? date('d/m/Y', strtotime($payment['data_pagamento'])) : '-' ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Histórico de Rifas -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Histórico de Rifas</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prêmio</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nº Sorteado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ganhador</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($dashboardData['raffles'] as $raffle): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= date('d/m/Y', strtotime($raffle['data_sorteio'])) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= htmlspecialchars($raffle['premio']) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= htmlspecialchars($raffle['numero_sorteado'] ?? '-') ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?= htmlspecialchars($raffle['ganhador'] ?? '-') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Ações Rápidas -->
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-medium text-gray-900 mb-4">Ações Rápidas</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <button id="requestLoanBtn" class="flex justify-center items-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Solicitar Empréstimo
        </button>

        <a href="/member/change-password" class="flex justify-center items-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
            Alterar Senha
        </a>
    </div>
</div>

<!-- Modais -->
<?= view('components/loan-modal', ['pixKey' => $_SESSION['member_pix_key'] ?? 'Não cadastrada']) ?>
<?= view('components/alert-modal') ?>

<?php
// Inicia o buffer para os scripts
ob_start();
?>
<script src="/js/member/dashboard.js"></script>
<?php
$scripts = ob_get_clean();
?>