### Exercice 1

Dans `dashboard.php`, modifiez l'affichage des annonces en ajoutant à côté de chaque annonce : `<a href="edit_property.php?id=...">Modifier</a>` et `<a href="delete_property.php?id=...">Supprimer</a>`, en injectant l'`id` de l'annonce dans l'URL, pour les autres annonces affiché qu'un lien vers le détail de l'annonce.

### Exercice 2

Créez le fichier `delete_property.php`. Récupérez l'`id` passé en `GET`, puis effectuez la suppression de l'annonce correspondante via une requête préparée. Redirigez ensuite l'agent vers `dashboard.php` une fois la suppression effectuée. 

### Exercice 3

Créez le fichier `edit_property.php`. Au chargement de la page (`GET`), récupérez l'`id` en paramètre d'URL et effectuez un `SELECT` pour récupérer les données de l'annonce, puis utilisez-les pour pré-remplir les champs `value` d'un formulaire HTML. À la soumission (`POST`), traitez les données du formulaire et exécutez un `UPDATE` via une requête préparée pour enregistrer les modifications. Redirigez ensuite l'agent vers `dashboard.php` une fois la modification effectuée.

### Exercice 4

Dans `delete_property.php` et `edit_property.php`, juste avant la redirection vers `dashboard.php`, stockez un message de confirmation dans dans la session (ex : `"Annonce supprimée avec succès."`). Dans `dashboard.php`, en début de page, vérifiez votre session et affichez le message de confirmation si il existe, puis détruissez cette donnée de la session.

### Exercice 5

Protéger les page d'ajout et de modification d'annonces pour que seul les agents connectés et propriétaires des annonces puissent y accéder.

### Bonus

Restructurez l'architecture de votre projet en regroupant les fichiers par entité. Créez un dossier `/property` contenant `index.php` (liste des annonces), `add.php` (création), `update.php` (modification) et `delete.php` (suppression), ainsi qu'un dossier `/agent` pour les fichiers liés à l'agent. 

Après chaque déplacement, auditez et corrigez tous les chemins relatifs cassés : les `require_once`, les balises `<link>` pour les feuilles de style CSS, et les attributs `action` de vos formulaires HTML.
