<h1 align="center">
  🍼 Post-partum
</h1>

<p align="center">
  Une plateforme d'information bienveillante autour du post-partum, développée avec ❤️ en Symfony.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Status-Approved-green?style=for-the-badge&logo=checkmarx" alt="Status" />
  <img src="https://img.shields.io/badge/Symfony-6.x-black?style=for-the-badge&logo=symfony" alt="Symfony" />
  <img src="https://img.shields.io/badge/PHP-%3E=8.2-blue?style=for-the-badge&logo=php" alt="PHP" />
  <img src="https://img.shields.io/badge/MySQL-required-orange?style=for-the-badge&logo=mysql" alt="MySQL" />
</p>

---

## ✨ Présentation

**Post-partum Blog** est une application web développée avec le framework **Symfony**, visant à centraliser des **articles**, **événements** et **ressources** sur le post-partum, la parentalité et le bien-être. Ce projet a été présenté avec succès devant un jury pour la validation du **diplôme Graduate Web et Web/Mobile**.

## 🚀 Fonctionnalités principales

- 📝 **Gestion de contenu** - Création et gestion d'articles par catégories
- 📅 **Événements** - Ajout et affichage d'événements communautaires
- 💬 **Interactions** - Système de commentaires intégré
- 👤 **Utilisateurs** - Authentification et gestion des profils
- 🛠️ **Administration** - Interface complète via EasyAdmin
- ✉️ **Contact** - Formulaire avec envoi d'e-mails
- 📱 **Responsive** - Design adapté à tous les appareils
- 📁 **Médias** - Gestion des fichiers avec VichUploaderBundle

## 🧠 Compétences couvertes par le projet

### 🎨 Développement Front-end

#### Maquettage et conception UX
- Élaboration de wireframes basés sur les Users Stories
- Définition d'une charte graphique cohérente
- Approche centrée utilisateur

#### Interface utilisateur adaptative
- 📱 **Mobile First** pour une expérience fluide
- 🎯 Navigation intuitive avec mise en page aérée
- ⏱️ Performance optimisée pour des utilisateurs pressés

#### Dynamisation de l'interface
- JavaScript pour les interactions utilisateur
- Moteur de template **Twig** pour le rendu
- **Bootstrap** pour la structure responsive
- **AssetMapper** de Symfony 7 pour l'optimisation des assets

#### Intégration avec le back-end
- Filtres dynamiques pour les articles
- Système de commentaires interactif
- Authentification sécurisée

### 🖥️ Développement Back-end

#### Architecture de données
- Conception basée sur la **méthode MERISE** (MCD, MLD, MPD)
- Modélisation structurée pour garantir l'intégrité des données

#### Accès aux données
- Utilisation de l'ORM **Doctrine** pour l'abstraction de la base de données
- Migration et versioning du schéma de données

#### Architecture applicative
- Pattern **MVC** avec Symfony
- Routes sécurisées
- Templating structuré avec Twig
- Gestion fine des entités et relations

#### Administration
- Intégration d'**EasyAdmin** pour une gestion simplifiée
- Interface administrateur intuitive
- Gestion des droits d'accès

## 🛠️ Technologies utilisées

### Front-end
<p align="center">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original.svg" alt="HTML5" width="50" height="50"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original.svg" alt="CSS3" width="50" height="50"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/bootstrap/bootstrap-original.svg" alt="Bootstrap" width="50" height="50"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg" alt="JavaScript" width="50" height="50"/>
</p>

### Back-end
<p align="center">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg" alt="PHP" width="50" height="50"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/symfony/symfony-original.svg" alt="Symfony" width="50" height="50"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original-wordmark.svg" alt="MySQL" width="50" height="50"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/composer/composer-original.svg" alt="Composer" width="50" height="50"/>
</p>

## 🗂️ Structure du projet

```
post_partum/
├── src/               # Code source de l'application
│   ├── Controller/    # Contrôleurs de l'application
│   ├── Entity/        # Modèles et entités Doctrine
│   ├── Form/          # Formulaires Symfony
│   ├── Repository/    # Repositories pour l'accès aux données
│   └── DataFixtures/  # Jeu de fausses données pour les tests
├── templates/         # Templates Twig (vues)
├── public/            # Assets publics accessibles
│   ├── css/           # Feuilles de style
│   ├── js/            # Scripts JavaScript
│   └── images/        # Images et médias
├── migrations/        # Migrations de base de données
├── config/            # Configuration de l'application
└── vendor/            # Dépendances (gérées par Composer)
```

## ⚙️ Installation

### Prérequis
- PHP >= 8.2
- Composer
- Symfony CLI
- MySQL ou MariaDB

### Étapes d'installation

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/Jonathan-Saenger/Post_partum.git
   cd Post_partum
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer l'environnement**
   ```bash
   # Copier le fichier d'environnement
   cp .env .env.local

   # Éditer .env.local pour configurer la base de données
   # DATABASE_URL="mysql://user:password@127.0.0.1:3306/post_partum?serverVersion=8.0"
   ```

4. **Créer la base de données**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

5. **Charger les fixtures (optionnel)**
   ```bash
   php bin/console doctrine:fixtures:load
   ```

6. **Démarrer le serveur de développement**
   ```bash
   symfony server:start
   ```

7. **Accéder à l'application**
   L'application est maintenant accessible à l'adresse: [http://localhost:8000](http://localhost:8000)

## 📸 Aperçu de l'application

<p align="center">
  <img src="public/images/annexes/maquette_accueil.png" alt="Page d'accueil" width="600"/>
  <br />
  <em>Page d'accueil</em>
</p>

<p align="center">
  <img src="public/images/annexes/image_principale_post_partum.png" alt="Image principale" width="600"/>
  <br />
  <em>Bannière principale de l'application</em>
</p>

<p align="center">
  <img src="public/images/annexes/maquette_formulaire_contact.png" alt="Formulaire de contact" width="600"/>
  <br />
  <em>Formulaire de contact</em>
</p>

<p align="center">
  <img src="public/images/annexes/maquette_blog.png" alt="Section blog" width="600"/>
  <br />
  <em>Section blog avec filtres dynamiques</em>
</p>

## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à ouvrir une issue ou à soumettre une pull request.

---

<p align="center">
  <em>Développé avec ❤️ par Jonathan Saenger</em>
</p>
