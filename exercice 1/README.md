### Exercice 1 : fichier de base

Créer un nouveau fichier `agent.php` et y afficher un titre de niveau 1 en HTML :

### Exercice 2 : variables et concaténation

Dans `agent.php` :

- **Déclarer** trois variables : `$agentName`, `$yearsExperience`, `$totalSales`.
- **Affecter** des valeurs à ces variables.
- **Afficher** une phrase de présentation en concaténant ces variables.

### Exercice 3 : condition if / else

À partir de la variable `$yearsExperience` :

- **Afficher** `Agent Senior` si l’expérience est strictement supérieure à 5 ans.
- Sinon, **afficher** `Agent Junior`.

### Exercice 4 : boucle while et bonus

L’agent obtient un bonus mensuel à partir de **5 000€** de commissions.

- Initialiser une variable `$totalCommission` à `0`.
- Initialiser une variable `$contractsCount` à `0`.
- Fait une boucle `while` qui calcul le nombre de contrat signés nécessaire pour atteinre le bonus. 
  - Dans la boucle `while`générer une commission aléatoire avec `rand(500, 1500)`.
  - L’ajouter à `$totalCommission`.
  - Incrémenter `$contractsCount`.
- À la fin de la boucle, **afficher** le nombre de contrats signés nécessaires pour atteindre le bonus.

### Exercice 5 : boucle for – étoiles de performance

Afficher **3 étoiles de performance** `★` en utilisant une boucle `for` qui s’exécute 3 fois.

### Exercice 6 : tableau indexé – secteurs géographiques

- Créer un tableau indexé `$sectors` contenant au moins 4 secteurs géographiques, par exemple : `"Lyon Centre"`, `"Villeurbanne"`, `"Lyon Part-Dieu"`, `"Lyon Confluence"`.
- Afficher uniquement **le premier secteur** du tableau (le secteur favori de l’agent).

### Exercice 7 : boucle foreach – liste HTML des secteurs

Utiliser le tableau `$sectors` de l’exercice précédent pour **générer une liste HTML** `<ul>` contenant tous les secteurs.

### Exercice 8 : tableau associatif – dernière vente

Créer un tableau associatif `$lastSale` représentant la dernière vente réalisée par l’agent, avec les clés :

- `clientName`
- `propertyType`
- `commission`

### Exercice 9 : tableau multidimensionnel – historique des ventes

Créer un tableau indexé `$salesHistory` contenant les **3 dernières ventes** de l’agent.

- Chaque élément de `$salesHistory` est un tableau associatif avec les clés :
  - `clientName`
  - `propertyType`
  - `commission`
  - `saleValue`

### Exercice 10 : tableau HTML des ventes récentes

À partir du tableau `$salesHistory` de l’exercice précédent :

- Générer un tableau HTML `<table>` affichant les ventes récentes.
- Chaque ligne du tableau doit contenir :
  - le nom du client,
  - le type de bien,
  - la commission,
  - la valeur de la vente.

