# HS Automoveis - Sistema de Venda de Veículos

Sistema desenvolvido em Laravel para gerenciamento e visualização de veículos, similar aos portais Carros.com.br, iCarros ou Webmotors.

## 📋 Descrição

Aplicação Laravel com autenticação de usuário que simula um site de venda de veículos, contendo:

- **Área Pública**: Visualização de todos os veículos disponíveis para venda
- **Área Administrativa**: Gerenciamento de marcas, modelos, cores e veículos (restrita a administradores)

## 🚀 Como Rodar o Projeto

### Pré-requisitos

- PHP >= 8.1
- Composer
- MySQL
- Node.js e NPM (opcional, para assets)

### Instalação

1. **Clone o repositório** (se aplicável) ou navegue até a pasta do projeto

2. **Instale as dependências do Composer:**
   ```bash
   composer install
   ```

3. **Configure o arquivo .env:**
   - Copie o arquivo `.env.example` para `.env` (se não existir)
   - Configure as credenciais do banco de dados:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=hs_automoveis
     DB_USERNAME=seu_usuario
     DB_PASSWORD=sua_senha
     ```

4. **Gere a chave da aplicação:**
   ```bash
   php artisan key:generate
   ```

5. **Execute as migrations:**
   ```bash
   php artisan migrate
   ```
   
   Isso criará as seguintes tabelas:
   - `users` (usuários do sistema)
   - `marcas` (marcas de veículos)
   - `modelos` (modelos de veículos)
   - `cores` (cores de veículos)
   - `veiculos` (veículos cadastrados)
   - `foto_veiculos` (fotos dos veículos)

6. **Execute o seeder para criar o usuário administrador:**
   ```bash
   php artisan db:seed --class=AdminUserSeeder
   ```

7. **Inicie o servidor de desenvolvimento:**
   ```bash
   php artisan serve
   ```

8. **Acesse a aplicação:**
   - Abra seu navegador em: `http://localhost:8000`

## 🔐 Credenciais de Acesso

### Administrador

- **Email:** `admin@admin.com`
- **Senha:** `123456`

## 📚 Funcionalidades

### Área Pública

- ✅ Listagem de todos os veículos cadastrados
- ✅ Visualização de detalhes de cada veículo
- ✅ Filtros por marca, ano e preço
- ✅ Busca por marca ou modelo
- ✅ Exibição de fotos dos veículos 

### Área Administrativa

- ✅ **Gerenciamento de Marcas**: Criar, editar e excluir marcas
- ✅ **Gerenciamento de Modelos**: Criar, editar e excluir modelos (vinculados a marcas)
- ✅ **Gerenciamento de Cores**: Criar, editar e excluir cores
- ✅ **Gerenciamento de Veículos**: 
  - Cadastrar novos veículos com marca, modelo, cor, ano, quilometragem, valor e descrição
  - Editar informações existentes
  - Excluir registros
  - Cada veículo deve ter 3 fotos (URLs)

## 🗂️ Estrutura do Projeto

```
hs-automoveis/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── VeiculoController.php
│   │       ├── MarcaController.php
│   │       ├── ModeloController.php
│   │       └── CorController.php
│   └── Models/
│       ├── Veiculo.php
│       ├── Marca.php
│       ├── Modelo.php
│       ├── Cor.php
│       └── FotoVeiculo.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── AdminUserSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── template.blade.php
│       └── template-wmotors/
│           └── pages/
│               ├── home.blade.php
│               ├── veiculoLista.blade.php
│               ├── veiculoDetalhe.blade.php
│               └── administrador.blade.php
└── routes/
    └── web.php
```

## 🎨 Tecnologias Utilizadas

- **Laravel** (Framework PHP)
- **MySQL** (Banco de dados)
- **Bootstrap 5** (Framework CSS)
- **Blade Templates** (Sistema de templates do Laravel)

## 📝 Validações Implementadas

- Campos obrigatórios: ano, quilometragem e valor
- Validação de URLs para fotos
- Mínimo de 3 fotos por veículo
- Validação de relacionamentos (marca, modelo, cor devem existir)

