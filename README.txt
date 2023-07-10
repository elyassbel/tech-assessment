## Technical Assessment for Tool4Staffing
### Elyass Belahcen

---
**PHP : 7.4**

**jQuery : 3.7.0**

---
### Structure de l'application

``index.php`` : Contient le HTML et le fichier principal .js de l'application (situé dans ``public/js/app.js``) 

``app.php`` : Script PHP appelé en Ajax, il est responsable d'appeler le bon script contenu dans le répertoire ``customs``. Il joue le rôle d'un routeur.

``Manager/AppManager.php`` : C'est ici que se trouve la logique de récupération du bon script, de création des cookies et effectue quelques vérifications

---
Pour la logique d'affichage des véhicules, j'ai choisi de mettre en place un "Decorator". L'objectif est d'avoir une classe principale qui contient le comportement par défaut, puis chaque client aura sa propre classe "customs" qui vient "décorer" les fonctions par défaut en y ajoutant des fonctionnalités spécifiques.

``Manager/CarViewInterface.php`` : Interface, déclaration des fonctions

``Manager/DefaultCarView.php`` : Classe concrète qui implémente l'interface et contient la logique par défaut

``Manager/CarViewDecorator.php`` : Mise en place du Decorator

``customs/modules/[module]/CarViewX.php`` : Chaque client a son propre décorateur si des vues personnalisées sont requises, sauf pour le client C qui n'en a pas besoin.

``customs/modules/[module]/[script]/ajax.php | edit.php`` : Affichage personnalisé de chaque client

---
### Etape 6

Problèmes potentiels de sécurité et solutions : 
- Utilisation de cookie pour les espaces clients : Utiliser des sessions PHP à la place avec un système de login/mdp.
- Stockage des données dans ``data/[file].json`` : Sécuriser l'accès aux fichiers de données via un fichier ``.htaccess`` ou en plaçant les fichiers en dehors du dossier racine du site web (par exemple, dans ``/etc/$/``). Sinon, utiliser une base de données.
- Attaque XSS, injection de code JS : Utiliser des fonctions PHP telles que ``htmlspecialchars`` ou ``htmlentities``.
- Utilisation de tokens qui changent à chaque connexion pour empêcher les attaques CSRF

