# 🔐 Laravel 12 JWT Authentication API

API REST d’authentification sécurisée avec JWT, développée avec Laravel 12.
Elle fournit des endpoints pour l’inscription, la connexion, la gestion de session
et la protection des routes.

Projet conçu pour démontrer des compétences en backend, sécurité et tests automatisés.


## 🛠️ Stack technique

- Laravel 12
- PHP 8.2+
- MySQL (dev)
- SQLite (tests)
- JWT (tymon/jwt-auth)
- PHPUnit (tests automatisés)

## 🚀 Installation

```bash
git clone https://github.com/JackShalom667/module-JWT.git
cd jwt-auth-api
composer install
cp .env.example .env
php artisan key:generate

Configurer la base MySQL dans `.env`, puis :

```md
```bash
php artisan migrate
php artisan jwt:secret
php artisan serve


---

### 4️⃣ Endpoints API
```md
## 📌 Endpoints

| Méthode | URL                | Description          |
|---------|--------------------|----------------------|
| POST    | /api/auth/register | Inscription          |
| POST    | /api/auth/login    | Connexion            |
| GET     | /api/auth/me       | Utilisateur connecté |
| POST    | /api/auth/logout   | Déconnexion          |
| POST    | /api/auth/refresh  | Rafraîchir le token  |

## 🧪 Tests

```bash
php artisan test


---

### 6️⃣ Sécurité
```md
## 🔒 Sécurité

- Hashage des mots de passe (bcrypt)
- Authentification JWT
- Routes protégées par middleware
- Tests de sécurité (401 / 403)


## 👨‍💻 Auteur

FONGYELE MBAHIM Jacques Shalom  
Développeur Backend / DevOps  


