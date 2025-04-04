FROM php:8.1-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Activer le module de réécriture d'URL d'Apache
RUN a2enmod rewrite

# Copier les fichiers de l'application
COPY . /var/www/html/

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html/

# Exposer le port 80
EXPOSE 80

# Commande de démarrage
CMD ["apache2-foreground"]

