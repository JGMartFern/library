I used XAMPP with Apache and MySQL, which is the default database and it's configured to work with the project. The database can be reviewed with phpMyAdmin.

To create and populate the database automatically, it's needed to execute the following command in the terminal:

php artisan migrate --seed

From there, we will have something to work with in localhost

As a previous step in case we introduced any changes, we introduce in the terminal:

npm run build

If everything is correct or if we didn't make changes since last time, we can run the project using the command:

php artisan serve

At this point, we can go straight to localhost:8000 and get to the landing page.
