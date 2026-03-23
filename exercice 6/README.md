### Exercice 1

Créez un fichier `database.php` à la racine de votre projet. Déplacez-y la connexion PDO que vous aviez écrit ce matin. Ensuite importez `database.php` en haut de tous les fichiers qui ont besoin de communiquer avec MySQL. Vérifiez que votre site fonctionne toujours.

### Exercice 2

Créez un fichier `functions.php`. Déplacez à l'intérieur la fonction de nettoyage des données (par exemple `cleanData()`) ainsi que celle qui calcule le prix au mètre carré. Importez ce fichier avec `require_once` partout où ces calculs ou nettoyages sont nécessaires. Vérifiez que votre site fonctionne toujours.

### Exercice 3

Reprenez tous les fichiers créés ce matin impliquant des variables utilisateurs envoyées en `GET` et utiliser dans des requêtes SQL. Remplacez systématiquement toutes les requêtes SQL utilisant la concaténation par des requêtes sécurisées utilisant `prepare()` et `execute()`.

### Exercice 4

Créez `agent_list.php`. Affichez la liste des agents et ajoutez des boutons permettant de filtrer les résultats via un paramètre `GET` nommé `seniority`. Les critères sont : Junior (moins de 2 ans), Confirmé (2 à 5 ans), Sénior (plus de 5 ans). La requête SQL doit être sécurisée et adaptée selon le choix de l'utilisateur. Utiliser la fonction `prepare()` et `execute()` pour les requêtes SQL.

### Exercice 5

Créez `agent.php`. Cette page doit afficher les informations complètes d'un agent via son ID passé dans l'URL. Gérez proprement les cas où l'ID est absent ou ne correspond à aucun enregistrement en base de données. On doit retrouver les informations de l’agent, mais aussi toutes les propriétés où il est responsable. Utiliser la fonction `prepare()` et `execute()` pour les requêtes SQL.

### Exercice 6

Importez le script SQL fourni avec l’exercice. Ce script va créer une table `agencies` (`id`, `name`) ainsi qu'une table de liaison `agencies_districts` (`agency_id`, `district_id`). Cette nouvelle structure permet à une agence d'intervenir sur plusieurs quartiers simultanément.

### Exercice 7

Développez un formulaire `add_agency.php` permettant de créer une agence. Pour l'affectation des quartiers, utilisez une liste de cases à cocher (`checkbox`) générée dynamiquement à partir de la table `districts`. Le traitement PHP devra récupérer ce tableau d'identifiants, insérer l'agence, puis boucler sur les quartiers sélectionnés pour remplir la table de liaison via des requêtes préparées. Utiliser la fonction `prepare()` et `execute()` pour les requêtes SQL. 

### Exercice 8

Créez `agency.php`. Affichez les informations de l'agence (nom et quartiers) à partir de son ID passé en `GET`. Sur cette même page, listez toutes les propriétés situées dans l'un des nombreux quartiers couverts par l'agence ainsi que les agents liés à cette agence.

### Exercice 10

Développez l'interface `agency_list.php` pour présenter l'ensemble des agences du réseau. Intégrez un lien de navigation vers cette nouvelle page dans votre menu principal. Ajouter un bouton pour rediriger vers la page d'ajout d'une agence.

### Exercice 11

Optimisez l'expérience utilisateur sur la page d'accueil (`index.php`) en y ajoutant une section dédiée aux agences. Chaque agence listée doit permettre un accès direct à sa fiche détaillée via un lien interactif.
