# Plateforme de gestion des offres d’emploi

Une plateforme moderne de gestion d'offres d'emploi connectant recruteurs et candidats, développée avec Laravel 12 et Tailwind CSS 4.

## 🚀 Fonctionnalités

### 👤 Rôles Utilisateurs
- **Admin** :
  - Dashboard global
  - Gestion des utilisateurs (Recruteurs, Candidats)
  - Modération des offres d'emploi (Validation)
  - Gestion des candidatures
- **Recruteur** :
  - Publication d'offres d'emploi
  - Gestion de ses propres offres
- **Candidat** :
  - Consultation des offres
  - Postulation aux offres
  - Suivi des candidatures

### 🛠 Tech Stack
- **Backend** : Laravel 12 (PHP 8.2+)
- **Frontend** : Blade Templates, Tailwind CSS 4, Alpine.js
- **Build Tool** : Vite
- **Database** : SQLite (par défaut) / MySQL compatible

## 📦 Installation

1. **Cloner le projet**
   ```bash
   git clone <votre-url-de-repo>
   cd "Plateforme de gestion des offres d’emploi"
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances NPM**
   ```bash
   npm install
   ```

4. **Configurer l'environnement**
   Copiez le fichier d'exemple et générez la clé d'application :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Base de données**
   Assurez-vous que le fichier SQLite existe (ou configurez MySQL dans `.env`) :
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```
   *Le flag `--seed` créera des utilisateurs de test (Admin, Recruteur, Candidat).*

6. **Lancer l'application**
   Dans deux terminaux séparés :
   ```bash
   npm run dev
   ```
   ```bash
   php artisan serve
   ```

## 🔑 Accès par défaut (Seeders)

Si vous avez utilisé `--seed`, voici les comptes de test générés (vérifiez `database/seeders` pour plus de détails) :

- **Admin** : `admin@example.com` / `password`
- **Recruteur** : `recruiter@example.com` / `password`
- **Candidat** : `candidate@example.com` / `password`

## 📜 Licence

Ce projet est sous licence MIT.
