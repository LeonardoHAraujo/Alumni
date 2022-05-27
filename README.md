# Alumni Antebellum

*Powered by Leonardo Araújo*

    run git clone https://github.com/LeonardoHAraujo/Alumni.git
    run composer update for installing dependencies
    create a new database laravel
    run php artisan key:generate
    run php artisan migrate
    run php artisan serve


## Deploy app

    In requests ajax of the JS, add prefix "/Alumni/public" in field "url".
        Example => url: "/Alumni/public/reactivateUsers"

    Rename server.php to index.php

    create a file .htaccess and paste the content below:

        RewriteEngine On

        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^(.*)/$ /$1 [L,R=301]

        RewriteCond %{REQUEST_URI} !(\.css|\.js|\.png|\.jpg|\.gif|robots\.txt)$ [NC]
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ index.php [L]

        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_URI} !^/public/
        RewriteRule ^(assets|plugins|vendor|css|js|images|newIcons)/(.*)$ public/$1/$2/$3 [L,NC]
