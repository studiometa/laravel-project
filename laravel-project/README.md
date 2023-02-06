## Prérequis

- PHP >= 7.3
- PHPCS Standard = PSR12
- Node >= 16.0
- Composer >= 2

## Installation

Cloner le dépôt :

```bash
<insérer commande ici>
```

Créer et configurer le fichier `.env` en se basant sur le fichier `.env.example.`, puis exécuter les commandes suivantes :

```bash
# Install back-end dependencies
composer install
php artisan key:generate
php artisan storage:link

# Create the database structure
php artisan migrate

# Install front-end dependencies
nvm use
npm install
```

## Développement

### Environnement de développement

Ce projet contient est pré-configuré pour fonctionner avec [ddev](https://github.com/drud/ddev), notamment pour les scripts de développement front-end. Il est fortement conseillé d'utiliser `ddev` pour le développement local.

### Laravel IDE Helper

La librairie suivante est utilisé pour générer des helpers et améliorer l'autocomplétion de l'IDE : <https://github.com/barryvdh/laravel-ide-helper>

Les commandes à utiliser pour (re)généré les helpers sont les suivantes :

```bash
# Génère la PHPDoc pour les Facades Laravel
php artisan ide-helper:generate

# Génère la PHPDoc pour les modèles
php artisan ide-helper:models --write
```

### Commandes de développement disponibles

#### Composer

| Commande            | Description                                                  |
| ------------------- | ------------------------------------------------------------ |
| `composer lint`     | Lint les fichiers PHP avec `phpcs`                           |
| `composer lint:fix` | Corrige les fichiers PHP avec `phpcbf`                       |
| `composer phpstan`  | Analyse de manière statiques les fichiers PHP avec `phpstan` |

#### DDEV

| Commande            | Descript                                                        |
| ------------------- | --------------------------------------------------------------- |
| `ddev start`        | Démarre les conteneurs ddev                                     |
| `ddev stop`         | Stoppe les conteneurs ddev                                      |
| `ddev frontend-dev` | Démarre le serveur de développement Vite dans le conteneur ddev |

#### NPM

| Commande               | Description                                 |
| ---------------------- | ------------------------------------------- |
| `npm run dev`          | Démarre le serveur de développement Vite    |
| `npm run build`        | Compile les assets avec Vite                |
| `npm run lint`         | Lint les scripts et les styles              |
| `npm run lint:styles`  | Lint les styles avec `stylelint`            |
| `npm run lint:scripts` | Lint les styles avec `eslint`               |
| `npm run fix`          | Corrige les erreurs de scripts et de styles |
| `npm run fix:styles`   | Corrige les erreurs de styles               |
| `npm run fix:scripts`  | Corrige les erreurs de scripts              |
| `npm run test`         | Lance les test unitaires avec `Jest`        |

### Gestion des pictogrammes

Pour utiliser un pictogramme déjà existant, il faut utiliser l'atome `Icon`:

```vue
<AtomsIcon name="academic-cap" />
<AtomsIcon name="academic-cap" outline />
```

Pour ajouter un nouveau pictogramme, il faut l'ajouter au tableau `icons` dans le fichier du composant `~/resources/views/components/atoms/Icon.vue`:

```diff
+ import SolidAnnotation from '~icons/heroicons-solid/annotation';
+ import OutlineAnnotation from '~icons/heroicons-solid/annotation';

  const icons = [
    // ...
+   {
+     name: 'annotation',
+     solid: SolidAnnotation,
+     outline: OutlineAnnotation,
+   },
  ];
```


## Intégration continue

Une image personnalisée a été créée pour être utilisé dans le CI.

Si une modification est faite dans le `DockerFile` il sera nécessaire d'effectuer les commandes suivantes :

```bash
# Connexion au registry.
docker login registry.gitlab.com

# Build de l'image.
docker build -t registry.gitlab.com/studiometa/napoleon .

# Envoie sur le registry.
docker push registry.gitlab.com/studiometa/napoleon
```
