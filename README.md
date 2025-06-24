# 💀 Commit Crimes™ - Website Empresarial

**"Deploy na sexta, merge sem review, e a culpa é do estagiário."**

Uma consultoria em tecnologia especializada em soluções rápidas, duvidosas e muitas vezes funcionais.

## 🎯 Sobre o Projeto

Este é um projeto acadêmico de desenvolvimento web que implementa um **website empresarial completo** com:

- **Site Externo**: Páginas institucionais responsivas (Início, Sobre, Serviços, Novidades)
- **Sistema Administrativo**: CRUD completo para gerenciar conteúdo
- **Identidade Visual**: Design moderno com tom irreverente e temática tech
- **Arquitetura MVC**: Estrutura organizada sem overengineering

## 🚀 Tecnologias Utilizadas

- **Frontend**: HTML5 semântico, CSS3 responsivo, JavaScript vanilla
- **Backend**: PHP 8.2 com arquitetura MVC
- **Banco de Dados**: MySQL 8.0
- **Containerização**: Docker + Docker Compose
- **Servidor Web**: Apache 2.4

## 📁 Estrutura do Projeto

```
commit_crimes/
├── app/
│   ├── config/
│   │   └── Database.php          # Configuração do banco
│   ├── models/
│   │   ├── Servico.php          # Model de serviços
│   │   └── Log.php              # Model de logs/novidades
│   └── views/
│       └── layout.php           # Layout base
├── assets/
│   ├── css/
│   │   └── style.css           # Estilos principais
│   ├── img/                    # Imagens e favicon
│   └── js/                     # JavaScript (futuro)
├── config/
│   └── php.ini                 # Configurações PHP
├── admin/                      # Sistema administrativo (futuro)
├── docker-compose.yml          # Orquestração Docker
├── Dockerfile.dev             # Container para desenvolvimento
├── .htaccess                  # Configurações Apache
├── banco.sql                  # Schema do banco de dados
├── index.php                  # Página inicial
├── sobre.php                  # Página sobre
├── servicos.php              # Página de serviços
├── novidades.php             # Página de novidades
├── login.php                 # Página de login
└── README.md                 # Esta documentação
```

## 🐳 Como Executar o Projeto

### Pré-requisitos

- Docker
- Docker Compose
- Git

### Passo a Passo

1. **Clone o repositório:**
```bash
git clone <url-do-repositorio>
cd commit_crimes
```

2. **Inicie os containers:**
```bash
docker-compose up -d
```

3. **Acesse o projeto:**
- **Site principal**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081
- **Banco de dados**: localhost:3306

### Credenciais Padrão

- **Usuário Admin**: `admin`
- **Senha**: `admin123` (hash já incluído no banco)
- **Banco MySQL**: 
  - Usuário: `root`
  - Senha: `senha123`
  - Database: `commit_crimes`

## 📊 Banco de Dados

O projeto utiliza 3 tabelas principais:

### `usuarios`
- Gerenciamento de administradores
- Autenticação com senha hash
- Controle de sessão

### `servicos`
- Catálogo de serviços da empresa
- Conteúdo dinâmico para as páginas

### `logs`
- Sistema de novidades/logs
- Temática de logs de sistema
- Ordenação cronológica

## 🖥️ Funcionalidades

### Site Externo
- ✅ **Página Inicial**: Hero section + apresentação + destaques
- ✅ **Sobre**: História da empresa + equipe + missão/visão
- ✅ **Serviços**: Catálogo completo com badges temáticos
- ✅ **Novidades**: Logs no estilo terminal/console
- ✅ **Login**: Interface de autenticação temática
- ✅ **Navegação**: Menu responsivo com indicador de página ativa
- ✅ **Design**: Responsivo, moderno, com identidade visual única

### Sistema Administrativo (Planejado)
- 🔲 Dashboard de administração
- 🔲 CRUD de usuários
- 🔲 CRUD de serviços
- 🔲 CRUD de novidades/logs
- 🔲 Controle de sessão (timeout 2min)
- 🔲 Sistema de logout

## 🎨 Design e Identidade Visual

### Paleta de Cores
- **Primária**: `#ff4444` (Vermelho vibrante)
- **Secundária**: `#2c3e50` (Azul escuro)
- **Accent**: `#e74c3c` (Vermelho accent)
- **Background**: `#f8f9fa` (Cinza claro)
- **Text**: `#2c3e50` (Escuro)

### Tipografia
- **Principal**: Inter (Google Fonts)
- **Monospace**: JetBrains Mono (para códigos/logs)

### Elementos Visuais
- Gradientes modernos
- Sombras sutis
- Animações suaves
- Tema dark para logs/terminal
- Emojis temáticos

## 🔧 Desenvolvimento

### Ambiente Local
```bash
# Logs dos containers
docker-compose logs -f

# Acessar container web
docker-compose exec web bash

# Reiniciar serviços
docker-compose restart
```

### Estrutura MVC
- **Models**: Interação com banco de dados
- **Views**: Templates HTML/PHP
- **Controllers**: Lógica de negócio (futuro)

### Boas Práticas Implementadas
- HTML5 semântico
- CSS responsivo mobile-first
- Sanitização de dados (htmlspecialchars)
- Prepared statements (PDO)
- Tratamento de exceções
- URLs amigáveis (.htaccess)

## 🚀 Deploy para Produção

### Dockerfile de Produção (Criar)
```dockerfile
FROM php:8.2-apache
# Configurações otimizadas para produção
```

### Variáveis de Ambiente
```env
DB_HOST=seu-mysql-host
DB_NAME=commit_crimes
DB_USER=seu-usuario
DB_PASS=sua-senha-segura
ENV=production
```

## 🎓 Aspectos Acadêmicos

### Requisitos Atendidos
- ✅ **4 páginas HTML5 responsivas** com elementos semânticos
- ✅ **Menu de navegação** funcional em todas as páginas
- ✅ **Conteúdo dinâmico** (PHP + MySQL)
- ✅ **Bootstrap opcional** (não utilizado - CSS nativo)
- ✅ **Sistema de login** preparado
- ✅ **Estrutura para CRUD** implementada

### Pontuação Esperada
- **Páginas HTML responsivas** (2,5 pontos): ✅
- **Navegação funcionando** (1,5 pontos): ✅
- **Controle de Sessão** (1,5 pontos): 🔄 (parcial)
- **Site Administrativo** (2,5 pontos): 🔄 (em desenvolvimento)
- ✅ **Apresentação** (2,0 pontos): ✅

## 👥 Equipe

- **Mateus Restier** - Cientista de Dados
- **Pedro Gonçalves** - Pedreiro de Software  
- **João Aragão** - Engenheiro de Sofrimento

---

## 📝 Notas de Desenvolvimento

### Próximos Passos
1. Implementar sistema administrativo completo
2. Adicionar autenticação e controle de sessão
3. Criar CRUDs para todas as entidades
4. Implementar validações avançadas
5. Adicionar testes automatizados
6. Otimizar para produção

### Bugs Conhecidos
- Imagem placeholder precisa ser gerada
- Sistema de autenticação não implementado
- Validações de formulário básicas

---

**© 2025 Commit Crimes™ — Não nos responsabilizamos por código quebrado em produção.** 