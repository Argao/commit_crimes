-- Configurações de charset para UTF-8MB4
SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

-- Criar banco de dados com charset UTF-8MB4
CREATE DATABASE IF NOT EXISTS commit_crimes 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Usar o banco de dados
USE commit_crimes;

-- Criar tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  role VARCHAR(20) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir usuário admin padrão
INSERT INTO usuarios (nome, usuario, senha, email, role) VALUES
('Administrador', 'admin', '$2y$10$heQOUZlREEwa5.0uvzJxbOMszbRsSu4zzN2ovAXudIwM72v.4v1CS', 'admin@commitcrimes.com', 'admin')
ON DUPLICATE KEY UPDATE usuario=usuario;


-- Criar tabela de serviços
CREATE TABLE IF NOT EXISTS servicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(100),
  descricao TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir dados de exemplo em servicos
INSERT INTO servicos (titulo, descricao) VALUES
('Refatoração Paranormal', 'Você vê legibilidade. A gente vê espíritos de códigos antigos tentando se comunicar.'),
('Deploy na Sexta (com emoção)', 'Oferecemos pacotes com e sem rollback. Diversão garantida até segunda-feira.'),
('Hotfix Místico', 'Você nem sabe o que a gente arrumou. Mas parou de dar erro? Então tá ótimo.'),
('Suporte de Emergência (meia-noite)', 'Serviço premium para quem ignora alertas até o servidor explodir. Sem julgamentos. (Mentira, julgamos sim.)'),
('Automação Caótica™', 'Automatizamos qualquer processo. Inclusive o de quebrar tudo sem querer.'),
('Consultoria Espiritual de Stack Overflow', 'A gente consulta os ancestrais (e os fóruns de 2009) pra resolver seus bugs mais cabeludos.'),
('Diagnóstico de Código Obsoleto', 'Seu código está velho, mas ainda com vida. Vamos ver o que podemos ressuscitar e o que realmente morreu.'),
('Aceleração de Deploys', 'Quer fazer deploy em 5 minutos ou menos? Vamos colocar a sua equipe no modo turbo (e com risco calculado).'),
('Consultoria Anti-Bug', 'Nós não caímos em bugs, os bugs caem pra nós! Consultoria especializada em eliminar erros de produção.'),
('API Bizarra', 'Conecte a qualquer API, mesmo que a documentação tenha sido feita por um desenvolvedor inspirado por Kafka.');

-- Criar tabela de logs
CREATE TABLE IF NOT EXISTS logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150),
  conteudo TEXT,
  data_publicacao DATE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserir dados de exemplo em logs
INSERT INTO logs (titulo, conteudo, data_publicacao) VALUES
('Correção do bug que não existia', 'Depois de 3 horas de investigação, descobrimos que o bug era, na verdade, um recurso mal documentado. Adicionamos um comentário explicando: "não mexe."', '2025-04-28'),
('Deploy sem querer', 'Alguém deu push na main achando que era a dev. O sistema caiu por 4 minutos, mas voltamos antes que o cliente percebesse. Chamamos isso de "deploy ninja".', '2025-04-25'),
('Nova funcionalidade: botão inútil', 'Agora o sistema tem um botão chamado "Não Clique Aqui". Se clicar, nada acontece. E sim, testamos com QA.', '2025-04-20'),
('Integração com API instável', 'Conectamos com uma API que cai todo dia às 17h. Implementamos um tratamento de erro: "tenta amanhã".', '2025-04-15'),
('Erro catastrófico no código', 'No primeiro teste, o código rodou, mas o servidor ficou em looping até o infinito. Culpado: falha na lógica de cálculo.', '2025-05-01'),
('Rollback emergencial', 'A produção foi lançada, mas o sistema caiu logo depois. Aplicado rollback em tempo recorde e os usuários nem perceberam.', '2025-05-02'),
('Refatoração sem fim', 'Iniciamos a refatoração do módulo de pagamentos e descobrimos que ele já estava mais obsoleto que a internet discada.', '2025-05-03'),
('Correção de integração', 'Integrando a API de pagamentos de novo... tentamos pela 5ª vez. Isso deve funcionar! (Afinal, quem precisa de testes?)', '2025-05-04'),
('Atualização no sistema de monitoramento', 'O sistema de monitoramento foi atualizado. Agora, além de monitorar, ele faz café!', '2025-05-05');