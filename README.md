Getting started:
1. Clone the project
2. run `cp .env.example .env`
3. read the sail documentation: https://laravel.com/docs/9.x/sail

- dont forget to configure a shell alias for sail
- make sure to change db host to mysql


Running the project:
1. create an alias in `~./bashrc` or `~./zshrc`: `alias=vendor/bin/sail`
2. run `sail up -d`
3. run `sail npm run dev`
