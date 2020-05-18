<p>Télécharger via git le projet avec la commande: git clone https://github.com/ilhame5/ProjetPhp.git                            

Installer composer

Renseigner des informations de configuration

-Copiez-collez ou renommez le fichier « .env » et renseignez les informations de connexion à votre base de données
            DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=nom_de_la_base
            DB_USERNAME=utilisateur
            DB_PASSWORD=mot_de_passe
            
Vous devrez utiliser la commande composer install --ignore-platform-reqs pour installer les paquets requis au projet et composer update pour les mettre à jour.
Exécutez la commande : php artisan key:generate

Création de la base de données (avec /sans les données):
 -Sans les données  Exécutez la commande : “php artisan migrate“

Pour inserer l'admin dans la table teachers, executez: "php artisan db:seed --class=DatabaseSeeder"
