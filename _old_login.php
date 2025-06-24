<?php
$current_page = 'login';
$title = 'Login';
$description = 'Acesso restrito para administradores da Commit Crimes. Entre apenas se tiver coragem de assumir a responsabilidade.';

ob_start();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Área Restrita</h1>
        <p class="hero-subtitle">sudo su - admin</p>
    </div>
</section>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <div style="max-width: 500px; margin: 0 auto;">
            <!-- Terminal-style login -->
            <div style="background: #0f0f0f; border-radius: 0.5rem; padding: 0; box-shadow: var(--shadow-lg);">
                <!-- Terminal Header -->
                <div style="background: #2c3e50; border-radius: 0.5rem 0.5rem 0 0; padding: 1rem;">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #ff5f56;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #ffbd2e;"></div>
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: #27ca3f;"></div>
                        <span style="color: #adb5bd; margin-left: 1rem; font-family: var(--font-mono); font-size: 0.9rem;">commit-crimes@auth:~$</span>
                    </div>
                </div>

                <!-- Terminal Content -->
                <div style="padding: 2rem; font-family: var(--font-mono);">
                    <div style="color: #adb5bd; margin-bottom: 1.5rem; line-height: 1.6;">
                        <div style="color: #27ca3f;">Commit Crimes™ Authentication System v2.3.1</div>
                        <div style="color: #ffbd2e;">⚠️  WARNING: Unauthorized access is prohibited</div>
                        <div style="margin-top: 0.5rem;">Please enter your credentials to continue...</div>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="admin/auth.php" style="margin-bottom: 1rem;">
                        <div style="margin-bottom: 1rem;">
                            <div style="color: #adb5bd; margin-bottom: 0.5rem;">Username:</div>
                            <input 
                                type="text" 
                                name="usuario" 
                                required 
                                style="width: 100%; padding: 0.75rem; background: #1a1a1a; border: 1px solid #2c3e50; border-radius: 0.25rem; color: #00ff00; font-family: var(--font-mono);"
                                placeholder="admin"
                                autocomplete="username"
                            >
                        </div>

                        <div style="margin-bottom: 1.5rem;">
                            <div style="color: #adb5bd; margin-bottom: 0.5rem;">Password:</div>
                            <input 
                                type="password" 
                                name="senha" 
                                required 
                                style="width: 100%; padding: 0.75rem; background: #1a1a1a; border: 1px solid #2c3e50; border-radius: 0.25rem; color: #00ff00; font-family: var(--font-mono);"
                                placeholder="••••••••"
                                autocomplete="current-password"
                            >
                        </div>

                        <button 
                            type="submit" 
                            style="width: 100%; padding: 0.75rem; background: var(--primary-color); border: none; border-radius: 0.25rem; color: white; font-family: var(--font-mono); font-weight: 600; cursor: pointer; transition: var(--transition);"
                            onmouseover="this.style.background='var(--primary-dark)'"
                            onmouseout="this.style.background='var(--primary-color)'"
                        >
                            [ENTER] Login
                        </button>
                    </form>

                    <!-- Info adicional -->
                    <div style="color: #6c757d; font-size: 0.85rem; line-height: 1.5;">
                        <div style="margin-bottom: 0.5rem;">💡 Dica: Tente as credenciais padrão</div>
                        <div style="margin-bottom: 0.5rem;">🔒 Session timeout: 2 minutos de inatividade</div>
                        <div>📧 Esqueceu a senha? Procure o João (ele que configurou)</div>
                    </div>
                </div>

                <!-- Terminal Footer -->
                <div style="background: #1a1a1a; border-radius: 0 0 0.5rem 0.5rem; padding: 1rem; border-top: 1px solid #2c3e50;">
                    <div style="color: #6c757d; font-family: var(--font-mono); font-size: 0.8rem; text-align: center;">
                        🚫 Access attempts are logged and monitored<br>
                        Last login: Never (sistema novo, vai com Deus)
                    </div>
                </div>
            </div>

            <!-- Informações sobre o sistema administrativo -->
            <div style="margin-top: 3rem; text-align: center;">
                <h2 style="margin-bottom: 1rem;">Sistema Administrativo</h2>
                <p style="color: #6c757d; margin-bottom: 2rem;">
                    Após o login, você terá acesso ao painel de controle onde poderá gerenciar:
                </p>

                <div class="cards-grid" style="margin-top: 2rem;">
                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">👥</div>
                        <h3 class="card-title">Usuários</h3>
                        <p class="card-description">Gerenciar contas de administrador e permissões de acesso.</p>
                    </div>

                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">🛠️</div>
                        <h3 class="card-title">Serviços</h3>
                        <p class="card-description">Adicionar, editar e remover os serviços oferecidos pela empresa.</p>
                    </div>

                    <div class="card" style="text-align: center;">
                        <div style="font-size: 2rem; margin-bottom: 1rem;">📝</div>
                        <h3 class="card-title">Novidades</h3>
                        <p class="card-description">Criar e gerenciar os logs de novidades do sistema.</p>
                    </div>
                </div>
            </div>

            <!-- Voltar para o site -->
            <div style="text-align: center; margin-top: 3rem;">
                <a href="index" class="btn btn-outline">← Voltar ao Site</a>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
include 'app/views/layout.php';
?> 