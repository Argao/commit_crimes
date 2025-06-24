<?php $this->setLayout('main'); ?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>System Logs</h1>
        <p class="hero-subtitle">tail -f /var/log/commit-crimes/novidades.log</p>
    </div>
</section>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2 class="section-title">Últimas Atualizações</h2>
            <p class="section-subtitle">Um histórico completo das nossas "conquistas" e "acidentes" recentes</p>
        </div>

        <?php
        // Carregar todas as novidades (logs) do banco de dados
        try {
            if (!empty($novidades)): ?>
                <!-- Terminal Header -->
                <div style="background: #0f0f0f; border-radius: 0.5rem 0.5rem 0 0; padding: 1rem; margin-bottom: 0;">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #ff5f56;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #ffbd2e;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #27ca3f;"></div>
                        <span style="color: #adb5bd; margin-left: 1rem; font-family: var(--font-mono); font-size: 0.9rem;">commit-crimes@production:~/logs$</span>
                    </div>
                </div>

                <!-- Log Entries Container -->
                <div style="background: #0f0f0f; border-radius: 0 0 0.5rem 0.5rem; padding: 0; max-height: 80vh; overflow-y: auto;">
                    <?php foreach ($novidades as $index => $log): ?>
                        <div class="log-entry" style="margin: 0; border-radius: 0; border-left: none; border-bottom: 1px solid #2c3e50; animation-delay: <?= ($index * 0.1) ?>s;">
                            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                                <div class="log-date">[<?= date('d/m/Y', strtotime($log['data_publicacao'])) ?>]</div>
                                <div style="font-size: 0.8rem; color: var(--warning-color); font-family: var(--font-mono);">
                                    PID: <?= str_pad($log['id'], 4, '0', STR_PAD_LEFT) ?>
                                </div>
                            </div>
                            <div class="log-title">
                                <?php
                                // Adicionar níveis de log baseado no conteúdo
                                $titulo = htmlspecialchars($log['titulo']);
                                if (stripos($titulo, 'erro') !== false || stripos($titulo, 'bug') !== false) {
                                    echo '<span style="color: #ff5f56;">[ERROR]</span> ';
                                } elseif (stripos($titulo, 'correção') !== false || stripos($titulo, 'fix') !== false) {
                                    echo '<span style="color: #27ca3f;">[INFO]</span> ';
                                } elseif (stripos($titulo, 'deploy') !== false || stripos($titulo, 'rollback') !== false) {
                                    echo '<span style="color: #ffbd2e;">[WARN]</span> ';
                                } else {
                                    echo '<span style="color: #70a5fd;">[DEBUG]</span> ';
                                }
                                echo $titulo;
                                ?>
                            </div>
                            <div class="log-content"><?= htmlspecialchars($log['conteudo']) ?></div>
                            
                            <!-- Progress bar fake para algumas entradas -->
                            <?php if (stripos($log['titulo'], 'deploy') !== false || stripos($log['titulo'], 'rollback') !== false): ?>
                                <div style="margin-top: 0.5rem; font-size: 0.8rem;">
                                    <div style="color: #adb5bd;">Status: </div>
                                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-top: 0.2rem;">
                                        <span style="color: #27ca3f;">██████████</span>
                                        <span style="color: #6c757d;">░░░░░░░░░░</span>
                                        <span style="color: #adb5bd;">100% completed</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    
                    <!-- Terminal Footer -->
                    <div style="padding: 1rem; border-top: 1px solid #2c3e50;">
                        <div style="color: #adb5bd; font-family: var(--font-mono); font-size: 0.85rem;">
                            <div style="margin-bottom: 0.5rem;">
                                📊 <span style="color: #27ca3f;">Logs loaded:</span> <?= count($novidades) ?> entries
                            </div>
                            <div style="margin-bottom: 0.5rem;">
                                🕒 <span style="color: #ffbd2e;">Last update:</span> <?= date('d/m/Y H:i:s') ?>
                            </div>
                            <div>
                                💾 <span style="color: #70a5fd;">Log rotation:</span> enabled (keeping last 90 days)
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Comandos úteis -->
                <div style="margin-top: 2rem;">
                    <h3 style="color: var(--text-dark); margin-bottom: 1rem;">Comandos úteis para desenvolvedores:</h3>
                    <div class="cards-grid">
                        <div class="card" style="background: #0f0f0f; color: #00ff00; font-family: var(--font-mono);">
                            <div style="color: #adb5bd; margin-bottom: 0.5rem;">Filtrar por tipo:</div>
                            <code>grep -i "ERROR" novidades.log</code>
                        </div>
                        
                        <div class="card" style="background: #0f0f0f; color: #00ff00; font-family: var(--font-mono);">
                            <div style="color: #adb5bd; margin-bottom: 0.5rem;">Últimas 10 entradas:</div>
                            <code>tail -n 10 novidades.log</code>
                        </div>
                        
                        <div class="card" style="background: #0f0f0f; color: #00ff00; font-family: var(--font-mono);">
                            <div style="color: #adb5bd; margin-bottom: 0.5rem;">Monitorar em tempo real:</div>
                            <code>tail -f novidades.log</code>
                        </div>
                    </div>
                </div>
                
            <?php else: ?>
                <!-- Estado vazio - sem logs -->
                <div style="background: #0f0f0f; border-radius: 0.5rem; padding: 2rem; text-align: center;">
                    <div class="log-entry" style="margin: 0; border: none;">
                        <div class="log-date">[<?= date('d/m/Y H:i:s') ?>]</div>
                        <div class="log-title">[WARN] No log entries found</div>
                        <div class="log-content">Sistema de logs parece estar vazio. Isso é suspeito... muito suspeito.</div>
                        <div class="log-content" style="margin-top: 1rem;">
                            Possíveis causas:
                            <br>• Alguém executou `rm -rf /var/log/*` por engano
                            <br>• O sistema está funcionando perfeitamente (improvável)
                            <br>• Estamos em uma realidade alternativa
                        </div>
                    </div>
                </div>
            <?php endif;
            
        } catch (Exception $e) {
            // Erro temático no estilo terminal
            echo '<div style="background: #0f0f0f; border-radius: 0.5rem; padding: 2rem;">';
            echo '<div class="log-entry" style="margin: 0; border: none;">';
            echo '<div class="log-date">[' . date('d/m/Y H:i:s') . ']</div>';
            echo '<div class="log-title"><span style="color: #ff5f56;">[CRITICAL]</span> Database connection failed</div>';
            echo '<div class="log-content">Exception in thread "main" ' . htmlspecialchars($e->getMessage()) . '</div>';
            echo '<div class="log-content">	at com.commitcrimes.database.LogRepository.findAll(LogRepository.java:42)</div>';
            echo '<div class="log-content">	at com.commitcrimes.service.LogService.getAllLogs(LogService.java:28)</div>';
            echo '<div class="log-content">	at com.commitcrimes.controller.NovidadesController.index(NovidadesController.java:15)</div>';
            echo '<div class="log-content" style="margin-top: 1rem; color: var(--warning-color);">Stack trace truncated. Full log available in /var/log/commit-crimes/errors.log</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

        <!-- Call to Action -->
        <div style="text-align: center; margin: 4rem 0; padding: 3rem; background: linear-gradient(135deg, #2c3e50, #34495e); border-radius: 1rem; color: white;">
            <h2 style="margin-bottom: 1rem; color: white;">Quer receber nossos logs por email?</h2>
            <p style="margin-bottom: 2rem; color: rgba(255,255,255,0.8);">Assine nossa newsletter e seja notificado sempre que quebrarmos... digo, atualizarmos alguma coisa!</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="sobre" class="btn btn-primary">Conhecer a Equipe</a>
                <a href="servicos" class="btn" style="background: transparent; border: 2px solid white; color: white;">Nossos Serviços</a>
            </div>
        </div>
    </div>
</section> 