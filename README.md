# Caixinha - Sistema de Gestão Financeira entre Amigos

Sistema para gerenciar um grupo financeiro informal, permitindo controle de cotas, empréstimos, pagamentos e rifas.

## Funcionalidades

- Gestão de membros e cotas
- Sistema de empréstimos com juros
- Controle de pagamentos mensais
- Organização de rifas
- Painel administrativo
- Notificações via Telegram

## Tecnologias

- PHP 8.0+
- MySQL
- Tailwind CSS
- JavaScript

## Requisitos

- PHP >= 8.0
- MySQL >= 5.7
- Composer
- Node.js e NPM

## Instalação

```bash
git clone https://github.com/milerfreitas/financial-box.git
cd financial-box
composer install
npm install
```

Configure o banco de dados em `app/config/database.php`:

```php
return [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'caixinha'
];
```

Execute as migrações:

```bash
php migrate.php
```

## Estrutura

```
app/
├── config/         # Configurações
├── controllers/    # Controllers MVC
├── helpers/        # Funções auxiliares
├── models/         # Models de dados
├── views/          # Templates
│   ├── admin/
│   ├── auth/
│   └── member/
└── public/         # Assets públicos
```

## Segurança

- Autenticação por sessão
- Proteção contra CSRF
- Senhas hasheadas
- Sanitização de inputs
- Headers de segurança

## Licença

MIT

## Contato

MilerFreitas - @milerfreitas
