ivstore
=======

Ajouter ces lignes dans httpd-vhosts.conf

<VirtualHost *:80>
	ServerName api-restful-ivstore.local
	DocumentRoot "c:/wamp64/www/ivstore/web"
	<Directory  "c:/wamp64/www/ivstore/web">
                DirectoryIndex app_dev.php
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride None
		Require all granted

                RewriteEngine On
                RewriteCond %{REQUEST_FILENAME} -f
                RewriteRule ^ - [L]
                RewriteRule ^ app_dev.php [L]
	</Directory>
</VirtualHost>

Ajouter cette lignes dans Windows\System32\drivers\etc\hosts
127.0.0.1 api-restful-ivstore.local

Et ajouter le fichier Vendor de Symfony

