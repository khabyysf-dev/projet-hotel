# Hôtel Sables d'Or - Architecture Séparation Frontend/Backend

## 📋 Structure du Projet

```
project1/
├── frontend/                 # Application Frontend (HTML/CSS/JS)
│   ├── index.html           # Page d'accueil
│   ├── login.html           # Page de connexion
│   ├── register.html        # Page d'inscription
│   ├── booking.html         # Page de réservation
│   ├── rooms.html           # Galerie des chambres
│   ├── restaurant.html      # Page restaurant
│   ├── contact.html         # Page contact
│   ├── my-reservations.html # Mes réservations
│   ├── css/
│   │   ├── style.css        # Styles principaux
│   │   └── auth.css         # Styles authentification
│   └── js/
│       ├── api-config.js    # Configuration API
│       ├── auth.js          # Gestion authentification
│       └── main.js          # Scripts principaux
│
├── backend/                  # API Backend (PHP)
│   ├── api/
│   │   └── index.php        # Routes API principales
│   └── includes/
│       └── db.php           # Configuration base de données
│
├── ARCHITECTURE.md          # Documentation architecture (ce fichier)
└── README.md                # Ancien README
```

## 🚀 Comment Exécuter le Projet

### Option 1: Frontend Uniquement (Recommandé pour développement)

#### Avec Python (Simple HTTP Server)
```bash
# Naviguez vers le dossier frontend
cd frontend

# Lancez un serveur HTTP
python -m http.server 8000

# Ouvrez dans votre navigateur
http://localhost:8000
```

#### Avec Node.js (http-server)
```bash
cd frontend

# Installez http-server globalement (si nécessaire)
npm install -g http-server

# Lancez le serveur
http-server -p 8000

# Ouvrez dans votre navigateur
http://localhost:8000
```

#### Avec PHP
```bash
cd frontend

# Lancez le serveur PHP intégré
php -S localhost:8000

# Ouvrez dans votre navigateur
http://localhost:8000
```

### Option 2: Frontend + Backend (Développement Complet)

#### Étape 1: Installer PHP et composer

**Sur Windows:**
- Téléchargez PHP depuis [php.net](https://www.php.net/downloads)
- Ajoutez PHP au PATH système

**Vérifier l'installation:**
```bash
php --version
```

#### Étape 2: Configurer la Base de Données

1. Créez une base de données MySQL:
```sql
CREATE DATABASE `hotel-db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `hotel-db`;

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reservations (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  check_in DATE NOT NULL,
  check_out DATE NOT NULL,
  guests INT NOT NULL,
  room_count INT NOT NULL,
  total_price DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
```

#### Étape 3: Lancer les Serveurs

**Terminal 1 - Frontend:**
```bash
cd frontend
php -S localhost:8000
```

**Terminal 2 - Backend:**
```bash
cd backend
php -S localhost:8001
```

#### Étape 4: Accéder à l'Application

- Frontend: http://localhost:8000
- API: http://localhost:8001/api

## 🔌 Architecture API

### Endpoints Disponibles

#### Authentification

**POST /api/auth/login**
```json
{
  "email": "user@example.com",
  "password": "password123"
}
```
Réponse:
```json
{
  "success": true,
  "message": "Login successful",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
  }
}
```

**POST /api/auth/register**
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123"
}
```
Réponse:
```json
{
  "success": true,
  "message": "Registration successful"
}
```

### Configuration de l'API

Modifiez l'URL de base dans `frontend/js/api-config.js`:

```javascript
const API_BASE_URL = 'http://localhost:8001/api';
```

## 🔐 Authentification Client

### Stockage Local
Les données utilisateur sont stockées dans `localStorage`:

```javascript
// Automatique via AuthManager
authManager.setUser(user);

// Récupérer l'utilisateur
const user = authManager.loadUser();

// Vérifier si connecté
if (authManager.isLoggedIn()) {
  // Utilisateur connecté
}

// Déconnexion
authManager.logout();
```

### Appels API
Tous les appels API utilisent la fonction helper:

```javascript
const response = await apiCall('/auth/login', 'POST', {
  email: 'user@example.com',
  password: 'password123'
});
```

## 📝 Notes Importantes

### 1. CORS
L'API backend est configurée pour accepter les requêtes CORS depuis n'importe quelle origine. En production, changez:

```php
header('Access-Control-Allow-Origin: *');
// À:
header('Access-Control-Allow-Origin: https://votre-domaine.com');
```

### 2. Sécurité des Mots de Passe
Les mots de passe sont hashés avec `password_hash()` (BCRYPT) et vérifiés avec `password_verify()`.

### 3. Différences avec Monolithique

| Aspect | Ancien | Nouveau |
|--------|--------|---------|
| **Architecture** | Monolithique (PHP) | Séparée (HTML/CSS/JS + API) |
| **Frontend** | Généré par PHP | HTML statique |
| **Communication** | Sessions PHP | API REST + localStorage |
| **Déploiement** | Un serveur | Deux serveurs (ou CDN) |
| **Performance** | Plus lent | Plus rapide |

## 🛠️ Développement

### Ajouter une Nouvelle Page Frontend

1. Créez `frontend/nouvelle-page.html`
2. Importez les fichiers CSS et JS:
```html
<link rel="stylesheet" href="css/style.css">
<script src="js/api-config.js"></script>
<script src="js/auth.js"></script>
<script src="js/main.js"></script>
```
3. Utilisez la classe `AuthManager` pour l'authentification

### Ajouter un Nouvel Endpoint API

1. Modifiez `backend/api/index.php`
2. Ajoutez une route:
```php
case '/mon-endpoint':
    if ($method === 'GET') {
        handleMonEndpoint($pdo);
    }
    break;
```
3. Implémentez la fonction:
```php
function handleMonEndpoint($pdo) {
    // Logique
    echo json_encode(['success' => true]);
}
```

## 📦 Dépendances

**Frontend:**
- Font Awesome 6.4.0 (CDN)
- Google Fonts (CDN)
- Navigateur moderne (ES6+)

**Backend:**
- PHP 7.4+
- MySQL 5.7+

## 🌐 Déploiement

### Frontend (Vercel, Netlify, etc.)

```bash
cd frontend
# Déployez le contenu sur votre hébergement statique
```

### Backend (Serveur PHP)

1. Uploadez le dossier `backend/` sur votre serveur
2. Configurez la base de données
3. Modifiez `API_BASE_URL` dans `frontend/js/api-config.js`

## 🐛 Dépannage

**Problème: CORS error**
- Solution: Vérifiez que le backend est lancé sur le bon port
- Vérifiez les headers CORS dans `backend/api/index.php`

**Problème: API retourne 404**
- Solution: Vérifiez que le PHP intégré est lancé
- Vérifiez l'URL API dans `frontend/js/api-config.js`

**Problème: Authentification ne marche pas**
- Solution: Vérifiez que la base de données est créée
- Vérifiez les connexions utilisateur dans MySQL

## 📞 Support

Pour des questions, consultez:
- Documentation PHP: https://www.php.net/docs.php
- MDN Web Docs: https://developer.mozilla.org
- Hôtel Sables d'Or: info@hoteldsablesor.com

---

**Version:** 2.0 (Architecture séparée)
**Dernière mise à jour:** Décembre 2025
