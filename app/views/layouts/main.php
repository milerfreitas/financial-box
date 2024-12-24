<?php
// app/views/layouts/main.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> - Caixinha</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <?= view('components/header', ['member_name' => $_SESSION['member_name'] ?? '']) ?>
    
    <?php if (!empty($breadcrumbs)): ?>
        <?= view('components/breadcrumbs', ['items' => $breadcrumbs]) ?>
    <?php endif; ?>
    
    <main class="max-w-7xl mx-auto px-4 py-6">
        <?= $content ?>
    </main>
    
    <?= view('components/footer') ?>

    <script src="public/components/js/modal.js"></script>
    <script src="public/components/js/alert.js"></script>
    <?php if (isset($scripts)): ?>
        <?= $scripts ?>
    <?php endif; ?>
</body>
</html>