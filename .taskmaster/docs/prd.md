1. 📂 Estrutura Inicial do Pacote
   Criar o esqueleto do pacote usando modelo PSR-4
   Criar pasta src/
   Criar ServiceProvider
   Criar composer.json do pacote
   Criar comandos para publicar migrations, configs e rotas
   Configurar autoload do pacote
   Criar config/auth-api.php
2. 🔐 Instalação e Integração com Passport
   Criar comando auth-api:install
   Instalar o Passport automaticamente
   Executar passport:install
   Criar os clients (password grant + refresh token)
   Salvar IDs e secrets no .env da aplicação
   Criar documentação automática pós-instalação
3. 🧩 Migrations e Modelos Necessários
   Criar tabela adicional para log de sessões (opcional)
   Criar tabela para tentativas de login (anti brute-force)
   Criar model ApiUser extendendo o User da app (opcional)
4. 🔑 Lógica de Autenticação
   Criar um controller de autenticação independente do projeto, dentro do pacote:
   Login
   Endpoint POST /api/auth/login
   Validar campos (email/password)
   Verificar se usuário existe
   Verificar senha
   Emitir access token e refresh token
   Registrar sessão na tabela de logs (se habilitado no config)
   Refresh Token
   Endpoint POST /api/auth/refresh
   Validar refresh token
   Gerar novo access token
   Invalidação automática do refresh token antigo (configurável)
   Logout
   Endpoint POST /api/auth/logout
   Revogar access token atual
   Revogar refresh tokens associados
   Revoke All Sessions
   Endpoint POST /api/auth/logout-all
   Revogar todos os tokens do usuário
5. 🛡️ Segurança e Melhores Práticas
   Implementar rate limiting por IP e por usuário
   Implementar bloqueio após X tentativas de login
   Criar middleware EnsureTokenIsValid
   Criar middleware para validar escopos (Passport scopes)
   Criar opção para token TTL configurável (access_expiration, refresh_expiration)
   Implementar senha com Hash::check()
   Garantir HTTPS-only nos tokens
   Implementar assinatura opcional de payload JWT
6. 🎛️ Configurações (config/auth-api.php)
   TTL de access token
   TTL de refresh token
   Tabela de usuários a ser utilizada
   Ativar/desativar logs
   Ativar/desativar brute-force protection
   Mensagens personalizadas
   Escopos disponíveis
   Habilitar client credentials para integrações servidor-servidor
7. 🗂️ Rotas
   Criar rotas internas dentro do pacote:
   POST /auth/login
   POST /auth/refresh
   POST /auth/logout
   POST /auth/logout-all
   GET /auth/me (retorna usuário autenticado)
   Proteção via auth:api e middleware personalizado
8. 🧪 Testes Automatizados (obrigatório para pacote profissional)
   Criar testes usando Pest ou PHPUnit:
   Testes de Autenticação
   Login com credenciais válidas
   Login com credenciais inválidas
   Bloqueio por brute-force
   Emissão de tokens
   Refresh token
   Logout
   Logout-all
   Me (usuário autenticado)
   Testes de Segurança
   Token expirado
   Token revogado
   Refresh token inválido
   Acesso sem token
   Acesso com escopo errado
9. 📘 Documentação do Pacote
   Criar documentação clara, incluindo:
   Instalação
   Publicação de arquivos
   Como usar nos projetos
   Exemplo de chamadas via axios/fetch
   Exemplo para conexão com outros serviços
   Estrutura dos tokens
   Boas práticas de segurança
10. 📦 Publicação do Pacote
    Verificar PSR-4
    Criar README completo
    Definir versão inicial (ex: v0.1.0)
    Publicar no GitHub
    Publicar no Packagist
    Configurar CI para teste
    Adicionar coverage badge
11. 🌐 Suporte a Multi-clients
    (Opcional, mas profissional)
    Suporte a mobile
    Suporte a front-end externo
    Suporte a microserviços
    Tokens separados por dispositivo
12. 🔄 Hooks de Extensibilidade
    Adicionar pontos onde o pacote permite personalização:
    Eventos:
    ApiUserLoggedIn
    ApiUserLoggedOut
    ApiTokenRefreshed
    Possibilidade de sobrescrever controllers
    Middleware customizável
    Policies opcionais
13. 🌍 Pensar no Futuro
    Possível suporte a WebAuthn (FIDO2)
    Suporte JWT puro (fora Passport)
    Suporte a login externo (Google, Apple, etc)
    Abstração para driver de autenticação (Passport / JWT / Sanctum)
