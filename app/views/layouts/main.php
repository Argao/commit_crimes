<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Commit Crimes™' ?> - Consultoria em TI</title>
    <meta name="description" content="<?= $description ?? 'Consultoria em tecnologia especializada em soluções rápidas, duvidosas e muitas vezes funcionais.' ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= View::asset('img/favicon.ico') ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= View::asset('css/style.css') ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?= $title ?? 'Commit Crimes™' ?>">
    <meta property="og:description" content="<?= $description ?? 'Deploy na sexta, merge sem review, e a culpa é do estagiário.' ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <a href="<?= View::url() ?>" class="logo">Commit Crimes™</a>
            
            <ul class="nav-menu" id="nav-menu">
                <li><a href="<?= View::url() ?>" class="nav-link <?= $currentPage === 'home' ? 'active' : '' ?>">Início</a></li>
                <li><a href="<?= View::url('sobre') ?>" class="nav-link <?= $currentPage === 'sobre' ? 'active' : '' ?>">Sobre</a></li>
                <li><a href="<?= View::url('servicos') ?>" class="nav-link <?= $currentPage === 'servicos' ? 'active' : '' ?>">Serviços</a></li>
                <li><a href="<?= View::url('novidades') ?>" class="nav-link <?= $currentPage === 'novidades' ? 'active' : '' ?>">Novidades</a></li>
            </ul>
            
            <a href="<?= View::url('login') ?>" class="login-btn">Login</a>
            
            <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Menu mobile">
                ☰
            </button>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main">
        <?= $content ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Commit Crimes™ — Não nos responsabilizamos por código quebrado em produção.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const navMenu = document.getElementById('nav-menu');

        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuBtn.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('active');
            }
        });

        // Close mobile menu when clicking on a link
        navMenu.addEventListener('click', (e) => {
            if (e.target.classList.contains('nav-link')) {
                navMenu.classList.remove('active');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading animation to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.href && !this.href.startsWith('#')) {
                    const originalText = this.textContent;
                    this.innerHTML = '<span class="loading"></span> Carregando...';
                    setTimeout(() => {
                        this.textContent = originalText;
                    }, 2000);
                }
            });
        });

        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    </script>

    <?php if (isset($scripts)): ?>
        <?= $scripts ?>
    <?php endif; ?>
</body>
</html> 