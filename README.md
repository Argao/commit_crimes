# 💀 Commit Crimes™ - Sistema MVC Completo

**"Deploy na sexta, merge sem review, e a culpa é do estagiário."**

Uma consultoria em tecnologia especializada em soluções rápidas, duvidosas e muitas vezes funcionais. Projeto acadêmico implementando uma **arquitetura MVC profissional** com router e sistema de templates.

## 🎯 Sobre o Projeto

Este é um projeto acadêmico de desenvolvimento web que implementa um **sistema completo MVC** com:

- **Arquitetura MVC**: Router customizado, Controllers dedicados, Views organizadas
- **Sistema de Templates**: Engine de renderização com layouts e partials
- **Site Responsivo**: 5 páginas institucionais com design moderno
- **Conteúdo Dinâmico**: Integração completa com MySQL
- **Identidade Visual**: Design irreverente com temática de desenvolvimento
- **Containerização**: Ambiente Docker otimizado

## 🚀 Tecnologias Utilizadas

- **Backend**: PHP 8.2 com arquitetura MVC customizada
- **Frontend**: HTML5 semântico, CSS3 responsivo, JavaScript vanilla
- **Banco de Dados**: MySQL 8.0 com PDO
- **Roteamento**: Sistema de rotas personalizado com parâmetros
- **Templates**: Engine de views com herança de layout
- **Containerização**: Docker + Docker Compose
- **Servidor Web**: Apache 2.4 com mod_rewrite
- **Autoload**: Sistema de carregamento automático de classes

## 📁 Estrutura do Projeto (Atualizada)

```
commit_crimes/
├── app/
│   ├── controllers/              # 🎮 Controllers MVC
│   │   ├── AuthController.php    # • Autenticação e login
│   │   ├── HomeController.php    # • Página inicial
│   │   ├── SobreController.php   # • Página sobre
│   │   ├── ServicosController.php # • Página serviços
│   │   └── NovidadesController.php # • Página novidades
│   ├── core/                     # 🧠 Core do sistema
│   │   ├── Router.php           # • Sistema de roteamento
│   │   ├── Controller.php       # • Controller base
│   │   ├── View.php             # • Engine de templates
│   │   ├── Model.php            # • Model base
│   │   ├── Database.php         # • Conexão banco
│   │   └── Helper.php           # • Funções auxiliares
│   ├── models/                   # 📊 Models de dados
│   │   ├── Servico.php          # • Gestão de serviços
│   │   └── Log.php              # • Gestão de logs/novidades
│   ├── views/                    # 🎨 Sistema de templates
│   │   ├── layouts/
│   │   │   └── main.php         # • Layout principal
│   │   ├── home/
│   │   │   └── index.php        # • Página inicial
│   │   ├── sobre/
│   │   │   └── index.php        # • Página sobre
│   │   ├── servicos/
│   │   │   └── index.php        # • Página serviços
│   │   ├── novidades/
│   │   │   └── index.php        # • Página novidades
│   │   ├── auth/
│   │   │   └── login.php        # • Página login
│   │   └── errors/
│   │       ├── 404.php          # • Página erro 404
│   │       └── 500.php          # • Página erro 500
│   └── routes.php               # 🗺️ Definição de rotas
├── assets/
│   ├── css/
│   │   └── style.css           # Estilos principais
│   ├── img/                    # Imagens e favicon
│   └── js/                     # JavaScript
├── config/
│   └── php.ini                 # Configurações PHP
├── _old_*.php                  # 📦 Arquivos originais (backup)
├── docker-compose.yml          # Orquestração Docker
├── Dockerfile.dev             # Container desenvolvimento
├── .htaccess                  # Front controller + segurança
├── banco.sql                  # Schema do banco de dados
├── index.php                  # 🚪 Front Controller (ponto de entrada)
└── README.md                  # Esta documentação
```

## 🏗️ Arquitetura MVC Implementada

### 🎮 Controllers
Cada controller gerencia uma área específica:
- **AuthController**: Sistema de autenticação (admin/admin123)
- **HomeController**: Página inicial (6 serviços + 3 novidades)
- **SobreController**: Página institucional
- **ServicosController**: Catálogo completo de serviços
- **NovidadesController**: Sistema de logs estilo terminal

### 🧠 Core System
- **Router**: Roteamento com parâmetros `{id}`, `{slug?}`, múltiplos HTTP methods
- **View Engine**: Templates com layouts, helpers, escape automático
- **Controller Base**: Validação, sanitização, flash messages
- **Model Base**: CRUD abstrato, query builder, relacionamentos

### 🗺️ Sistema de Rotas
```php
// app/routes.php
$router->get('/', 'HomeController@index');
$router->get('/sobre', 'SobreController@index');
$router->get('/servicos', 'ServicosController@index');
$router->get('/novidades', 'NovidadesController@index');
$router->any('/login', 'AuthController@login');
```

## 🐳 Como Executar o Projeto

### Pré-requisitos
- Docker & Docker Compose
- Git

### Execução
```bash
# 1. Clone o repositório
git clone <url-do-repositorio>
cd commit_crimes

# 2. Inicie os containers
docker-compose up -d

# 3. Acesse o projeto
# Site: http://localhost:8080
# phpMyAdmin: http://localhost:8081
```

