<?php
function listarArquivosEDiretoriosHTML($diretorio) {
    $html = '<ul>'; // Começar a lista HTML

    $itens = scandir($diretorio); // Listar arquivos e diretórios

    foreach ($itens as $item) {
        // Ignorar os diretórios "." e ".."
        if ($item === '.' || $item === '..') {
            continue;
        }

        $caminhoCompleto = $diretorio . DIRECTORY_SEPARATOR . $item;

        if (is_dir($caminhoCompleto)) {
            // Adicionar o diretório e seu conteúdo recursivamente
            $html .= '<li><strong>' . htmlspecialchars($item) . '</strong>';
            $html .= listarArquivosEDiretoriosHTML($caminhoCompleto);
            $html .= '</li>';
        } else {
            // Adicionar o arquivo na lista
            $html .= '<li>' . htmlspecialchars($item) . '</li>';
        }
    }

    $html .= '</ul>'; // Fechar a lista HTML
    return $html;
}

$rootDir = __DIR__; // Diretório raiz (mude conforme necessário)
print listarArquivosEDiretoriosHTML($rootDir);
die();

require_once 'app/helpers/config.php';
require_once 'app/helpers/security.php';
require_once 'app/helpers/session.php';

date_default_timezone_set('America/Sao_Paulo');
ini_set('error_log', __DIR__ . '/error.log');
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

secureSessionStart();

// Headers de segurança
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
}

require_once 'app/helpers/view.php';
require_once 'app/helpers/navigation.php';
require_once 'app/config/routes.php';

router();
