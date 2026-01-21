# Connect Hub - Sistema de Cadastro de Participantes

![Laravel](https://img.shields.io/badge/Laravel-11-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=flat-square&logo=php)
![Tailwind](https://img.shields.io/badge/Tailwind-CSS-38B2AC?style=flat-square&logo=tailwind-css)
![SQLite](https://img.shields.io/badge/SQLite-Database-07405E?style=flat-square&logo=sqlite)

Sistema moderno para gerenciar participantes de eventos com Laravel 11 e Tailwind CSS.

---

## 📸 Preview

![Screenshot do Sistema](screenshot.png)

---

## 📋 Sobre

Aplicação web para cadastro e gestão de participantes com:

- ✅ Cadastro completo de participantes
- ✅ Visualização em tempo real
- ✅ Dashboard com estatísticas
- ✅ Interface responsiva e moderna
- ✅ Design institucional com gradientes

---

## 🚀 Tecnologias

- **Laravel 11** - Framework PHP
- **Tailwind CSS** - Estilização
- **SQLite** - Banco de dados


---

## 📦 Requisitos

- PHP 8.1+
- Composer

---

## ⚙️ Instalação

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/connect-hub.git
cd connect-hub

# Instale dependências
composer install

# Configure ambiente
cp .env.example .env

# Ajuste o .env para SQLite
DB_CONNECTION=sqlite

# Gere a chave
php artisan key:generate

# Crie o banco
touch database/database.sqlite

# Execute migrations
php artisan migrate

# Inicie servidor
php artisan serve
```

Acesse: `http://localhost:8000`

---

## 🗂️ Estrutura

```
connect-hub/
├── app/Http/Controllers/ParticipantController.php
├── app/Models/Participant.php
├── database/migrations/
├── resources/views/
│   ├── layouts/app.blade.php
│   └── dashboard.blade.php
└── routes/web.php
```

---

## 🎯 Funcionalidades

**Cadastro:**
- Nome, e-mail, telefone (obrigatórios)
- Empresa e cargo (opcionais)

**Dashboard:**
- Total de participantes
- Cadastros do dia
- Participantes com empresa

**Interface:**
- Cards com hover effects
- Animações suaves
- Feedback visual
- Design responsivo

---

## 💾 Banco de Dados

Tabela `participants`:

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `id` | Integer | ID único |
| `name` | String | Nome completo |
| `email` | String | E-mail único |
| `phone` | String | Telefone |
| `company` | String | Empresa (opcional) |
| `position` | String | Cargo (opcional) |
| `created_at` | Timestamp | Data de criação |
| `updated_at` | Timestamp | Última atualização |

---

## 🎨 Personalização

Edite `resources/views/layouts/app.blade.php` para alterar cores:

```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: {
                    600: '#SUA_COR'
                }
            }
        }
    }
}


