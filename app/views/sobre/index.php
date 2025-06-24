<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Sobre Nós</h1>
        <p class="hero-subtitle">Porque fazer certo é opcional, mas fazer funcionar é obrigação.</p>
    </div>
</section>

<!-- Main Content -->
<section class="section">
    <div class="container">
        <!-- Nossa História -->
        <div class="about-content">
            <div class="about-text">
                <h2>Nossa História</h2>
                <p>A Commit Crimes surgiu de um pull request não revisado, um deploy em sexta-feira 13 e uma promessa: se é pra dar ruim, que pelo menos a culpa tenha dono. Desde então, quebramos ambientes com responsabilidade e sem medo de versionar a vergonha.</p>
            </div>
            <div class="about-image">
                <img src="<?= View::asset('img/stressed-dev.jpg') ?>" alt="A origem de tudo: dev estressado tentando fazer funcionar" class="hero-image">
            </div>
        </div>

        <!-- Missão, Visão e Bagunça -->
        <div style="margin: 4rem 0;">
            <h2 class="section-title">Missão, Visão e Bagunça</h2>
            
            <div class="cards-grid">
                <div class="card">
                    <h3 class="card-title">🎯 Missão</h3>
                    <p class="card-description">Automatizar tarefas simples da forma mais complexa possível.</p>
                </div>
                
                <div class="card">
                    <h3 class="card-title">👁️ Visão</h3>
                    <p class="card-description">Produção estável é um mito — e nós somos os mitos.</p>
                </div>
                
                <div class="card">
                    <h3 class="card-title">⚡ Valores</h3>
                    <p class="card-description">If it compiles, ship it. Se der erro, é feature.</p>
                </div>
            </div>
        </div>

        <!-- Equipe -->
        <div style="margin: 4rem 0;">
            <h2 class="section-title">Quem está por trás dos commits (e dos crimes)</h2>
            <p class="section-subtitle">Nosso time é formado por profissionais altamente capacitados em quebrar produção com estilo:</p>
            
            <div class="team-grid">
                <div class="team-member">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📊</div>
                    <h3>Mateus Restier</h3>
                    <p class="team-role">Cientista de Dados</p>
                    <p style="margin-top: 1rem; font-size: 0.9rem; color: #6c757d;">Especializado em fazer gráficos bonitos pra explicar que o sistema caiu.</p>
                </div>
                
                <div class="team-member">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏗️</div>
                    <h3>Pedro Gonçalves</h3>
                    <p class="team-role">Pedreiro de Software</p>
                    <p style="margin-top: 1rem; font-size: 0.9rem; color: #6c757d;">Levanta sistema sem projeto e entrega com deploy no domingo à noite.</p>
                </div>
                
                <div class="team-member">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">😵‍💫</div>
                    <h3>João Aragão</h3>
                    <p class="team-role">Engenheiro de Sofrimento</p>
                    <p style="margin-top: 1rem; font-size: 0.9rem; color: #6c757d;">Conserta o que o Pedro quebrou... ou tenta, né?</p>
                </div>
            </div>
        </div>

        <!-- Nossos Princípios -->
        <div style="margin: 4rem 0;">
            <h2 class="section-title">Nossos Princípios</h2>
            <div class="cards-grid">
                <div class="card">
                    <h3 class="card-title">🔥 Transparência</h3>
                    <p class="card-description">Sempre avisamos quando algo vai dar errado. Principalmente depois que já deu.</p>
                </div>
                
                <div class="card">
                    <h3 class="card-title">⚡ Agilidade</h3>
                    <p class="card-description">Entregamos rápido. Se funcionar, é bônus.</p>
                </div>
                
                <div class="card">
                    <h3 class="card-title">🎓 Aprendizado</h3>
                    <p class="card-description">Cada erro é uma oportunidade de aprender... e de fazer outro erro diferente.</p>
                </div>
                
                <div class="card">
                    <h3 class="card-title">🤝 Colaboração</h3>
                    <p class="card-description">Trabalhamos juntos para distribuir a culpa de forma justa.</p>
                </div>
                
                <div class="card">
                    <h3 class="card-title">🏆 Excelência</h3>
                    <p class="card-description">Striving for perfection, settling for "it works on my machine".</p>
                </div>
                
                <div class="card">
                    <h3 class="card-title">💡 Inovação</h3>
                    <p class="card-description">Sempre encontramos novas formas de quebrar o que estava funcionando.</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div style="text-align: center; margin: 4rem 0; padding: 3rem; background: #f8f9fa; border-radius: 1rem;">
            <h2 style="margin-bottom: 1rem;">Pronto para o caos controlado?</h2>
            <p style="margin-bottom: 2rem; color: #6c757d;">Entre em contato e vamos quebrar... digo, melhorar seu sistema juntos!</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?= View::url('servicos') ?>" class="btn btn-primary">Nossos Serviços</a>
                <a href="<?= View::url('novidades') ?>" class="btn btn-outline">Últimas Novidades</a>
            </div>
        </div>
    </div>
</section> 