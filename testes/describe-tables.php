<?php
/**
 * Script para listar todas as tabelas do banco de dados caixinha
 * e mostrar a estrutura detalhada de cada uma
 */
$config = [
    'host'     => 'localhost',
    'user'     => 'root',
    'password' => 'pqd67688',
    'database' => 'caixinha'
];

try {
    $conexao = new mysqli(
        $config['host'],
        $config['user'],
        $config['password'],
        $config['database']
    );

    if ($conexao->connect_error) {
        throw new Exception("Erro na conexão: " . $conexao->connect_error);
    }

    $conexao->set_charset("utf8");
    $sql = "SHOW TABLES FROM " . $config['database'];
    $resultado = $conexao->query($sql);

    if (!$resultado) {
        throw new Exception("Erro ao executar consulta: " . $conexao->error);
    }
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estrutura das Tabelas - <?php echo $config['database']; ?></title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f5f5f5;
                color: #333;
            }
            .container {
                max-width: 1200px;
                margin: 0 auto;
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            h2 {
                color: #2c3e50;
                margin: 20px 0;
                padding-bottom: 10px;
                border-bottom: 2px solid #eee;
            }
            h3 {
                color: #34495e;
                margin: 15px 0;
                padding: 10px;
                background-color: #f8f9fa;
                border-radius: 4px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 10px 0 30px 0;
                background-color: white;
            }
            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f4f4f4;
                font-weight: bold;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            tr:hover {
                background-color: #f5f5f5;
            }
            .error {
                color: #721c24;
                padding: 10px;
                border: 1px solid #f5c6cb;
                background-color: #f8d7da;
                border-radius: 4px;
                margin: 10px 0;
            }
            .table-info {
                background-color: #e3f2fd;
                padding: 10px;
                border-radius: 4px;
                margin-bottom: 10px;
            }
            .key-column {
                font-weight: bold;
                color: #2196F3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Estrutura das Tabelas - Banco <?php echo htmlspecialchars($config['database']); ?></h2>
            <?php
            if ($resultado->num_rows > 0) {
                $tabelas = [];
                while ($linha = $resultado->fetch_array()) {
                    $tabelas[] = $linha[0];
                }

                foreach ($tabelas as $tabela) {
                    echo "<h3>Tabela: " . htmlspecialchars($tabela) . "</h3>";
                    
                    // Obtém a estrutura da tabela
                    $estrutura = $conexao->query("DESCRIBE " . $tabela);
                    
                    if ($estrutura) {
                        echo "<table>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Campo</th>";
                        echo "<th>Tipo</th>";
                        echo "<th>Nulo</th>";
                        echo "<th>Chave</th>";
                        echo "<th>Padrão</th>";
                        echo "<th>Extra</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        
                        while ($coluna = $estrutura->fetch_assoc()) {
                            $classe = ($coluna['Key'] === 'PRI') ? ' class="key-column"' : '';
                            echo "<tr>";
                            echo "<td{$classe}>" . htmlspecialchars($coluna['Field']) . "</td>";
                            echo "<td>" . htmlspecialchars($coluna['Type']) . "</td>";
                            echo "<td>" . htmlspecialchars($coluna['Null']) . "</td>";
                            echo "<td>" . htmlspecialchars($coluna['Key']) . "</td>";
                            echo "<td>" . (is_null($coluna['Default']) ? 'NULL' : htmlspecialchars($coluna['Default'])) . "</td>";
                            echo "<td>" . htmlspecialchars($coluna['Extra']) . "</td>";
                            echo "</tr>";
                        }
                        
                        echo "</tbody>";
                        echo "</table>";
                    }
                }
            } else {
                echo "<p>Nenhuma tabela encontrada no banco de dados.</p>";
            }
            ?>
        </div>
    </body>
    </html>
    <?php

} catch (Exception $e) {
    echo "<!DOCTYPE html>";
    echo "<html lang='pt-br'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<title>Erro</title>";
    echo "<style>.error { color: #721c24; padding: 10px; margin: 10px; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 4px; }</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='error'>Erro: " . htmlspecialchars($e->getMessage()) . "</div>";
    echo "</body>";
    echo "</html>";
}

if (isset($conexao)) {
    $conexao->close();
}
?>