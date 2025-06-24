<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>500 - Erro Interno do Servidor</h1>
        <p class="hero-subtitle">git blame: Probably the intern again</p>
    </div>
</section>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto;">
            <!-- Terminal-style error -->
            <div style="background: #0f0f0f; border-radius: 0.5rem; padding: 2rem; margin-bottom: 3rem;">
                <div class="log-entry" style="margin: 0; border: none;">
                    <div class="log-date">[<?= date('d/m/Y H:i:s') ?>]</div>
                    <div class="log-title"><span style="color: #ff5f56;">[CRITICAL]</span> 500 - Internal Server Error</div>
                    <div class="log-content">Something went wrong on our end. We're investigating...</div>
                    
                    <?php if (isset($error) && !empty($error)): ?>
                        <div class="log-content" style="margin-top: 1rem; color: #ff5f56;">
                            <strong>Error details:</strong><br>
                            <?= View::e($error) ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="log-content" style="margin-top: 1rem;">
                        <span style="color: #ffbd2e;">Stack trace:</span>
                        <br>	at CommitCrimes.Core.Application.handleException(index.php:42)
                        <br>	at CommitCrimes.Router.executeCallback(Router.php:156)
                        <br>	at CommitCrimes.Controller.render(Controller.php:89)
                        <br>	at java.base/java.lang.Thread.run(Thread.java:833)
                    </div>
                    
                    <div class="log-content" style="margin-top: 1rem;">
                        <span style="color: #27ca3f;">Automatic actions taken:</span>
                        <br>• Error logged to /var/log/commit-crimes/errors.log
                        <br>• Slack notification sent to #incidents
                        <br>• Coffee machine started for the dev team
                        <br>• Sacrificial offering prepared for the server gods
                    </div>
                </div>
            </div>

            <!-- Mensagem cômica -->
            <div style="margin-bottom: 3rem;">
                <h2 style="margin-bottom: 1rem; color: var(--primary-color);">Houston, we have a problem! 🚀</h2>
                <p style="color: #6c757d; margin-bottom: 2rem;">
                    Algo deu errado no nosso servidor. Provavelmente foi uma dessas situações:
                </p>
                
                <div class="cards-grid" style="margin-top: 2rem;">
                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">☕</div>
                        <h3 class="card-title">Falta de Café</h3>
                        <p class="card-description">O servidor funciona a base de cafeína. Máquina pode ter quebrado.</p>
                    </div>

                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">🎮</div>
                        <h3 class="card-title">Dev Jogando</h3>
                        <p class="card-description">Alguém deployou durante uma partida de CS:GO. Happens.</p>
                    </div>

                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">🌙</div>
                        <h3 class="card-title">Deploy Sexta 18h</h3>
                        <p class="card-description">Contra todas as regras da natureza, alguém deployou sexta à noite.</p>
                    </div>

                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">🔌</div>
                        <h3 class="card-title">Estagiário Soltou o Cabo</h3>
                        <p class="card-description">Literalmente. Cabo de força. Do datacenter. True story.</p>
                    </div>
                </div>
            </div>

            <!-- Status do sistema -->
            <div style="background: #f8f9fa; border-radius: 1rem; padding: 2rem; margin-bottom: 3rem;">
                <h3 style="margin-bottom: 1.5rem; text-align: center;">Status do Sistema</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #27ca3f; font-size: 1.2rem;">●</span>
                        <span>Frontend: Online</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #ff5f56; font-size: 1.2rem;">●</span>
                        <span>Backend: Issues</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #ffbd2e; font-size: 1.2rem;">●</span>
                        <span>Database: Investigating</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <span style="color: #27ca3f; font-size: 1.2rem;">●</span>
                        <span>Coffee Machine: Online</span>
                    </div>
                </div>
            </div>

            <!-- Navegação -->
            <div style="text-align: center;">
                <h3 style="margin-bottom: 2rem;">Enquanto isso, que tal explorar outras páginas?</h3>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?= View::url() ?>" class="btn btn-primary">🏠 Página Inicial</a>
                    <a href="<?= View::url('sobre') ?>" class="btn btn-outline">👥 Sobre Nós</a>
                    <a href="<?= View::url('novidades') ?>" class="btn btn-outline">📝 Ver Logs</a>
                </div>
                
                <div style="margin-top: 2rem;">
                    <button onclick="window.location.reload()" class="btn btn-outline">
                        🔄 Tentar Novamente
                    </button>
                </div>
            </div>

            <!-- Incident ID -->
            <div style="margin-top: 3rem; padding: 1rem; background: #0f0f0f; border-radius: 0.5rem; color: #adb5bd; font-family: var(--font-mono); font-size: 0.85rem;">
                <div style="text-align: center;">
                    <strong>Incident ID:</strong> <?= strtoupper(substr(md5(date('Y-m-d H:i:s')), 0, 8)) ?>
                    <br>Se o problema persistir, mencione este ID no seu ticket de suporte.
                    <br>(Ou mande um WhatsApp para o João)
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Auto-refresh depois de 30 segundos -->
<script>
    setTimeout(function() {
        if (confirm('Quer tentar recarregar a página? Talvez já tenha sido consertado...')) {
            window.location.reload();
        }
    }, 30000);
</script> 