## 🔧 Comandos Úteis

```bash
# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recriar banco de dados (CUIDADO: apaga todos os dados)
php artisan migrate:fresh --seed

# Criar novo usuário admin manualmente
php artisan tinker
>>> $user = new App\Models\User();
>>> $user->name = 'Admin';
>>> $user->email = 'admin@admin.com';
>>> $user->password = Hash::make('123456');
>>> $user->save();
```

## 📖 Recursos do Laravel Utilizados

- ✅ Autenticação nativa do Laravel
- ✅ Roteamento e Controllers
- ✅ Validação de formulários
- ✅ Templates com `@extends`, `@section` e `@yield`
- ✅ Relacionamentos Eloquent (hasMany, belongsTo)
- ✅ Migrations e Seeders

## 🐛 Solução de Problemas

### Erro ao executar migrations

Se houver erro de foreign key, certifique-se de que as migrations estão na ordem correta:
1. `create_marcas_table`
2. `create_cores_table`
3. `create_modelos_table` (depende de marcas)
4. `create_veiculos_table` (depende de marcas, modelos e cores)
5. `create_foto_veiculos_table` (depende de veículos)

### Erro de permissões

Se houver problemas com permissões de arquivos:
```bash
chmod -R 775 storage bootstrap/cache
```

## 👤 Autor

Desenvolvido como trabalho acadêmico.

## 📄 Licença

Este projeto é um trabalho acadêmico.

Crie o readme.MD para mim, o projeto foi baseado nesse escopo, 

🧩 Descrição Geral
O aluno deverá desenvolver uma aplicação em Laravel com autenticação de usuário e senha, que simule um site de venda de veículos, semelhante aos portais Carros.com.br, iCarros ou Webmotors.

O sistema deverá possuir duas áreas distintas:

Área Pública: onde o visitante poderá visualizar todos os veículos disponíveis para venda.
Área Administrativa: restrita ao administrador autenticado, onde será possível gerenciar marcas, modelos, cores e veículos.
🚘 Requisitos da Área Pública
Exibir uma listagem com todos os veículos cadastrados.
Cada veículo deve mostrar:
Foto principal (imagem via link);
Marca, modelo e cor;
Ano de fabricação;
Quilometragem atual;
Valor total;
Campo de detalhes (descrição textual).
Ao clicar em um veículo, deve ser aberta uma página de detalhes com todas as informações e as demais fotos do carro.
🔐 Requisitos da Área Administrativa
Somente o administrador autenticado poderá acessar.
Deverá conter:
Cadastro de marcas;
Cadastro de modelos;
Cadastro de cores;
Cadastro completo de veículos;
Cada veículo deve ter no mínimo 3 fotos (armazenadas como links, não upload).
Os campos ano, quilometragem e valor são obrigatórios.
O administrador poderá:
Adicionar novos veículos;
Editar informações existentes;
Excluir registros.
🎨 Requisitos de Template e Layout
O site deverá possuir um template visual (layout base), utilizando as boas práticas de uso de templates no Laravel com @section e @yield.
Trabalhos que não utilizarem templates não serão corrigidos.
Não adianta o site estar funcional e feio — notas maiores serão atribuídas aos trabalhos visualmente bem elaborados, com boa estética, organização e identidade visual.
É permitido o uso de frameworks CSS.
⚙️ Tecnologias e Regras
O sistema deve ser desenvolvido em Laravel
Deve conter validação de login e senha (autenticação básica Laravel).
Banco de dados configurado e funcional (MySQL).
É permitido o uso de Bootstrap ou outro framework CSS para estilização.
Não é necessário upload real de imagens, apenas links (URLs) válidos.
📤 Entrega

Deve estar claro no README.md:
Como rodar o projeto (comandos do Laravel);
Usuário e senha de acesso do administrador.
DEVE possuir prints (imagens), de todas as telas do site
📚 Dica
Utilize os recursos nativos do Laravel para:

Autenticação;
Roteamento e Controllers para separar a área pública e administrativa;
Validação de formulários e campos obrigatórios;