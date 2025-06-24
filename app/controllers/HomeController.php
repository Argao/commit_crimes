<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Servico.php';
require_once __DIR__ . '/../models/Log.php';

/**
 * Controller da página inicial
 */
class HomeController extends Controller {
    
    public function index() {
        try {
            // Buscar serviços em destaque (primeiros 6)
            $servicoModel = new Servico();
            $servicos = $servicoModel->getFeatured(6);
            
            // Buscar últimas novidades (3 mais recentes)
            $logModel = new Log();
            $novidades = $logModel->getRecent(3);
            
            // Definir dados para a view
            $data = [
                'title' => 'Início',
                'currentPage' => 'home',
                'servicos' => $servicos,
                'novidades' => $novidades,
                'description' => 'Deploy na sexta, merge sem review, e a culpa é do estagiário.'
            ];
            
            echo $this->render('home.index', $data);
            
        } catch (Exception $e) {
            error_log("Erro no HomeController: " . $e->getMessage());
            
            // Renderizar página com dados vazios em caso de erro
            $data = [
                'title' => 'Início',
                'currentPage' => 'home',
                'servicos' => [],
                'novidades' => [],
                'error' => 'Erro ao carregar dados. Tente novamente mais tarde.',
                'description' => 'Deploy na sexta, merge sem review, e a culpa é do estagiário.'
            ];
            
            echo $this->render('home.index', $data);
        }
    }
} 