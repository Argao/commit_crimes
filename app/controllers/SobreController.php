<?php

require_once __DIR__ . '/../core/Controller.php';

/**
 * Controller da página sobre
 */
class SobreController extends Controller {
    
    public function index() {
        // Definir dados para a view
        $data = [
            'title' => 'Sobre Nós',
            'currentPage' => 'sobre',
            'description' => 'Conheça a história, missão e a equipe por trás da Commit Crimes™.'
        ];
        
        echo $this->render('sobre.index', $data);
    }
} 