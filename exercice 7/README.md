### Exercice 1

Importer le script SQL fourni dans votre base de données. Créer le fichier `init_admin.php` dont le seul but est d'insérer le premier agent en base avec un mot de passe haché. Ce script doit d'abord vérifier si un agent existe déjà en base de données. Si c'est le cas, afficher un message d'erreur et bloquer l'exécution avec `exit;` sinon créer l'agent avec le mot de passe haché.

### Exercice 2

Créer le fichier `login.php` comme page de connexion avec un champ email et un champ mot de passe. En cas de succès, ouvrir la session et rediriger l'utilisateur vers le tableau de bord. En cas d'échec, afficher un message d'erreur.

### Exercice 3

Créer le fichier `add_agent.php` permettant d'ajouter un nouvel agent. Si l'utilisateur est connecté, afficher le formulaire d'ajout. Sinon, afficher un message d'erreur et bloquer le rendu du formulaire.

### Exercice 4

Créer le fichier `session.php` contenant uniquement la logique de vérification de session (redirection vers `login.php` si l'utilisateur n'est pas connecté). Inclure ce fichier tout en haut de toutes les pages nécessitant une session sécurisée.

### Exercice 5

Sur la page du tableau de bord, afficher un message de bienvenue personnalisé tel que `Bonjour [Nom de l'agent]`. Cette information doit être récupérée depuis la session.

### Exercice 6

Modifier le menu de navigation principal. Si une session est active, afficher les liens d'administration (`Ajouter un bien`, `Ajouter une agence`) ainsi qu'un bouton `Déconnexion`. Si aucune session n'est active, masquer ces liens et afficher à la place un lien `Connexion`.

### Exercice 7

Dans `login.php`, ajouter une vérification tout en haut du script : si l'utilisateur possède déjà une session active, le rediriger automatiquement vers la page d'accueil afin d'éviter qu'un utilisateur connecté accède à nouveau à la page de connexion.

### Exercice 8

Créer le fichier `logout.php` qui détruit la session (chercher la fonction appropriée dans la documentation officielle de PHP) et redirige l'utilisateur vers la page de connexion.
