# 📚 Application de Gestion de Bibliothèque

Cette application permet de gérer une bibliothèque (livres + auteurs) via une API REST Laravel avec une interface frontend en Vue 3.

---

## 🚀 Stack Technique

| Élement       | Technologie           |
|---------------|------------------------|
| Backend       | Laravel 11             |
| Base de données | SQLite (ou MySQL)    |
| Frontend      | Vue 3 + Vue Router     |
| Build tool    | Vite                   |
| Tests         | PHPUnit (Laravel)      |
| Documentation | Laravel Scribe (OpenAPI) |

---

## ⚙️ Fonctionnalités

- 🔁 CRUD Auteurs & Livres via API REST
- 🎯 Relations Eloquent (`Auteur hasMany Livres`)
- 💡 FormRequest pour la validation des données
- 🧪 Tests unitaires et fonctionnels
- 📘 Documentation automatique de l’API
- 🎨 Interface utilisateur avec Vue 3
- 🧼 Architecture claire & réutilisable

---

## 📁 Structure du projet

```
📦 app/
├── Models/                → Modèles : Livre.php, Auteur.php
│   ├── Http/
│   │   ├── Controllers/       → LivreController, AuteurController
│   │   ├── Requests/          → Store/Update FormRequest
├── database/
│   ├── migrations/            → Tables livres & auteurs
│   ├── factories/             → Génération fake
│   ├── seeders/               → Données de démo
├── routes/
│   └── web.php                → Routes

📦 js/
├── components/                → AuteurComponent.vue, LivreComponent.vue
├── views/
│   ├── Auteur/                → Index, Store, Edit
│   ├── Livre/                 → Index, Store, Edit
├── layouts/                   → DefaultLayout.vue, Header.vue, Footer.vue
```

---

## 📡 API – Endpoints principaux

| Méthode | Endpoint             | Description                  |
|--------|----------------------|------------------------------|
| GET    | `/api/livres`        | Liste des livres             |
| POST   | `/api/livres`        | Créer un livre               |
| PUT    | `/api/livres/{id}`   | Modifier un livre            |
| DELETE | `/api/livres/{id}`   | Supprimer un livre           |
| GET    | `/api/auteurs`       | Liste des auteurs            |
| POST   | `/api/auteurs`       | Créer un auteur              |


---

## 🧪 Lancer les tests

```bash
php artisan test
```

---

## 🧰 Installation & Lancement

### Backend
```bash
git clone <repo>
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### Frontend (Vue 3)
```bash
npm install
npm run dev
```

---

## 🧠 Bonus possibles

- 🔐 Authentification (Sanctum ou Breeze)
- 🔎 Recherche par titre, auteur, prix
- 📊 Statistiques : nombre de livres par auteur
- 📄 Export PDF ou CSV des listes
- ⚠️ Gestion fine des erreurs (front et back)
- 🌍 Déploiement Docker / Railway / Vercel

---

## 📅 Auteur

Développé par **[Morgan Kpassi](https://github.com/kps-243)** – Projet d'évaluation Laravel 2025.
