## Vault
This app was made with Laravel and (very) limited Vue.js

## Startup

#### Step 1:
`composer update`


#### Step 2:
Build the .env file

This will generate a new key for you which you can copy paste into your .env file:

`php artisan key:generate`
 
And build up the database configuration with your database settings:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=<database>
DB_USERNAME=<username>
DB_PASSWORD=<password>
 ```

The rest can be copied over from the .env-example file


#### Step 3:
`php artisan migrate`

## Optional


#### Step 4:
Make users in the database with:

```
php artisan create:account
```

#### Step 5:
If there are troubles with the scripting or styling run:

```
yarn install
```

And then:

```
gulp
```

#### Good luck!