# 261342 Fundamentals of Database Systems. 1/2024
# Group 24: Clothes E-commerce Website.

## Prerequisites

- Docker
- Docker Compose
- Git

## Local Development Setup

1. Clone the repository
```bash
git clone <repository-url>
cd <project-directory>
```

2. Copy the environment file
```bash
cp .env.example .env
```

3. Install Composer dependencies using Laravel Sail
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

4. Start Laravel Sail
```bash
./vendor/bin/sail up -d
```

5. Generate application key
```bash
./vendor/bin/sail artisan key:generate
```

6. Run database migrations
```bash
./vendor/bin/sail artisan migrate
```

7. Install NPM dependencies and compile assets
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

## Available Commands

### Sail Commands
- Start containers: `./vendor/bin/sail up -d`
- Stop containers: `./vendor/bin/sail down`
- Run tests: `./vendor/bin/sail test`
- Run artisan commands: `./vendor/bin/sail artisan <command>`
- Access MySQL: `./vendor/bin/sail mysql`
- Run composer commands: `./vendor/bin/sail composer <command>`
- Run npm commands: `./vendor/bin/sail npm <command>`

### Database Commands
- Run migrations: `./vendor/bin/sail artisan migrate`
- Reset database: `./vendor/bin/sail artisan migrate:fresh`
- Seed database: `./vendor/bin/sail artisan db:seed`

## Project Structure

```
├── app/                # Application core code
├── bootstrap/         # Framework bootstrap files
├── config/           # Configuration files
├── database/         # Database migrations and seeders
├── public/          # Publicly accessible files
├── resources/       # Views, raw assets, and translations
├── routes/          # Application routes
├── storage/        # Application storage
└── tests/          # Test files
```

## Testing

Run the test suite using:
```bash
./vendor/bin/sail test
```

## Environment Variables

Key environment variables that need to be set:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

-----------------------------------------------------------------------------------------------------------------------
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
