<?php

require_once __DIR__ . '/../core/Controller.php';

/**
 * Controller de autenticação
 */
class AuthController extends Controller {
    
    public function login() {
        // Se é POST, processar login
        if ($this->isPost()) {
            return $this->processLogin();
        }
        
        // Mostrar formulário de login
        $data = [
            'title' => 'Login - Sistema Administrativo',
            'currentPage' => 'login',
            'description' => 'Acesso ao sistema administrativo da Commit Crimes™.'
        ];
        
        echo $this->render('auth.login', $data);
    }
    
    private function processLogin() {
        // Obter dados do formulário
        $credentials = $this->getPostData(['username', 'password']);
        
        // Validar entrada
        $errors = $this->validate($credentials, [
            'username' => 'required|min:3',
            'password' => 'required|min:4'
        ]);
        
        if (!empty($errors)) {
            $data = [
                'title' => 'Login - Sistema Administrativo',
                'currentPage' => 'login',
                'errors' => $errors,
                'old' => $credentials,
                'description' => 'Acesso ao sistema administrativo da Commit Crimes™.'
            ];
            
            echo $this->render('auth.login', $data);
            return;
        }
        
        // TODO: Implementar verificação real de credenciais
        // Por enquanto, credenciais hardcoded para demo
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin123') {
            // Login bem-sucedido
            if (!isset($_SESSION)) {
                session_start();
            }
            
            $_SESSION['user_id'] = 1;
            $_SESSION['username'] = $credentials['username'];
            $_SESSION['login_time'] = time();
            
            $this->setFlash('success', 'Login realizado com sucesso!');
            $this->redirect('/admin');
        } else {
            // Credenciais inválidas
            $data = [
                'title' => 'Login - Sistema Administrativo',
                'currentPage' => 'login',
                'error' => 'Credenciais inválidas. Tente novamente.',
                'old' => ['username' => $credentials['username']],
                'description' => 'Acesso ao sistema administrativo da Commit Crimes™.'
            ];
            
            echo $this->render('auth.login', $data);
        }
    }
    
    public function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        session_destroy();
        $this->setFlash('info', 'Logout realizado com sucesso.');
        $this->redirect('/login');
    }
} 