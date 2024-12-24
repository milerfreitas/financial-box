<?php
// app/views/components/breadcrumbs.php
?>
<div class="max-w-7xl mx-auto px-4 mt-6">
    <nav class="text-sm" aria-label="Breadcrumb">
        <ol class="inline-flex items-center">
            <?php foreach ($items as $index => $item): ?>
                <li class="inline-flex items-center">
                    <?php if ($index > 0): ?>
                        <span class="mx-2 text-gray-400">/</span>
                    <?php endif; ?>
                    
                    <?php if ($item['active']): ?>
                        <span class="text-gray-500">
                            <?= htmlspecialchars($item['name']) ?>
                        </span>
                    <?php else: ?>
                        <a href="<?= htmlspecialchars($item['url']) ?>" 
                           class="text-gray-600 hover:text-gray-900">
                            <?= htmlspecialchars($item['name']) ?>
                        </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
</div>