## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/ilham-s-saksena/backend_pencil.git
   cd backend_pencil
   ```
2. Install dependencies via Composer:
   ```bash
   composer install
   ```
3. Copy `.env.example` to `.env` and configure your database and other necessary environment variables:
   ```bash
   cp .env.example .env
   ```
4. Generate the application key:
   ```bash
   php artisan key:generate
   ```
5. Run database migrations and seed the database with test data:
   ```bash
   php artisan migrate --seed
   ```

5. Run database migrations and seed the database with test data:
   ```bash
   php artisan serve
   ```
