1. ```git clone https://github.com/Pontorez/kgr```
2. ```cd kgr```
3. ```php -r "readfile('https://getcomposer.org/installer');" | php```
4. ```./composer.phar install```
5. Set database connection params in ```config/db.php```
6. ```./yii migrate/up```
7. configure new web server vhost with document root pointing to ```web``` folder
8. open new vhost in browser & log in using ```admin/admin``` (or create a new user)
