<?php
// Incluir a configuração de conexão com o banco de dados
include('../backend/conexao.php');  // Ajuste o caminho conforme necessário

// Definir mês atual e mês anterior
$dataAtual = date('Y-m');
$dataAnterior = date('Y-m', strtotime('-1 month'));

// === USUÁRIOS ===
// Total de usuários
$usuariosCount = $pdo->query("SELECT COUNT(*) FROM usuarios")->fetchColumn();
// Usuários criados no mês atual
$usuariosAtual = $pdo->query("SELECT COUNT(*) FROM usuarios WHERE DATE_FORMAT(criado_em, '%Y-%m') = '$dataAtual'")->fetchColumn();
// Usuários criados no mês anterior
$usuariosAnterior = $pdo->query("SELECT COUNT(*) FROM usuarios WHERE DATE_FORMAT(criado_em, '%Y-%m') = '$dataAnterior'")->fetchColumn();
// Crescimento percentual usuários
$usuariosCrescimento = ($usuariosAnterior > 0) ? round((($usuariosAtual - $usuariosAnterior) / $usuariosAnterior) * 100, 2) : 0;

// === PEDIDOS ===
// Total de pedidos
$pedidosCount = $pdo->query("SELECT COUNT(*) FROM pedidos")->fetchColumn();
// Pedidos feitos no mês atual
$pedidosAtual = $pdo->query("SELECT COUNT(*) FROM pedidos WHERE DATE_FORMAT(data_pedido, '%Y-%m') = '$dataAtual'")->fetchColumn();
// Pedidos feitos no mês anterior
$pedidosAnterior = $pdo->query("SELECT COUNT(*) FROM pedidos WHERE DATE_FORMAT(data_pedido, '%Y-%m') = '$dataAnterior'")->fetchColumn();
// Crescimento percentual pedidos
$pedidosCrescimento = ($pedidosAnterior > 0) ? round((($pedidosAtual - $pedidosAnterior) / $pedidosAnterior) * 100, 2) : 0;

// === RECEITA E LUCRO ===
// Como a tabela pedidos não tem coluna 'valor_total', vamos deixar receita e lucro como zero
$receitaTotal = 0;
$lucroTotal = 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Protegido</title>
    <link rel="icon" type="image/png" href="../assets/img/logos/Logo Aqua Limpa.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3><i class="fas fa-chart-line"></i> Dashboard</h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="../index.html" class="back-button"><i class="fas fa-home"></i> Visão Geral</a></li>
                <li><a href="../backend/usuariosdb.php"><i class="fas fa-users"></i> Usuários</a></li>
                <li><a href="../pages/dashboard_pedidos.html"><i class="fas fa-shopping-cart"></i> Pedidos</a></li>
                <li><a href="../pages/produtos.html"><i class="fas fa-box"></i> Produtos</a></li>
                <li><a href="#"><i class="fas fa-chart-pie"></i> Relatórios</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Configurações</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main">
        <nav class="navbar">
            <div class="navbar-left">
                <button class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></button>
                <h1>Visão Geral</h1>
            </div>
            <div class="navbar-right">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Buscar...">
                </div>
                <div class="notification-bell">
                    <i class="fas fa-bell"></i>
                    <span class="notification-count">3</span>
                </div>
                <div class="user-profile">
                    <div class="user-avatar">
                        <img src="../assets/img/pessoas/Caio Müller.jpg" alt="Foto de perfil do administrador">
                    </div>
                    <div class="user-info">
                        <h5>Admin</h5>
                        <p>Administrador</p>
                    </div>
                </div>
            </div>
        </nav>

        <div class="content">
            <!-- Cards -->
            <div class="card-container">
                <!-- Card de Usuários -->
                <div class="card user-count">
                    <div class="card-header">
                        <h3>Usuários</h3>
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-body">
                        <h2><?php echo $usuariosCount; ?></h2>
                    </div>
                    <div class="card-footer <?php echo ($usuariosCrescimento >= 0) ? 'success' : 'danger'; ?>">
                        <i class="fas fa-arrow-<?php echo ($usuariosCrescimento >= 0) ? 'up' : 'down'; ?>"></i>
                        <span><?php echo abs($usuariosCrescimento); ?>% vs mês passado</span>
                    </div>
                </div>

                <!-- Card de Pedidos -->
                <div class="card order-count">
                    <div class="card-header">
                        <h3>Pedidos</h3>
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="card-body">
                        <h2><?php echo $pedidosCount; ?></h2>
                    </div>
                    <div class="card-footer <?php echo ($pedidosCrescimento >= 0) ? 'success' : 'danger'; ?>">
                        <i class="fas fa-arrow-<?php echo ($pedidosCrescimento >= 0) ? 'up' : 'down'; ?>"></i>
                        <span><?php echo abs($pedidosCrescimento); ?>% vs mês passado</span>
                    </div>
                </div>

                <!-- Card de Receita -->
                <div class="card revenue">
                    <div class="card-header">
                        <h3>Receita</h3>
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-body">
                        <h2>R$<?php echo number_format($receitaTotal, 2, ',', '.'); ?></h2>
                    </div>
                    <div class="card-footer success">
                        <i class="fas fa-arrow-up"></i>
                        <span>0% vs mês passado</span> <!-- Placeholder -->
                    </div>
                </div>

                <!-- Card de Lucro -->
                <div class="card profit">
                    <div class="card-header">
                        <h3>Lucro</h3>
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="card-body">
                        <h2>R$<?php echo number_format($lucroTotal, 2, ',', '.'); ?></h2>
                    </div>
                    <div class="card-footer success">
                        <i class="fas fa-arrow-up"></i>
                        <span>0% vs mês passado</span> <!-- Placeholder -->
                    </div>
                </div>
            </div>

            <div class="footer">
                <p>&copy; 2025 Dashboard Administrativo. Todos os direitos reservados.</p>
            </div>
        </div>
    </div>

    <script src="../js/dashboard.js"></script>

</body>
</html>
