## GO IN PROD
```
//install
rm -r -f composer.lock
rm -r -f package-lock.json 
npm install
composer install
php artisan migrate
npm run prod

```

## GO IN FRESH DEV/PROD - WARNING
```
//fresh install
rm -r -f composer.lock
rm -r -f package-lock.json 
npm install
composer install
php artisan migrate:fresh
npm run prod

```
