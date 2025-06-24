<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Log.php';

/**
 * Controller da página de novidades
 */
class NovidadesController extends Controller {
    
    public function index() {
        try {
            // Buscar todos os logs/novidades
            $logModel = new Log();
            $novidades = $logModel->getAll();
            
            // Definir dados para a view
            $data = [
                'title' => 'Novidades & Logs',
                'currentPage' => 'novidades',
                'novidades' => $novidades,
                'description' => 'Acompanhe os logs do nosso sistema e as últimas atualizações da empresa.'
            ];
            
            echo $this->render('novidades.index', $data);
            
        } catch (Exception $e) {
            error_log("Erro no NovidadesController: " . $e->getMessage());
            
            // Renderizar página com dados vazios em caso de erro
            $data = [
                'title' => 'Novidades & Logs',
                'currentPage' => 'novidades',
                'novidades' => [],
                'error' => 'Sistema temporariamente indisponível. Logs não puderam ser carregados.',
                'description' => 'Acompanhe os logs do nosso sistema e as últimas atualizações da empresa.'
            ];
            
            echo $this->render('novidades.index', $data);
        }
    }
} 