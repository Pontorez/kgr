1. ```git clone https://github.com/Pontorez/kgr```
2. ```cd kgr```
3. ```php -r "readfile('https://getcomposer.org/installer');" | php```
4. ```./composer.phar global require "fxp/composer-asset-plugin:~1.1.1"```
5. ```./composer.phar install```
6. Set database connection params in ```config/db.php```
7. ```./yii migrate/up```
8. configure new web server vhost with document root pointing to ```web``` folder
9. open new vhost in browser & log in using ```admin/admin``` (or create a new user)
