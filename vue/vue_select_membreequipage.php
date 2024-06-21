<!-- vue/vue_select_membreequipage.php -->
<h3>Liste des membres d'équipage</h3>
<form method="post">
    <p>Filtrer par :</p>
    <select name="champ_filtre">
        <option value="Nom" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'Nom') ? 'selected' : '' ?>>Nom</option>
        <option value="Prenom" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'Prenom') ? 'selected' : '' ?>>Prénom</option>
        <option value="Role" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'Role') ? 'selected' : '' ?>>Rôle</option>
        <option value="DateEmbauche" <?= (isset($_POST['champ_filtre']) && $_POST['champ_filtre'] == 'DateEmbauche') ? 'selected' : '' ?>>Date d'Embauche</option>
    </select>
    <input type="text" name="filtre" value="<?= isset($_POST['filtre']) ? $_POST['filtre'] : '' ?>">
    <input type="submit" name="Filtrer" value="Filtrer">
    <p>Trier par :</p>
    <select name="tri">
        <option value="recentes" <?= (isset($_POST['tri']) && $_POST['tri'] == 'recentes') ? 'selected' : '' ?>>Membres les plus récents</option>
        <option value="anciennes" <?= (isset($_POST['tri']) && $_POST['tri'] == 'anciennes') ? 'selected' : '' ?>>Membres les plus anciens</option>
    </select>
    <input type="submit" name="Trier" value="Trier">
</form>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Membre Equipage</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Rôle</th>
            <th>Date d'embauche</th>
            <th>ID Vol</th>
            <th>Opération</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($lesMembresEquipage)) {
            foreach ($lesMembresEquipage as $unMembreEquipage) {
                echo "<tr>";
                echo "<td>".$unMembreEquipage['ID_MembreEquipage']."</td>";
                echo "<td>".$unMembreEquipage['Nom']."</td>";
                echo "<td>".$unMembreEquipage['Prenom']."</td>";
                echo "<td>".$unMembreEquipage['Role']."</td>";
                echo "<td>".$unMembreEquipage['DateEmbauche']."</td>";
                echo "<td>".$unMembreEquipage['ID_Vol']."</td>";
                echo "<td>";
                echo "<a href='index.php?page=7&action=sup&idmembreequipage=".$unMembreEquipage['ID_MembreEquipage']."'><img src='image/supprimer.png' height='30' width='30'></a>";
                echo "<a href='index.php?page=7&action=edit&idmembreequipage=".$unMembreEquipage['ID_MembreEquipage']."'><img src='image/editer.png' height='30' width='30'></a>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
