# Medium Clone

A modern blogging platform built with **Laravel 12**, **Tailwind CSS**, and **Alpine.js**. This application allows users to create, read, update, and delete posts, as well as follow other users and clap for posts they like.

## Features

- **Authentication**: Secure user registration, login, and password management powered by Laravel Breeze.
- **Post Management**:
  - Create, read, edit, and delete posts.
  - Rich text support (if applicable, based on standard blog features).
  - Slug-based URLs for SEO-friendly links (e.g., `/@username/post-slug`).
  - Categorize posts for better organization.
- **Social Interaction**:
  - **Follow System**: Follow other authors to see their latest content.
  - **Clap System**: Like and appreciate posts with claps.
- **User Profiles**:
  - Public profiles displaying user bio and posts.
  - Dashboard to manage your own content.
- **Responsive Design**: Mobile-friendly interface built with Tailwind CSS.

## Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade Templates, Tailwind CSS, Vite
- **Database**: MySQL / SQLite
- **Dependencies**:
  - `spatie/laravel-sluggable`: For generating unique slugs for posts.
  - `laravel/breeze`: For authentication scaffolding.

## Installation

Follow these steps to set up the project locally:

1.  **Clone the Repository**
    ```bash
    git clone <repository-url>
    cd medium
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Install Node Dependencies**
    ```bash
    npm install
    ```

4.  **Environment Setup**
    Copy the example environment file and configure it:
    ```bash
    cp .env.example .env
    ```
    Update the `.env` file with your database credentials (DB_DATABASE, DB_USERNAME, etc.).

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Run Migrations**
    Set up the database tables:
    ```bash
    php artisan migrate
    ```

7.  **Build Assets**
    Compiles the frontend assets:
    ```bash
    npm run build
    ```
    Or for development:
    ```bash
    npm run dev
    ```

8.  **Serve the Application**
    Start the local development server:
    ```bash
    php artisan serve
    ```

    Visit `http://localhost:8000` in your browser.

## usage

- **Register/Login**: Create an account to start posting.
- **Create Post**: Go to "Write" or your dashboard to draft a new story.
- **Profile**: Visit `http://localhost:8000/@your_username` to see your public profile.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)
