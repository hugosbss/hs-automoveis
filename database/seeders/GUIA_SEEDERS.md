# 🌱 Guia de Seeders - HS Automoveis Laravel

## 📋 Conteúdo dos Seeders

### **MarcasSeeder.php**
Insere 11 marcas de veículos:
- Toyota, Honda, Volkswagen, Fiat, Chevrolet, Hyundai, Ford, Renault, Porsche, BMW, Chrysler

### **ModelosSeeder.php**
Insere 35 modelos distribuídos entre as marcas:
- Toyota: Corolla, Hilux, RAV4, Camry
- Honda: Civic, CR-V, Fit, HR-V
- Volkswagen: Gol, Polo, Virtus, T-Cross
- Fiat: Uno, Palio, Argo, Mobi
- Chevrolet: Onix, Cruze, Tracker, Spin
- Hyundai: HB20, Creta, Tucson, i30
- Ford: Ka, EcoSport, Ranger, Edge
- Renault: Kwid, Sandero, Duster, Logan
- BMW: 320i, X5
- Chrysler: C300

### **CoresSeeder.php**
Insere 9 cores de veículos:
- Branco, Prata, Vermelho, Azul, Cinza, Bege, Verde, Roxo, Preto

### **VeiculosSeeder.php**
Insere 9 veículos completos com informações:
- Toyota Corolla 2023 - R$ 95.000
- VW Gol 2021 - R$ 65.000
- Chevrolet Onix Sedan 2022 - R$ 82.000
- Hyundai HB20 2021 - R$ 58.000
- Ford Ka 2020 - R$ 45.000
- Chevrolet Cruze 2022 - R$ 121.900
- BMW 320i 2022 - R$ 220.899
- Chevrolet Onix Hatch 2024 - R$ 79.900
- Chrysler 300c 2009 - R$ 92.590

### **FotoVeiculosSeeder.php**
Insere 27 fotos (3 por veículo) com URLs reais de imagens

### **DatabaseSeeder.php**
Arquivo principal que chama todos os seeders na ordem correta

---

## 🚀 Como Usar os Seeders

### Passo 1: Copiar os arquivos para seu projeto

Copie todos os arquivos `.php` para a pasta `database/seeders/` do seu projeto Laravel:

```bash
cp MarcasSeeder.php seu_projeto/database/seeders/
cp ModelosSeeder.php seu_projeto/database/seeders/
cp CoresSeeder.php seu_projeto/database/seeders/
cp VeiculosSeeder.php seu_projeto/database/seeders/
cp FotoVeiculosSeeder.php seu_projeto/database/seeders/
cp DatabaseSeeder.php seu_projeto/database/seeders/
```

### Passo 2: Executar os seeders

#### Opção A: Executar todos os seeders (recomendado)
```bash
php artisan db:seed
```

#### Opção B: Executar um seeder específico
```bash
php artisan db:seed --class=MarcasSeeder
php artisan db:seed --class=ModelosSeeder
php artisan db:seed --class=CoresSeeder
php artisan db:seed --class=VeiculosSeeder
php artisan db:seed --class=FotoVeiculosSeeder
```

#### Opção C: Resetar e popular o banco (cuidado - deleta dados!)
```bash
php artisan migrate:fresh --seed
```

---

## 📊 Estrutura do Banco de Dados

Após executar os seeders, seu banco terá:

| Tabela | Registros |
|--------|-----------|
| marcas | 11 |
| modelos | 35 |
| cores | 9 |
| veiculos | 9 |
| foto_veiculos | 27 |

---

## 📝 Personalizar os Seeders

### Adicionar novo veículo

Edite `VeiculosSeeder.php` e adicione um novo registro no array:

```php
[
    'marca_id' => 1,
    'modelo_id' => 1,
    'cor_id' => 1,
    'ano' => 2024,
    'quilometragem' => 0,
    'valor' => 100000.00,
    'descricao' => 'Seu novo veículo',
    'created_at' => now(),
    'updated_at' => now()
],
```

### Adicionar nova marca

Edite `MarcasSeeder.php`:

```php
['nome' => 'Sua Marca', 'created_at' => now(), 'updated_at' => now()],
```

### Adicionar nova cor

Edite `CoresSeeder.php`:

```php
['nome' => 'Sua Cor', 'created_at' => now(), 'updated_at' => now()],
```

### Adicionar fotos

Edite `FotoVeiculosSeeder.php` e adicione:

```php
[
    'veiculo_id' => 1,
    'url' => 'https://sua-url-da-imagem.com/imagem.jpg',
    'created_at' => now(),
    'updated_at' => now()
],
```

---

## ⚠️ Importante

### Erro: "SQLSTATE[HY000]"
- Verifique se o banco de dados existe
- Verifique a configuração em `.env`

### Dados não aparecem
- Execute `php artisan cache:clear`
- Verifique se o seeder foi realmente executado

---

## 📚 Referências

- [Documentação Laravel Seeders](https://laravel.com/docs/seeding)
- [Documentação Laravel Migrations](https://laravel.com/docs/migrations)

---
