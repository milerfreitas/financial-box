<?php
// app/views/member/privacy-policy.php
require_once "app/controllers/auth.php";
checkAuth();
?>
    <!-- Conteúdo Principal -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Política de Privacidade</h1>
                
                <div class="prose max-w-none">
                    <p class="text-gray-600 mb-6">
                        Última atualização: <?= date('d/m/Y') ?>
                    </p>

                    <div class="space-y-8">
                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">1. Introdução</h2>
                            <p class="text-gray-600">
                                Esta Política de Privacidade descreve como a Caixinha ("nós", "nosso" ou "conosco") coleta, usa e compartilha suas informações pessoais ao utilizar nosso sistema de gestão financeira entre amigos.
                            </p>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">2. Informações que Coletamos</h2>
                            <p class="text-gray-600 mb-4">Coletamos as seguintes informações quando você se registra e utiliza nosso sistema:</p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Nome completo</li>
                                <li>CPF</li>
                                <li>Número de telefone</li>
                                <li>Chave PIX</li>
                                <li>Informações de pagamento e transações</li>
                                <li>Histórico de empréstimos e rifas</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">3. Como Usamos suas Informações</h2>
                            <p class="text-gray-600 mb-4">Utilizamos suas informações para:</p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Processar pagamentos e transações</li>
                                <li>Gerenciar sua conta e participação na caixinha</li>
                                <li>Enviar comunicações importantes sobre sua conta</li>
                                <li>Gerenciar empréstimos e participações em rifas</li>
                                <li>Prevenir fraudes e garantir a segurança do sistema</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">4. Compartilhamento de Informações</h2>
                            <p class="text-gray-600 mb-4">
                                Suas informações são compartilhadas apenas entre os membros da caixinha, administradores e, quando necessário, para cumprir obrigações legais. Não vendemos ou compartilhamos suas informações com terceiros para fins comerciais.
                            </p>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">5. Segurança dos Dados</h2>
                            <p class="text-gray-600 mb-4">
                                Implementamos medidas de segurança técnicas e organizacionais para proteger suas informações, incluindo:
                            </p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Criptografia de dados sensíveis</li>
                                <li>Acesso restrito a informações pessoais</li>
                                <li>Monitoramento regular de segurança</li>
                                <li>Backups periódicos</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">6. Seus Direitos</h2>
                            <p class="text-gray-600 mb-4">
                                De acordo com a Lei Geral de Proteção de Dados (LGPD), você tem direito a:
                            </p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Acessar seus dados pessoais</li>
                                <li>Corrigir dados incompletos ou inexatos</li>
                                <li>Solicitar a exclusão de seus dados (observando as obrigações legais)</li>
                                <li>Ser informado sobre o uso de seus dados</li>
                                <li>Revogar o consentimento a qualquer momento</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">7. Contato</h2>
                            <p class="text-gray-600">
                                Para exercer seus direitos ou esclarecer dúvidas sobre esta política, entre em contato conosco através do email: <a href="mailto:privacidade@caixinha.com" class="text-blue-600 hover:text-blue-800">privacidade@caixinha.com</a>
                            </p>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">8. Atualizações desta Política</h2>
                            <p class="text-gray-600">
                                Podemos atualizar esta política periodicamente. A versão mais recente estará sempre disponível em nosso sistema. Recomendamos que você revise esta política regularmente.
                            </p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
