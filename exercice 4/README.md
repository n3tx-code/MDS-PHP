### Exercice 1

Dans votre fichier `process_property.php`, utilisez `date_default_timezone_set('Europe/Paris')` et générez la date du jour via la fonction `date()`.

### Exercice 2
Si le formulaire ne contient aucune erreur, regroupez toutes les données nettoyées (`title`, `price`, `area`, `pricePerSqm`) ainsi que la date générée dans un seul et même tableau associatif `$newProperty`.

### Exercice 3
Ouvrez un fichier `properties.csv` en mode **ajout** (`a`). Écrivez-y votre tableau avec `fputcsv()`, puis n'oubliez pas de fermer le fichier avec `fclose()`.  
Testez votre formulaire en ajoutant **3 biens**.

### Exercice 4

Créez un tout nouveau fichier nommé `catalog.php`. Préparez-y la structure d'un tableau HTML (`<table>`, `<thead>`, `<tbody>`).

### Exercice 5
Ouvrir le fichier `properties.csv` en mode **lecture** (`r`), puis via une boucle while lire le fichier et générer dynamiquement les lignes `<tr>` et des cellules `<td>` correspondant aux **5 colonnes** sauvegardées.
Attention, pensé bien à fermer le fichier à la fin de la boucle.

### Exercice 6

Sécurisez systématiquement chaque donnée extraite du CSV avec `htmlspecialchars()` avant de l'afficher.

### Exercice 7

Dans `catalog.php`, avant d'ouvrir le fichier en lecture utiliser une fonction qui native à PHP qui permet de vérifier si un fichier existe (rechercher dans la documentation PHP)
Si le fichier n'existe pas, affichez **"Le catalogue est vide pour le moment"** au lieu du tableau.

### Bonus 1 

Toujours dans `catalog.php`, initialisez une variable `$totalProperties = 0` avant votre boucle `while`.  
Incrémentez cette variable de `1` à chaque tour de boucle.  
Sous votre tableau HTML, affichez la phrase : **"Il y a actuellement X annonces en ligne"**.

### Bonus 2

Améliorez l'aspect visuel de votre application.  
Créez un fichier `style.css` et liez-le à vos pages.
