<?php require'fonctions.php';
$erreurs  = [];
$succes   = false;
$prenom   = '';
$nom      = '';
$email    = '';
$message  = '';
$succes = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $prenom = nettoyer($_POST['prenom'] ?? '');
   $nom     = nettoyer($_POST['nom']     ?? '');
   $email   = nettoyer($_POST['email']   ?? '');
   $message = nettoyer($_POST['message'] ?? '');
 
   if (!champ_requis($prenom)){  $erreurs[] = 'Le prénom est obligatoire.';}
   if (!champ_requis($nom))     {$erreurs[] = 'Le nom est obligatoire.';}
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $erreurs[] = 'L\'adresse e-mail est invalide.';}
   if (!champ_requis($message)) {$erreurs[] = 'Le message ne peut pas être vide.';}
 
   if (empty($erreurs)) {
       $succes = true;
   }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>    
<?php require 'composants/navigation.php'; ?>
<main>
    <header>
        <div class="search-bar">
            <input type="text" placeholder="🔍 Rechercher...">
        </div>
        <h1>Contact</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="about.php">À propos</a>
            <a href="projets.php">Projets</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <section class="center">
        <h2>Contactez-moi</h2>
<?php if ($succes): ?>
    <p class="success">Votre message a été envoyé avec succès !</p>
<?php endif; ?>
        <form method="POST">
            <input type="text" placeholder="Prénom" required>
            <input type="text" placeholder="Nom" required>
            <input type="email" placeholder="Email" required>
            <select name="sujet" id="sujet">
                <option value="">Sélectionnez un sujet</option>
                <option value="information">Demande d'information</option>
                <option value="projet">Demande de projet</option>
                <option value="autre">Autre</option>
            </select>
            
            <textarea placeholder="Votre message..." rows="5" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </section>


    <h2>Demande de projet</h2>
    <?php
if (isset($_POST['demande_projet'])) {
   $demande = [
       'nom'         => nettoyer($_POST['nom']         ?? ''),
       'email'       => nettoyer($_POST['email']       ?? ''),
       'type_projet' => nettoyer($_POST['type_projet'] ?? ''),
       'description' => nettoyer($_POST['description'] ?? ''),
       'budget'      => nettoyer($_POST['budget']      ?? ''),
   ];
}
?>
    <form class="form-contact">
    
        <input type="text" placeholder="Votre nom" required>
    
        <input type="email" placeholder="Votre email" required>
    
        <input type="text" placeholder="Sujet du projet">
    
        <textarea placeholder="Décrivez votre projet..." rows="5"></textarea>
    
        <button type="submit">Envoyer</button>
    
    </form>
    <h1>Contact</h1>
    
    <p>Email :<a href="mailto:nianemamanaminata21@gmail">nianemamanaminata21@gmail.com</a></p>
    <p>Telephone:+221 70 506 38 07</p>
    <p><Address>Zac Mbao,cité Sagef</Address></p>
  

</main>
<?php require 'composants/pied-de-page.php'; ?>
</body>
<footer>

    <div class="socials">
        <h2>Réseaux sociaux</h2>
        <a href="https://www.instagram.com/n.maaminata?igsh=aXNidTNzM2w1MDZu&utm_source=qr"><img
                src="images/logo insta.jpeg" alt="Instagram" width="50px"></a>
        <a href="https://wa.me/705063807"><img src="images/logo whatsapp.jpeg" alt="WhatsApp" width="50px"></a><br>
        <a href="https://www.tiktok.com/@so.mina1?_r=1&_t=ZS-95LHyIrwSag"><img src="images/logo tiktok.jpeg" alt="TikTok"
                width="50px"></a>
        <a href="https://github.com/dashboard" target="_blank"><img src="images/logo gitup.jpeg" alt="GitHub"
                width="50px"></a>
    
    </div>

  </footer> 

</html>