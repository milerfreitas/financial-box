<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços Profissionais</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #1e1e1e 0%, #2d2d2d 100%);
        }
        .card-hover {
            transition: transform 0.3s ease-in-out;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg backdrop-blur-lg bg-opacity-90 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <span class="text-3xl font-extrabold text-gray-800">next<span class="text-rose-500">.</span>level</span>
                </div>
                <div class="flex items-center space-x-8">
                    <a href="#home" class="text-gray-600 hover:text-gray-900 transition duration-300">Início</a>
                    <a href="#services" class="text-gray-600 hover:text-gray-900 transition duration-300">Serviços</a>
                    <a href="#about" class="text-gray-600 hover:text-gray-900 transition duration-300">Sobre</a>
                    <a href="#contact" class="bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition duration-300">Contato</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="home" class="hero-gradient pt-32 pb-20">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold text-white mb-6 leading-tight">
                        Transforme seu negócio com soluções 
                        <span class="text-rose-500">inovadoras</span>
                    </h1>
                    <p class="text-xl text-gray-300 mb-8">
                        Desenvolvemos estratégias personalizadas para impulsionar seu crescimento e maximizar resultados
                    </p>
                    <div class="space-x-4">
                        <a href="#contact" class="bg-white text-gray-900 px-8 py-4 rounded-full font-medium hover:shadow-xl transition duration-300 inline-flex items-center">
                            Comece agora
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#services" class="text-white border-2 border-white px-8 py-4 rounded-full font-medium hover:bg-white hover:text-gray-900 transition duration-300">
                            Saiba mais
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="/api/placeholder/600/400" alt="Hero Image" class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Nossos Serviços</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Soluções completas e personalizadas para cada etapa do seu negócio
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover border border-gray-100">
                    <div class="text-rose-500 text-4xl mb-6">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Consultoria Estratégica</h3>
                    <p class="text-gray-600 mb-6">Análise profunda e desenvolvimento de estratégias direcionadas para maximizar seu potencial.</p>
                    <a href="#contact" class="text-gray-900 font-medium inline-flex items-center hover:text-rose-500 transition-colors">
                        Saiba mais
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover border border-gray-100">
                    <div class="text-rose-500 text-4xl mb-6">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Transformação Digital</h3>
                    <p class="text-gray-600 mb-6">Modernização de processos e implementação de soluções tecnológicas inovadoras.</p>
                    <a href="#contact" class="text-gray-900 font-medium inline-flex items-center hover:text-rose-500 transition-colors">
                        Saiba mais
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg card-hover border border-gray-100">
                    <div class="text-rose-500 text-4xl mb-6">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Inovação Corporativa</h3>
                    <p class="text-gray-600 mb-6">Desenvolvimento de soluções criativas e implementação de culturas inovadoras.</p>
                    <a href="#contact" class="text-gray-900 font-medium inline-flex items-center hover:text-rose-500 transition-colors">
                        Saiba mais
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-black py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-rose-500 mb-2">500+</div>
                    <div class="text-gray-300">Projetos Entregues</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-rose-500 mb-2">98%</div>
                    <div class="text-gray-300">Clientes Satisfeitos</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-rose-500 mb-2">15+</div>
                    <div class="text-gray-300">Anos de Experiência</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-rose-500 mb-2">50+</div>
                    <div class="text-gray-300">Especialistas</div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-8">Por que nos escolher?</h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-rose-500 text-2xl mt-1">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Experiência Comprovada</h3>
                                <p class="text-gray-600">15 anos transformando negócios com soluções inovadoras.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-rose-500 text-2xl mt-1">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Equipe Especializada</h3>
                                <p class="text-gray-600">Profissionais altamente qualificados e dedicados.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-rose-500 text-2xl mt-1">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Resultados Reais</h3>
                                <p class="text-gray-600">Foco em entregar valor mensurável para seu negócio.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="/api/placeholder/600/400" alt="About Image" class="rounded-2xl shadow-xl">
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Vamos conversar?</h2>
                <p class="text-xl text-gray-600">
                    Estamos prontos para ajudar seu negócio a alcançar o próximo nível
                </p>
            </div>
            <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-xl p-8">
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome completo</label>
                        <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email profissional</label>
                        <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mensagem</label>
                        <textarea rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition duration-200"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-black text-white py-4 rounded-lg hover:bg-gray-800 transition duration-300">
                        Enviar Mensagem
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="space-y-4">
                    <span class="text-2xl font-bold">next<span class="text-rose-500">.</span>level</span>
                    <p class="text-gray-400">Transformando o futuro dos negócios</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Empresa</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">Sobre nós</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">Serviços</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">Cases</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">Carreiras</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Suporte</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">Contato</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">Política de Privacidade</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-rose-500 transition duration-300">Termos de Serviço</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Contato</h3>
                    <ul class="space-y-3">
                        <li class="text-gray-400">
                            <span class="block">São Paulo, SP</span>
                            <span class="block">Brasil</span>
                        </li>
                        <li class="text-gray-400">contato@nextlevel.com</li>
                        <li class="text-gray-400">+55 (11) 99999-9999</li>
                    </ul>
                </div>
            </div>
            <div class="pt-12 mt-12 border-t border-gray-800">
                <p class="text-center text-gray-400">&copy; 2024 next.level. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>