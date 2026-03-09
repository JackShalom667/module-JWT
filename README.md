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

