### Exercice 1

Créer un fichier `add_property.php` contenant un formulaire HTML complet qui envoie les données en **POST** vers le fichier `process_property.php`.  
Le formulaire doit contenir :
- un titre
- un prix
- une surface
- une sélection de quartier (balise `<select>`)
- un bouton de soumission

### Exercice 2

Créer le fichier `process_property.php` et utiliser `var_dump($_POST);` à l'intérieur pour visualiser les données brutes envoyées par le formulaire.

### Exercice 3

Dans `process_property.php`, remplacer le `var_dump($_POST);` par une condition `isset()` pour vérifier que les champs du formulaire existent bien avant de les utiliser.

### Exercice 4

Créer une fonction PHP `cleanData($input)` qui :
- supprime les espaces inutiles
- neutralise le code HTML (XSS)  

La fonction doit retourner la donnée nettoyée.

### Exercice 5

Appliquer la fonction `cleanData()` à toutes les variables récupérées depuis `$_POST` avant de les utiliser ou de les afficher.

### Exercice 6

Ajouter une vérification avec `empty()` pour s'assurer que les champs ne sont pas vides.  
Si un champ est vide, afficher le message :  
`Erreur : le champ X est vide` (remplacer `X` par le nom du champ concerné).

### Exercice 7

Utiliser `intval()` pour forcer le **prix** à être un nombre entier. Pour la **surface**, utiliser floatval() pour convertir la valeur en nombre décimal.
Vérifier que la surface ou le prix convertie est **strictement supérieure à 0** ; sinon, retourner un message d'erreur approprié.

### Exercice 8

Dans `process_property.php`, déclarer un tableau `$allowedDistricts` contenant les mêmes quartiers que votre balise `<select>`.  
Utiliser la fonction `in_array()` pour vérifier que le quartier reçu par le formulaire fait bien partie de cette liste autorisée.

### Exercice 9

Créer une variable `$pricePerSqm` qui calcule le **prix au m²** à partir du prix total et de la surface.

### Exercice 10

Si toutes les vérifications sont valides, afficher un message final :  
`Annonce ajoutée : [Titre], [Prix] €, [Surface] m² (Prix au m² : [Prix au m²] €/m²)`.

### Exercice 11 (Refactorisation)

Au lieu d'afficher les messages d'erreur au fur et à mesure, créer un tableau `$errors = [];`.  
Ajouter chaque message d'erreur dans ce tableau.  
À la fin du script :
- si le tableau `$errors` est **vide**, afficher le message de succès de l'exercice 10
- sinon, boucler sur `$errors` pour afficher la liste complète des problèmes rencontrés.
