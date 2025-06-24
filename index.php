<?php
$current_page = 'index';
$title = 'Início';
$description = 'Deploy na sexta, merge sem review, e a culpa é do estagiário. Consultoria em TI especializada em soluções rápidas e duvidosas.';

ob_start();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Commit Crimes™</h1>
        <p class="hero-subtitle">Deploy na sexta, merge sem review, e a culpa é do estagiário.</p>
    </div>
</section>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Quem somos</h2>
                <p>Somos uma consultoria em tecnologia especializada em soluções rápidas, duvidosas e muitas vezes funcionais. Atuamos em diversas áreas da TI, sempre empurrando limites (e commits) como ninguém.</p>
                <p><strong>Confie em quem já fez rollback com sucesso 7 vezes seguidas.</strong></p>
                <a href="sobre" class="btn btn-primary">Conheça nossa história</a>
            </div>
            <div class="about-image">
                <img src="assets/img/stressed-dev.jpg" alt="Desenvolvedor estressado com bugs no código" class="hero-image">
            </div>
        </div>

        <!-- Serviços em Destaque -->
        <div style="text-align: center; margin: 4rem 0 2rem 0;">
            <h2 class="section-title">Nossos Serviços</h2>
            <p class="section-subtitle">Alguns dos nossos "sucessos" mais recentes</p>
        </div>

        <?php
        // Carregar serviços do banco de dados
        try {
            require_once 'app/models/Servico.php';
            $servicoModel = new Servico();
            $servicos = $servicoModel->getAll();
            
            if (!empty($servicos)): ?>
                <div class="cards-grid">
                    <?php 
                    // Mostrar apenas os primeiros 6 serviços na homepage
                    $servicosDestaque = array_slice($servicos, 0, 6);
                    foreach ($servicosDestaque as $servico): ?>
                        <div class="card">
                            <h3 class="card-title"><?= htmlspecialchars($servico['titulo']) ?></h3>
                            <p class="card-description"><?= htmlspecialchars($servico['descricao']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="servicos" class="btn btn-outline">Ver todos os serviços</a>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 3rem; color: #6c757d;">
                    <p>Nenhum serviço encontrado no momento.</p>
                    <p><em>Provavelmente estamos quebrando alguma coisa...</em> 😅</p>
                </div>
            <?php endif;
            
        } catch (Exception $e) {
            // Em caso de erro, mostrar mensagem cômica
            echo '<div style="text-align: center; padding: 3rem; color: #6c757d;">';
            echo '<p>Ops! Parece que nossa consulta ao banco deu erro...</p>';
            echo '<p><em>Ironia: consultoria de TI com bug no próprio site.</em> 🤷‍♂️</p>';
            echo '</div>';
        }
        ?>

        <!-- Últimas Novidades -->
        <div style="text-align: center; margin: 4rem 0 2rem 0;">
            <h2 class="section-title">Últimos Logs</h2>
            <p class="section-subtitle">O que andamos "fazendo" por aqui</p>
        </div>

        <?php
        // Carregar últimas novidades (logs)
        try {
            require_once 'app/models/Log.php';
            $logModel = new Log();
            $logsRecentes = $logModel->getRecent(3); // Últimas 3 novidades
            
            if (!empty($logsRecentes)): ?>
                <div style="max-width: 800px; margin: 0 auto;">
                    <?php foreach ($logsRecentes as $log): ?>
                        <div class="log-entry">
                            <div class="log-date">[<?= $logModel->formatDataPublicacao($log['data_publicacao']) ?>]</div>
                            <div class="log-title"><?= htmlspecialchars($log['titulo']) ?></div>
                            <div class="log-content"><?= htmlspecialchars($log['conteudo']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div style="text-align: center; margin-top: 2rem;">
                    <a href="novidades" class="btn btn-outline">Ver todos os logs</a>
                </div>
            <?php else: ?>
                <div style="text-align: center; padding: 3rem;">
                    <div class="log-entry">
                        <div class="log-date">[<?= date('d/m/Y') ?>]</div>
                        <div class="log-title">Sistema de logs temporariamente offline</div>
                        <div class="log-content">Estamos investigando por que o sistema de novidades não está funcionando. Suspeita-se de commit sem teste.</div>
                    </div>
                </div>
            <?php endif;
            
        } catch (Exception $e) {
            // Log de erro no estilo da empresa
            echo '<div style="max-width: 800px; margin: 0 auto;">';
            echo '<div class="log-entry">';
            echo '<div class="log-date">[' . date('d/m/Y H:i:s') . ']</div>';
            echo '<div class="log-title">ERRO: Falha ao carregar logs</div>';
            echo '<div class="log-content">Exception caught: Database connection failed. Typical Monday morning behavior.</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</section>

<?php
$content = ob_get_clean();
include 'app/views/layout.php';
?> 