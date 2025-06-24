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
                <a href="<?= View::url('sobre') ?>" class="btn btn-primary">Conheça nossa história</a>
            </div>
            <div class="about-image">
                <img src="<?= View::asset('img/stressed-dev.jpg') ?>" alt="Desenvolvedor estressado com bugs no código" class="hero-image">
            </div>
        </div>

        <!-- Serviços em Destaque -->
        <div style="text-align: center; margin: 4rem 0 2rem 0;">
            <h2 class="section-title">Nossos Serviços</h2>
            <p class="section-subtitle">Alguns dos nossos "sucessos" mais recentes</p>
        </div>

        <?php if (isset($error)): ?>
            <div style="text-align: center; padding: 3rem; color: #6c757d;">
                <p><?= View::e($error) ?></p>
            </div>
        <?php elseif (!empty($servicos)): ?>
            <div class="cards-grid">
                <?php foreach ($servicos as $servico): ?>
                    <div class="card">
                        <h3 class="card-title"><?= View::e($servico['titulo']) ?></h3>
                        <p class="card-description"><?= View::e($servico['descricao']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div style="text-align: center; margin-top: 3rem;">
                <a href="<?= View::url('servicos') ?>" class="btn btn-outline">Ver todos os serviços</a>
            </div>
        <?php else: ?>
            <div style="text-align: center; padding: 3rem; color: #6c757d;">
                <p>Nenhum serviço encontrado no momento.</p>
                <p><em>Provavelmente estamos quebrando alguma coisa...</em> 😅</p>
            </div>
        <?php endif; ?>

        <!-- Últimas Novidades -->
        <div style="text-align: center; margin: 4rem 0 2rem 0;">
            <h2 class="section-title">Últimos Logs</h2>
            <p class="section-subtitle">O que andamos "fazendo" por aqui</p>
        </div>

        <?php if (!empty($novidades)): ?>
            <div style="max-width: 800px; margin: 0 auto;">
                <?php foreach ($novidades as $log): ?>
                    <div class="log-entry">
                        <div class="log-date">[<?= date('d/m/Y', strtotime($log['data_publicacao'])) ?>]</div>
                        <div class="log-title"><?= View::e($log['titulo']) ?></div>
                        <div class="log-content"><?= View::e($log['conteudo']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div style="text-align: center; margin-top: 2rem;">
                <a href="<?= View::url('novidades') ?>" class="btn btn-outline">Ver todos os logs</a>
            </div>
        <?php else: ?>
            <div style="text-align: center; padding: 3rem;">
                <div class="log-entry">
                    <div class="log-date">[<?= date('d/m/Y') ?>]</div>
                    <div class="log-title">Sistema de logs temporariamente offline</div>
                    <div class="log-content">Estamos investigando por que o sistema de novidades não está funcionando. Suspeita-se de commit sem teste.</div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section> 