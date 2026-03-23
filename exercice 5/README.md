### Exercice 1

Dans phpMyAdmin, utilisez l’onglet **Importer** pour charger le fichier `schema.sql` fourni. Vérifiez ensuite que la base de données `real_estate` et ses 2 tables ont bien été créées.

### Exercice 2

Toujours dans phpMyAdmin, allez dans l’onglet **Insérer** de la table `agents` et ajoutez un agent manuellement.

### Exercice 3

Dans la table `properties`, insérez manuellement une nouvelle propriété. Pensez à lier cette propriété à l’agent créé précédemment en renseignant le champ `agent_id`.

### Exercice 4

Dans votre IDE, créez un fichier `property_list.php` et mettez en place la connexion PDO avec un bloc `try/catch`. Modifiez volontairement le mot de passe dans votre code pour vérifier que le `catch` intercepte et affiche bien une erreur lisible, puis rétablissez la connexion.

### Exercice 5

Dans `property_list.php`, écrivez une requête `SELECT * FROM properties`. Utilisez `$pdo->query()` et `fetchAll()` pour récupérer les données, puis affichez le titre de chaque propriété dans une liste à puces HTML.

### Exercice 6

En dessous de cette liste, créez un formulaire HTML d’ajout ciblant un nouveau fichier `add_property.php`. Ce formulaire doit envoyer les données de façon à ne pas les exposer dans l’URL. Dans le script de traitement dans `add_property.php`, nettoyez les saisies et générez des erreurs spécifiques par champ si nécessaire. Si tout est valide, construisez et exécutez votre requête d’insertion en BDD de manière dynamique. Pour terminer, utilisez une fonction PHP (à chercher dans la documentation) pour rediriger l’utilisateur vers `property_list.php` en incluant un indicateur de succès dans l’URL afin d’afficher un message de confirmation.

### Exercice 7

Créez un fichier `property.php` qui servira de page de détail d'une propriété. Ce fichier doit récupérer un paramètre `id` passé en GET dans l’URL. Nettoyez cet ID, puis récupérez la propriété correspondante en BDD via un `SELECT` ciblé. Si l’ID ne correspond à rien, affichez une erreur. Sinon, affichez les détails de l’annonce. Utiliser une fonction pour calculer le prix au m² en fonction des données de la propriété récupérée en BDD. *(L’usage de l'IA est autorisé uniquement pour générer le HTML/CSS de cette page, mais pas pour le code PHP).* 

### Exercice 8

Retravaillez le fichier `index.php` pour en faire la vitrine de l’agence. Récupérez toutes les propriétés en base de données et affichez-les sous forme de grille à 2 colonnes avec leur informations et le prix au m². Réintégrez la logique conditionnelle du premier jour pour afficher la catégorie du logement (**Luxe**, **Familiale**, **Couple**, **Étudiant**) en fonction de son prix. *(L’usage d’une IA est autorisé uniquement pour générer la grille HTML/CSS).* Ajoutez également une barre de navigation avec un menu qui permet de naviguer dans les différents fichiers créés lors des précédents exercices depuis le début du cours.

### Exercice 9

Dans un nouveau fichier `test_insert.php`, connectez-vous à la base de données. Déclarez deux variables : `$testTitle = "L'appartement";` et `$testPrice = 90000;`. Écrivez en SQL l’insertion de la donnée en concaténant ces variables directement dedans, puis exécutez l’instruction SQL. Constatez que la page affiche une erreur fatale SQL et expliquez pourquoi.