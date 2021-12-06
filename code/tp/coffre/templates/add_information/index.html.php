<!-- Formulaire d'ajout de données -->

<h1>Formulaire d'ajout de données</h1>
<hr>
<form action="/ajouter/valider" method="POST">
  <input type="email" placeholder="Adresse email" name="info-email" /><br />
  <textarea placeholder="Données à enregistrer" name="info-data" ></textarea><br />
  <input type="text" placeholder="Clé 1" name="info-key1" ><br />
  <input type="text" placeholder="Clé 2" name="info-key2" ><br />
  <br>
  <button type="submit">Enregistrer</button>
</form>