### 🔗 URLs do Sistema
- **Home**: http://localhost:8080/
- **Sobre**: http://localhost:8080/sobre
- **Serviços**: http://localhost:8080/servicos
- **Novidades**: http://localhost:8080/novidades
- **Login**: http://localhost:8080/login
- **Admin DB**: http://localhost:8081

### 🔐 Credenciais
- **Admin**: `admin` / `admin123`
- **MySQL**: `root` / `senha123`
- **Database**: `commit_crimes`

## 📊 Banco de Dados

### Tabelas Implementadas
```sql
usuarios (4 registros)
├── id, usuario, senha, data_criacao

servicos (12 registros)  
├── id, nome, descricao, preco, categoria, data_criacao

logs (9 registros)
├── id, titulo, conteudo, data_publicacao
```

## 🎨 Features Implementadas

### ✅ Site Externo Completo
- **Página Inicial**: Hero + serviços destacados + novidades recentes
- **Sobre**: História + equipe + missão com animações
- **Serviços**: Grid responsivo + badges de categoria + preços
- **Novidades**: Interface terminal com logs coloridos + comandos úteis
- **Login**: Autenticação temática com validação

### ✅ Sistema MVC Profissional
- **Router Avançado**: Parâmetros, múltiplos métodos HTTP, 404 customizado
- **Template Engine**: Layouts, helpers (`View::url()`, `View::asset()`, `View::e()`)
- **Controllers**: Validação, sanitização, tratamento de erros
- **Models**: CRUD abstrato, relacionamentos, métodos auxiliares
- **Autoload**: Carregamento automático de classes

### ✅ Recursos Técnicos
- **Front Controller**: Ponto de entrada único (`index.php`)
- **URL Amigáveis**: `/sobre`, `/servicos`, `/novidades`
- **Tratamento de Erros**: Páginas 404/500 temáticas
- **Segurança**: Sanitização, escape HTML, headers de segurança
- **Performance**: GZIP, cache de assets, otimizações Apache
- **Responsividade**: Mobile-first, breakpoints otimizados

## 🎭 Design & Identidade Visual

### Paleta de Cores
- **Primária**: `#ff4444` (Vermelho Commit Crimes)
- **Secundária**: `#2c3e50` (Azul Corporativo)
- **Terminal**: `#0f0f0f` (Preto Terminal)
- **Matrix**: `#00ff00` (Verde Matriz)
- **Error**: `#ff5f56` / **Warn**: `#ffbd2e` / **Info**: `#27ca3f`

### Tipografia
- **Interface**: Inter (Google Fonts)
- **Código**: JetBrains Mono (Logs/Terminal)

### Elementos Únicos
- **Terminal Simulator**: Logs com níveis coloridos ([ERROR], [WARN], [INFO])
- **Progress Bars**: Animadas para deploys/rollbacks
- **Command Helpers**: Comandos úteis estilo Linux
- **Error Pages**: 404 "Commitou na branch errada?" / 500 "Houston, we have a problem!"

## 🔧 Desenvolvimento

### Comandos Úteis
```bash
# Logs dos containers
docker-compose logs -f

# Acessar container
docker-compose exec web bash

# Reiniciar serviços
docker-compose restart

# Backup do banco
docker exec commit_crimes-db-1 mysqldump -uroot -psenha123 commit_crimes > backup.sql
```

### Estrutura de Views
```php
<?php $this->setLayout('main'); ?>

<section class="hero">
    <!-- Conteúdo da página -->
</section>
```

### Criando Novas Rotas
```php
// app/routes.php
$router->get('/nova-rota/{id}', 'NovoController@metodo');
$router->post('/api/dados', 'ApiController@salvar');
```

## 🚀 Deploy & Produção

### Otimizações Implementadas
- **Apache**: mod_rewrite, headers de segurança, compressão GZIP
- **PHP**: Configurações otimizadas, tratamento de erros
- **Assets**: Cache headers, minificação preparada
- **Banco**: Índices otimizados, queries preparadas

### Variáveis de Ambiente
```env
DB_HOST=localhost
DB_NAME=commit_crimes
DB_USER=root
DB_PASS=senha123
ENVIRONMENT=development
```

## 🎓 Aspectos Acadêmicos Atendidos

### ✅ Requisitos Técnicos
- **4+ páginas HTML5** com semântica completa
- **Menu navegação** responsivo com indicador ativo
- **Conteúdo dinâmico** PHP + MySQL integrado
- **MVC Architecture** implementação completa
- **Sistema de login** funcional com sessões
- **CRUD básico** através dos models
- **Design responsivo** mobile-first
- **Banco de dados** estruturado com relacionamentos

### 🏆 Diferenciais Implementados
- **Router customizado** com parâmetros e métodos HTTP
- **Template engine** com herança e helpers
- **Páginas de erro** temáticas personalizadas
- **Sistema de logs** com interface terminal
- **Autoload de classes** automatizado
- **Front controller** padrão profissional
- **Validação robusta** com sanitização
- **Arquitetura escalável** para expansão futura

---

**Commit Crimes™** - *"Onde cada bug é uma feature mal documentada."*

*Projeto desenvolvido para fins acadêmicos com implementação de padrões profissionais de desenvolvimento web.* 