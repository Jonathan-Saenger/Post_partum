<h1 align="center">
  🍼 Post-partum Blog
</h1>

<p align="center">
  Une plateforme d’information bienveillante autour du post-partum, développée avec ❤️ en Symfony.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Status-Approved-green?style=flat-square&logo=checkmarx" alt="Status" />
  <img src="https://img.shields.io/badge/Symfony-6.x-black?style=flat-square&logo=symfony" alt="Symfony" />
  <img src="https://img.shields.io/badge/PHP-%3E=8.2-blue?style=flat-square&logo=php" alt="PHP" />
  <img src="https://img.shields.io/badge/MySQL-%20required-orange?style=flat-square&logo=mysql" alt="MySQL" />
</p>

---

## ✨ Présentation

🎯 **Post-partum Blog** est une application web développée avec le framework **Symfony**, visant à centraliser des **articles**, **événements** et **ressources** sur le post-partum, la parentalité et le bien-être. Ce projet a été présenté avec succès devant un jury pour la validation du **diplôme Graduate Web et Web/Mobile**.

---

## 🚀 Fonctionnalités principales

- 📝 Création et gestion d’**articles** par catégories
- 📅 Ajout et affichage d’**événements**
- 💬 Système de **commentaires**
- 👤 **Authentification** & gestion des utilisateurs
- 🛠️ Interface d’administration via **EasyAdmin**
- ✉️ Formulaire de **contact avec envoi d’e-mails**
- 📱 Design **responsive** et mobile-friendly
- 📁 Gestion des fichiers uploadés avec **VichUploaderBundle**

---

## 🗂️ Structure du projet

```bash
├── src/              # Contrôleurs, entités, formulaires, fixtures, repository
├── templates/        # Fichiers Twig (front-end)
├── public/           # Assets publics (CSS, JS, images)
├── migrations/       # Fichiers Doctrine migrations
├── config/           # Configuration Symfony
```

## ⚙️ Installation

### 🧰 Prérequis

- PHP `>= 8.1`
- Composer
- Symfony CLI
- MySQL / MariaDB

---

### 📦 Étapes d'installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/Jonathan-Saenger/Post_partum.git
   cd Post_partum
   ```
2. **Installer les dépendances**
   ```bash
   commposer install
   ```
3. **Configurer l'environnement**
Copier le fichier .env en .env.local et configurez votre base de données

4. **Créer et migrer la base de données**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```
5. **Lancer le serveur Symfony**
   ```bash
   symfony server:start
   ```
6. Démo & Captures
