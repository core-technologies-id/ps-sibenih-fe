# Running Seeders
You may execute the db:seed Artisan command to seed your database. By default, the db:seed command runs the Database\Seeders\DatabaseSeeder class, which may in turn invoke other seed classes. However, you may use the --class option to specify a specific seeder class to run individually:

```
php artisan db:seed
php artisan db:seed --class=UserSeeder
```

You may also seed your database using the migrate:fresh command in combination with the --seed option, which will drop all tables and re-run all of your migrations. This command is useful for completely re-building your database. The --seeder option may be used to specify a specific seeder to run:

```
php artisan migrate:fresh --seed
php artisan migrate:fresh --seed --seeder=UserSeeder
```
