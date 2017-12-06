## About This as yet unnamed CMS

It will make WordPress disappear from my workflow yay!

- git clone
- cd whatever directory you cloned it into
- composer install
- vendor/bin/homestead make
- change your DB settings if you want in .env
- vagrant up
- php artisan migrate
- php artisan db:seed (This creates one Faker user for each Role you create, watch console for login details)
- yarn

** ToDo
- Make a default admin account that isn't a Faker account


