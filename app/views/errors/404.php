<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>404 - Página não encontrada</h1>
        <p class="hero-subtitle">git status: nothing to commit, working tree clean</p>
    </div>
</section>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <!-- Terminal-style error -->
            <div style="background: #0f0f0f; border-radius: 0.5rem; padding: 2rem; margin-bottom: 3rem;">
                <div class="log-entry" style="margin: 0; border: none;">
                    <div class="log-date">[<?= date('d/m/Y H:i:s') ?>]</div>
                    <div class="log-title"><span style="color: #ff5f56;">[ERROR]</span> 404 - Resource not found</div>
                    <div class="log-content">The requested URL was not found on this server.</div>
                    <div class="log-content">	at CommitCrimes.Router.handleRequest(Router.php:78)</div>
                    <div class="log-content">	at CommitCrimes.Application.run(index.php:45)</div>
                    <div class="log-content" style="margin-top: 1rem;">
                        <span style="color: #ffbd2e;">Suggested actions:</span>
                        <br>• Check if the URL is correct
                        <br>• Go back to the homepage
                        <br>• Blame the intern (as usual)
                    </div>
                </div>
            </div>

            <!-- Mensagem cômica -->
            <div style="margin-bottom: 3rem;">
                <h2 style="margin-bottom: 1rem; color: var(--primary-color);">Oops! Commitou na branch errada?</h2>
                <p style="color: #6c757d; margin-bottom: 2rem;">
                    Parece que você tentou acessar uma página que não existe. Isso pode ter acontecido por alguns motivos:
                </p>
                
                <div class="cards-grid" style="margin-top: 2rem;">
                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">🔗</div>
                        <h3 class="card-title">Link Quebrado</h3>
                        <p class="card-description">Alguém commitou um link que não funciona. Clássico!</p>
                    </div>

                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">⌨️</div>
                        <h3 class="card-title">Typo na URL</h3>
                        <p class="card-description">Acontece com os melhores. Até com quem programa em Vim.</p>
                    </div>

                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">🚧</div>
                        <h3 class="card-title">Página em Construção</h3>
                        <p class="card-description">Ou dropamos a tabela. Fifty-fifty.</p>
                    </div>
                </div>
            </div>

            <!-- Navegação -->
            <div style="text-align: center;">
                <h3 style="margin-bottom: 2rem;">Onde você gostaria de ir?</h3>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?= View::url() ?>" class="btn btn-primary">🏠 Página Inicial</a>
                    <a href="<?= View::url('sobre') ?>" class="btn btn-outline">👥 Sobre Nós</a>
                    <a href="<?= View::url('servicos') ?>" class="btn btn-outline">🛠️ Serviços</a>
                    <a href="<?= View::url('novidades') ?>" class="btn btn-outline">📝 Novidades</a>
                </div>
            </div>

            <!-- Easter egg -->
            <div style="margin-top: 4rem; padding: 2rem; background: #f8f9fa; border-radius: 1rem;">
                <div style="font-size: 0.9rem; color: #6c757d; font-family: var(--font-mono);">
                    <strong>Pro tip:</strong> Use Ctrl+Shift+I para inspecionar o código desta página.<br>
                    Você pode encontrar alguns comentários "interessantes" do nosso time de desenvolvimento.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comentários hidden para quem inspecionar -->
<!-- TODO: Implementar página 404 mais criativa -->
<!-- NOTA: Pedro, para de deixar console.log em produção -->
<!-- FIXME: Essa página foi feita às pressas, refatorar depois -->
<!-- WARNING: Se você está lendo isso, parabéns! Você é mais curioso que 90% dos usuários --> 