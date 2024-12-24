<?php
// app/views/member/rules.php
require_once "app/controllers/auth.php";
checkAuth();
?>

    <!-- Conteúdo Principal -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    Regras da Caixinha
                </h3>
                <p class="text-gray-700 text-sm">
                    O texto abaixo rege o funcionamento da Caixinha entre amigos.
                </p>
            </div>
            
            <div class="px-6 py-5 space-y-6">
                <div class="max-w-4xl mx-auto p-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Índice</h2>
                    <ol class="list-decimal list-inside space-y-2">
                        <li><a href="#valor-da-cota" class="text-blue-600 hover:underline">Valor da Cota</a></li>
                        <li><a href="#resgate" class="text-blue-600 hover:underline">Resgate</a></li>
                        <li><a href="#rifas" class="text-blue-600 hover:underline">Rifas</a></li>
                        <li><a href="#emprestimos" class="text-blue-600 hover:underline">Empréstimos</a></li>
                        <li><a href="#penalidades" class="text-blue-600 hover:underline">Penalidades</a></li>
                        <li><a href="#gestao-e-transparencia" class="text-blue-600 hover:underline">Gestão e Transparência</a></li>
                        <li><a href="#grupo-whatsapp" class="text-blue-600 hover:underline">Grupo no WhatsApp</a></li>
                    </ol>

                    <section id="valor-da-cota" class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">1. Valor da Cota</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>Cada participante (cotista) deverá contribuir mensalmente com R$ 100,00.</li>
                            <li>O pagamento deverá ser realizado até o dia 10 de cada mês.</li>
                            <li>Em caso de desistência, não haverá devolução de qualquer quantia.</li>
                            <li>
                                A entrada de novos membros será permitida ao longo do ano, porém, para ingressar, o interessado deverá quitar, à vista, todas as cotas mensais correspondentes aos meses desde o início da caixinha, garantindo assim sua igualdade no grupo.
                            </li>
                        </ul>
                        <p class="mt-4"><a href="#topo" class="text-blue-600 hover:underline">Voltar ao topo</a></p>
                    </section>

                    <section id="resgate" class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">2. Resgate</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>O valor acumulado será resgatado em Dezembro/2025, conforme saldo disponível.</li>
                        </ul>
                        <p class="mt-4"><a href="#topo" class="text-blue-600 hover:underline">Voltar ao topo</a></p>
                    </section>

                    <section id="rifas" class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">3. Rifas</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>Cada cotista deverá participar ativamente da venda de rifas organizadas pela caixinha.</li>
                            <li>A meta de vendas será estipulada previamente, e a contribuição nas rifas é obrigatória para manter a participação no grupo.</li>
                        </ul>
                        <p class="mt-4"><a href="#topo" class="text-blue-600 hover:underline">Voltar ao topo</a></p>
                    </section>

                    <section id="emprestimos" class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">4. Empréstimos</h2>
                        <h3 class="text-lg font-medium text-gray-700 mt-4 mb-2">4.1 Condições Gerais</h3>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>Os empréstimos estarão disponíveis a partir de Fevereiro.</li>
                            <li>Todo empréstimo terá uma taxa fixa de 20% de juros sobre o valor solicitado para cotistas e 30% para não cotistas.</li>
                            <li>O prazo máximo para quitação total é 10/11/2025.</li>
                            <li>O limite concedido de empréstimo estará condicionado ao valor total depositado pelo cotista.</li>
                            <li>A solicitação deverá ser feita com, no mínimo, 1 dia de antecedência.</li>
                        </ul>

                        <h3 class="text-lg font-medium text-gray-700 mt-4 mb-2">4.2 Formas de Pagamento</h3>
                        <h4 class="text-md font-semibold text-gray-600 mt-4 mb-2">4.2.1 Pagamento Integral</h4>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>O valor total (principal + juros) pode ser quitado a qualquer momento até 10/11/2025.</li>
                            <li>Exemplo:
                                <ul class="list-disc list-inside ml-6 space-y-1 text-gray-600">
                                    <li>Empréstimo: R$ 100,00</li>
                                    <li>Valor total a pagar: R$ 120,00 para cotistas (R$ 100,00 + R$ 20,00 de juros) ou R$ 130,00 para não cotistas (R$ 100,00 + R$ 30,00 de juros)</li>
                                </ul>
                            </li>
                        </ul>

                        <h4 class="text-md font-semibold text-gray-600 mt-4 mb-2">4.2.2 Pagamento Mensal de Juros</h4>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>O cotista pode optar por pagar mensalmente apenas os juros (20% do valor emprestado para cotistas ou 30% para não cotistas).</li>
                            <li>O valor principal deve ser quitado até 10/11/2025.</li>
                            <li>Exemplo para cotistas:
                                <ul class="list-disc list-inside ml-6 space-y-1 text-gray-600">
                                    <li>Empréstimo: R$ 100,00</li>
                                    <li>Pagamento mensal: R$ 20,00 (juros)</li>
                                    <li>Principal a ser quitado até 10/11/2025: R$ 100,00</li>
                                </ul>
                            </li>
                            <li>Exemplo para não cotistas:
                                <ul class="list-disc list-inside ml-6 space-y-1 text-gray-600">
                                    <li>Empréstimo: R$ 100,00</li>
                                    <li>Pagamento mensal: R$ 30,00 (juros)</li>
                                    <li>Principal a ser quitado até data acordada: R$ 100,00</li>
                                </ul>
                            </li>
                        </ul>
                        <p class="mt-4"><a href="#topo" class="text-blue-600 hover:underline">Voltar ao topo</a></p>
                    </section>

                    <section id="penalidades" class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">5. Penalidades</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>Atrasos no pagamento da cota mensal terão multa de R$ 10,00. Após 30 dias de atraso, o cotista poderá ser excluído.</li>
                            <li>O não cumprimento das obrigações nas rifas poderá acarretar penalidades, como a restrição do resgate apenas ao valor pago referente às cotas, sem participação na divisão dos juros acumulados.</li>
                        </ul>
                        <p class="mt-4"><a href="#topo" class="text-blue-600 hover:underline">Voltar ao topo</a></p>
                    </section>

                    <section id="gestao-e-transparencia" class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">6. Gestão e Transparência</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>A administração da caixinha será responsável por prestar contas mensalmente sobre as finanças.</li>
                            <li>Dúvidas e ajustes serão discutidos em reuniões periódicas, com a participação de todos os cotistas.</li>
                        </ul>
                        <p class="mt-4"><a href="#topo" class="text-blue-600 hover:underline">Voltar ao topo</a></p>
                    </section>

                    <section id="grupo-whatsapp" class="mt-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">7. Grupo no WhatsApp</h2>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            <li>Para confirmar a participação e concordância com as regras da caixinha, é obrigatório entrar no grupo oficial de WhatsApp.</li>
                            <li>O grupo será o principal meio de comunicação para atualizações, esclarecimentos e discussões importantes.</li>
                            <li><a href="https://chat.whatsapp.com/BYrD4JB8hpfAoZnanpGbYs" target="_blank">https://chat.whatsapp.com/BYrD4JB8hpfAoZnanpGbYs</a></li>
                        </ul>
                        <p class="mt-4"><a href="#topo" class="text-blue-600 hover:underline">Voltar ao topo</a></p>
                    </section>
                </div>
            </div>
        </div>
    </div>
