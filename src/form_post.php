<form action="process.php?source=formulaire" method="POST">
    <p>
        <label for="title">Titre de l'annonce :</label>
        <input type="text" id="title" name="title" required>
    </p>
    <p>
        <label for="price">Prix :</label>
        <input type="number" id="price" name="propertyPrice" required>
    </p>
    <p>
        <label for="surface">Surface du bien :</label>
        <input type="number" id="surface" name="propertySurface" required>
    </p>
    <button type="submit">Ajouter</button>
</form>
<?php