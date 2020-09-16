1. `git clone https://github.com/Pontorez/kgr`
2. `cd kgr`
3. `php -r "readfile('https://getcomposer.org/installer');" | php`
4. `php composer.phar global require "fxp/composer-asset-plugin:~1.1.1"`
5. `php composer.phar update`
6. Set database connection params in `config/db.php`
7. `./yii migrate/up`
8. `./yii serve`
9. Open http://localhost:8080/ in a web browser & log in using `admin/admin` (or register a new user)
