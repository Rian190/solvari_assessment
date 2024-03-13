Getting started:
1. Clone the project
1. read the sail documentation: https://laravel.com/docs/11.x/sail

- dont forget to configure a shell alias for sail
- If you dont, you can use `vendor/bin/sail` instead of `sail`

Running the project:
- sail up -d
- sail php artisan migrate:fresh --seed
- The admin bearer token is printed to your console.
- visit [localhost/api/info](http://localhost/api/info) for more details on the api

Running the tests:
- sail test
