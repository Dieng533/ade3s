# ADE3S – Site web

Site vitrine moderne et responsive pour l'ADE3S (Saint-Louis, Sénégal).

## Stack
- Bootstrap 5, Font Awesome
- HTML/CSS/JS statique
- PHP (formulaire de contact)
- MySQL (schéma fourni)

## Démarrage rapide
1. Ouvrir `index.html` dans un navigateur pour voir la version statique.
2. Pour le formulaire de contact:
   - Installer PHP et MySQL (XAMPP/WAMP/MAMP ou serveur).
   - Importer `server/schema.sql` dans MySQL.
   - Configurer les variables d'environnement:
     - `ADE3S_DB_HOST`, `ADE3S_DB_NAME`, `ADE3S_DB_USER`, `ADE3S_DB_PASS`.
   - Servir le dossier via PHP/Apache (ex: `http://localhost/ade3s/`).
   - Le formulaire envoie vers `server/contact.php` et enregistre dans `messages_contact`.

## Structure
- `index.html` (Accueil)
- `about.html`, `actions.html`, `projects.html`, `blog.html`, `donate.html`, `contact.html`
- `assets/css/styles.css` (thème vert/noir)
- `assets/js/main.js` (messages dynamiques)
- `assets/img/...` (images à ajouter)
- `server/contact.php` (backend contact)
- `server/schema.sql` (base de données)

## Personnalisation
- Remplacer les images dans `assets/img/*`.
- Mettre les liens Facebook/WhatsApp réels.
- Compléter les infos bancaires (donations).

