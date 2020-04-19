# Simple chat using Laravel Echo


First install package  
composer
```bash
composer install
```

NPM
```bash
npm install
```
* create a database sql and set your confis in .env file

```json
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE='your database name'
DB_USERNAME='your user database'
DB_PASSWORD='your password database'
```

Run database 
```bash
php artisan migrate --seed
```

start node server mode watch
```bash
npm run development -- --watch
```

## Set configs Laravel for Echo

.env  
```json
BROADCAST_DRIVER=pusher

PUSHER_APP_ID='your id'
PUSHER_APP_KEY='your key'
PUSHER_APP_SECRET='your secret'
PUSHER_APP_CLUSTER='your cluster'
```

resources/js/bootstrap.js
```json
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'yor key',
    cluster: 'mt1',
    forceTLS: true,
    encrypted: false
});
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
