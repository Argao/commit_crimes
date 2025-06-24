<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Servico.php';

/**
 * Controller da página de serviços
 */
class ServicosController extends Controller {
    
    public function index() {
        try {
            // Buscar todos os serviços
            $servicoModel = new Servico();
            $servicos = $servicoModel->getAll();
            
            // Definir dados para a view
            $data = [
                'title' => 'Nossos Serviços',
                'currentPage' => 'servicos',
                'servicos' => $servicos,
                'description' => 'Conheça todos os nossos serviços especializados em TI e desenvolvimento.'
            ];
            
            echo $this->render('servicos.index', $data);
            
        } catch (Exception $e) {
            error_log("Erro no ServicosController: " . $e->getMessage());
            
            // Renderizar página com dados vazios em caso de erro
            $data = [
                'title' => 'Nossos Serviços',
                'currentPage' => 'servicos',
                'servicos' => [],
                'error' => 'Erro ao carregar serviços. Nossa equipe já foi notificada.',
                'description' => 'Conheça todos os nossos serviços especializados em TI e desenvolvimento.'
            ];
            
            echo $this->render('servicos.index', $data);
        }
    }
} 