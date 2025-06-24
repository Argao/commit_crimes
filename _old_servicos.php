<?php
$current_page = 'servicos';
$title = 'Serviços';
$description = 'Confira nossos serviços especializados em soluções rápidas, duvidosas e muitas vezes funcionais. De refatoração paranormal a deploy na sexta.';

ob_start();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Nossos Serviços</h1>
        <p class="hero-subtitle">Soluções tecnológicas que funcionam* (*termos e condições se aplicam)</p>
    </div>
</section>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2 class="section-title">O que oferecemos</h2>
            <p class="section-subtitle">Cada serviço foi cuidadosamente desenvolvido com base em anos de experiência em quebrar e consertar sistemas.</p>
        </div>

        <?php
        // Carregar todos os serviços do banco de dados
        try {
            require_once 'app/models/Servico.php';
            $servicoModel = new Servico();
            $servicos = $servicoModel->getAll();
            
            if (!empty($servicos)): ?>
                <div class="cards-grid">
                    <?php foreach ($servicos as $index => $servico): ?>
                        <div class="card" style="animation-delay: <?= ($index * 0.1) ?>s;">
                            <h3 class="card-title"><?= htmlspecialchars($servico['titulo']) ?></h3>
                            <p class="card-description"><?= htmlspecialchars($servico['descricao']) ?></p>
                            

                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Informações adicionais -->
                <div style="margin-top: 4rem;">
                    <div class="cards-grid">
                        <div class="card" style="background: linear-gradient(135deg, #ff4444, #e74c3c); color: white;">
                            <h3 style="color: white; margin-bottom: 1rem;">⚠️ Disclaimer</h3>
                            <p style="color: rgba(255,255,255,0.9);">Todos os serviços incluem rollback gratuito nas primeiras 24h. Após esse período, cobramos taxa de emergência.</p>
                        </div>
                        
                        <div class="card" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: white;">
                            <h3 style="color: white; margin-bottom: 1rem;">🕒 Horário de Atendimento</h3>
                            <p style="color: rgba(255,255,255,0.9);">Segunda a sexta: 9h-18h<br>Sábados: emergências apenas<br>Domingos: se der muito ruim</p>
                        </div>
                        
                        <div class="card" style="background: linear-gradient(135deg, #27ae60, #2ecc71); color: white;">
                            <h3 style="color: white; margin-bottom: 1rem;">📞 Suporte</h3>
                            <p style="color: rgba(255,255,255,0.9);">Suporte 24/7 para clientes premium. Para os outros, tentamos responder até terça-feira.</p>
                        </div>
                    </div>
                </div>
                
            <?php else: ?>
                <!-- Estado vazio com humor -->
                <div style="text-align: center; padding: 4rem; background: #f8f9fa; border-radius: 1rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">🚧</div>
                    <h3 style="margin-bottom: 1rem;">Serviços temporariamente offline</h3>
                    <p style="color: #6c757d; margin-bottom: 2rem;">Estamos refatorando nossa lista de serviços. Ou seja, quebramos tudo e estamos tentando consertar.</p>
                    <div class="log-entry" style="max-width: 600px; margin: 0 auto;">
                        <div class="log-date">[<?= date('d/m/Y H:i:s') ?>]</div>
                        <div class="log-title">ERRO: Services table not found</div>
                        <div class="log-content">Alguém dropou a tabela de serviços por engano. Investigando quem foi... (suspeita-se do estagiário)</div>
                    </div>
                </div>
            <?php endif;
            
        } catch (Exception $e) {
            // Página de erro temática
            echo '<div style="text-align: center; padding: 4rem;">';
            echo '<div style="font-size: 4rem; margin-bottom: 1rem;">💥</div>';
            echo '<h3 style="margin-bottom: 1rem;">Houston, we have a problem</h3>';
            echo '<p style="color: #6c757d; margin-bottom: 2rem;">Erro ao carregar serviços. Mas hey, isso é bem temático para uma empresa como a nossa!</p>';
            
            echo '<div class="log-entry" style="max-width: 600px; margin: 0 auto;">';
            echo '<div class="log-date">[' . date('d/m/Y H:i:s') . ']</div>';
            echo '<div class="log-title">CRITICAL: Database connection failed</div>';
            echo '<div class="log-content">Exception: ' . htmlspecialchars($e->getMessage()) . '</div>';
            echo '<div class="log-content">Status: Investigating... probably a Monday issue.</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

        <!-- Call to Action -->
        <div style="text-align: center; margin: 4rem 0; padding: 3rem; background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 1rem;">
            <h2 style="margin-bottom: 1rem;">Interessado em nossos serviços?</h2>
            <p style="margin-bottom: 2rem; color: #6c757d;">Entre em contato conosco para discutir como podemos ajudar (ou complicar) seu projeto!</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="sobre" class="btn btn-primary">Conhecer a Equipe</a>
                <a href="novidades" class="btn btn-outline">Ver Últimos Trabalhos</a>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include 'app/views/layout.php';
?> 