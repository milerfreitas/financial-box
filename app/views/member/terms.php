<?php
// app/views/member/terms.php
require_once "app/controllers/auth.php";
checkAuth();
?>
    <!-- Conteúdo Principal -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">Termos de Uso</h1>
                
                <div class="prose max-w-none">
                    <p class="text-gray-600 mb-6">
                        Última atualização: <?= date('d/m/Y') ?>
                    </p>

                    <div class="space-y-8">
                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">1. Aceitação dos Termos</h2>
                            <p class="text-gray-600 mb-4">
                                Ao acessar e usar o sistema da Caixinha, você concorda em cumprir e estar vinculado a estes Termos de Uso. Se você não concordar com qualquer parte destes termos, não deverá usar o sistema.
                            </p>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">2. Elegibilidade</h2>
                            <p class="text-gray-600 mb-4">Para participar da Caixinha, você deve:</p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Ser maior de 18 anos</li>
                                <li>Possuir CPF válido</li>
                                <li>Ter uma chave PIX ativa</li>
                                <li>Concordar com as regras de participação</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">3. Responsabilidades do Participante</h2>
                            <p class="text-gray-600 mb-4">Como membro da Caixinha, você se compromete a:</p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Efetuar os pagamentos mensais até o dia 10 de cada mês</li>
                                <li>Manter seus dados cadastrais atualizados</li>
                                <li>Participar ativamente das rifas organizadas</li>
                                <li>Cumprir com os prazos estabelecidos para pagamentos de empréstimos</li>
                                <li>Não compartilhar suas credenciais de acesso</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">4. Pagamentos e Reembolsos</h2>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>O valor da cota mensal é de R$ 100,00</li>
                                <li>Não há reembolso em caso de desistência</li>
                                <li>Pagamentos em atraso estão sujeitos a multa de R$ 10,00 por dia</li>
                                <li>Atrasos superiores a 30 dias podem resultar em exclusão</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">5. Empréstimos</h2>
                            <p class="text-gray-600 mb-4">Regras para empréstimos:</p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Taxa fixa de 20% de juros sobre o valor solicitado</li>
                                <li>Prazo máximo para quitação até 10/11/2025</li>
                                <li>Duas modalidades de pagamento disponíveis:
                                    <ul class="list-disc pl-6 mt-2">
                                        <li>Pagamento integral (principal + juros)</li>
                                        <li>Pagamento mensal dos juros com quitação do principal até o prazo final</li>
                                    </ul>
                                </li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">6. Penalidades</h2>
                            <p class="text-gray-600 mb-4">O descumprimento das regras pode resultar em:</p>
                            <ul class="list-disc pl-6 text-gray-600 space-y-2">
                                <li>Multas por atraso</li>
                                <li>Suspensão do direito a empréstimos</li>
                                <li>Exclusão da caixinha e perda do valor investido</li>
                                <li>Restrição do resgate apenas ao valor pago das cotas</li>
                            </ul>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">7. Confidencialidade</h2>
                            <p class="text-gray-600 mb-4">
                                Todas as informações financeiras e pessoais compartilhadas no sistema são confidenciais. 
                                Os participantes concordam em não divulgar informações sensíveis de outros membros.
                            </p>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">8. Alterações nos Termos</h2>
                            <p class="text-gray-600 mb-4">
                                Reservamo-nos o direito de modificar estes termos a qualquer momento. 
                                Alterações significativas serão comunicadas através do sistema e/ou grupo do WhatsApp.
                            </p>
                        </section>

                        <section>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">9. Contato</h2>
                            <p class="text-gray-600">
                                Para dúvidas sobre estes termos, entre em contato através do email: 
                                <a href="mailto:suporte@caixinha.com.br" class="text-blue-600 hover:text-blue-800">
                                    suporte@caixinha.com.br
                                </a>
                            </p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
