
## Installation
1. Install dependencies
    ```bash
    composer install
    ```
    And javascript dependencies
    ```bash
    yarn install && yarn dev

    #OR

    npm install && npm run dev
    ```

2. Set up Laravel configurations
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

3. Set your database in .env

4. Migrate database
    ```bash
    php artisan migrate --seed
    ```

5. Serve the application
    ```bash
    php artisan serve
    ```

6. Login credentials

**Email:** user@gmail.com

**Password:** password
## Contributing
Feel free to contribute and make a pull request.
