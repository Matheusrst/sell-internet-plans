# Sistema de Gestão de Planos e Sub-Planos

Este projeto é um sistema web de gestão de planos e sub-planos desenvolvido com Laravel. A aplicação permite que administradores e clientes gerenciem planos e sub-planos, efetuem compras e visualizem planos adquiridos.

## Funcionalidades

### Para Administradores

- **Gerenciar Planos**: Criar, editar e excluir planos e sub-planos.
- **Gerenciar Manutenções**: Gerenciar e visualizar manutenções programadas.
- **Gerenciar Usuários**: Registrar novos administradores e visualizar usuários.
- **Visualizar Planos Comprados**: Visualizar todos os planos comprados pelos clientes.

### Para Clientes

- **Visualizar Planos**: Consultar planos disponíveis e suas descrições.
- **Ver Detalhes dos Planos**: Consultar detalhes de planos e sub-planos.
- **Comprar Planos e Sub-Planos**: Adquirir planos e sub-planos conforme necessidade.
- **Visualizar Planos Comprados**: Consultar planos e sub-planos comprados.

## Pré-requisitos

Certifique-se de ter o seguinte instalado:
- PHP 8.0 ou superior
- Composer
- MySQL ou outro banco de dados compatível com Laravel
- Node.js e npm (para compilar assets frontend)

## Configuração

1. **Clone o Repositório**

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. **Instale as Dependências**

   ```bash
   composer install
   npm install
   ```

3. **Configure o Arquivo `.env`**

   Copie o arquivo `.env.example` para `.env` e configure suas variáveis de ambiente.

   ```bash
   cp .env.example .env
   ```

4. **Gere a Chave de Aplicação**

   ```bash
   php artisan key:generate
   ```

5. **Execute as Migrations**

   ```bash
   php artisan migrate
   ```

6. **Compile os Assets**

   ```bash
   npm run dev
   ```

7. **Inicie o Servidor**

   ```bash
   php artisan serve
   ```

   A aplicação estará disponível em `http://localhost:8000`.

## Rotas

- **Página Inicial**: `/`
- **Visualizar Planos**: `/plans`
- **Detalhes do Plano**: `/plans/{plan}`
- **Comprar Plano**: `/plans/{plan}/sell`
- **Meus Planos Comprados**: `/plans/purchased`
- **Gerenciar Planos (Admin)**: `/admin/plans`
- **Registrar Novo Administrador**: `/admin/register`

## Contribuição

Se você deseja contribuir para o projeto, siga estas etapas:

1. Faça um fork do repositório.
2. Crie uma nova branch para suas alterações (`git checkout -b minha-branch`).
3. Faça commit das suas alterações (`git commit -am 'Adiciona nova funcionalidade'`).
4. Envie para o repositório remoto (`git push origin minha-branch`).
5. Abra um Pull Request no GitHub.

## Licença

Este é um projeto pessoal open source de codigo e licença aberta sem nehuma finalidade de uso proficional ou industrial.

## Contato

Para mais informações, entre em contato:

- **Nome**: Matheus Ribeiro De Sales Tiné
- **E-mail**: matheusriberomatheus@gmail.com
- **GitHub**: [Matheusrst](https://github.com/Matheusrst)
