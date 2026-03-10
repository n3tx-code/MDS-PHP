### Exercice 1

Créer le fichier `dashboard.php`. Y copier-coller le tableau multidimensionnel `$salesHistory` de l'exercice 9 de ce matin et utiliser une boucle `foreach` pour lister le nom de chaque client et la valeur de sa vente. Reprendre le fichier `agent.php` (créé ce matin) et ajouter un lien HTML `<a href="dashboard.php">Voir le détail de mes ventes</a>` tout en bas de la page.

### Exercice 2

Modifier l’affichage précédent pour en faire un lien HTML cliquable. Le lien doit pointer vers `sale.php?id=` suivi de l’index de la vente dans le tableau (utiliser `$key => $sale`).

### Exercice 3

Créer le fichier `sale.php`. Y copier-coller également le tableau `$salesHistory` (qui simule notre base de données accessible partout).

### Exercice 4

Récupérer l’ID passé dans l’URL avec `$_GET['id']` et l’afficher avec un `echo`.

### Exercice 5

Sécuriser la récupération en vérifiant que le paramètre existe avec `isset()`. Afficher `Erreur` s’il n’est pas présent.

### Exercice 6

Sécuriser davantage en forçant l’ID à être un nombre entier.

### Exercice 7

Utiliser cet ID pour cibler la bonne vente et afficher toutes ses données (`clientName`, `propertyType`, `commission`). Utiliser `htmlspecialchars()` sur les chaînes de caractères pour bloquer les failles XSS.

### Exercice 8

Gérer l’erreur dans le cas où la vente n’existe pas, afficher un message d’erreur. Dans tous les cas, ajouter un lien `<a href="dashboard.php">Retour au tableau de bord</a>`.

### Exercice 9

Retourner dans `dashboard.php` et ajouter un second paramètre dans l’URL du lien : `&source=dashboard`.

### Exercice 10

Dans `sale.php`, récupérer ce paramètre `source`, nettoyer la valeur et si elle existe et qu'elle est égal à `"dashboard"`, afficher un message `Vous venez du tableau de bord` en haut de la page.