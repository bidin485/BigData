# Project Title


Before setting up the project, make sure you have the following installed:

- **Node.js**: [Install Node.js](https://nodejs.org/) (includes npm).
- **PHP**: Ensure PHP 7.4 or higher is installed.
- **Composer**: [Install Composer](https://getcomposer.org/).

Installation Steps

Step 1: Clone the Repository
Clone the project repository to your local machine:
git clone https://github.com/your-username/your-repository.git
cd your-repository

Step 2: Install Dependencies
composer install
npm install


Step 3: Set Up Environment Variables
Copy the .env.example file to create your own environment configuration
Update the .env file with your database settings:

Step 4: Generate the Application Key
Laravel requires an encryption key to be generated for security. Run the following command to generate the key:
php artisan key:generate

Step 5: Set Up the Database
Create a new database matching the name specified in your .env file, and run migrations to create the necessary tables:
php artisan migrate

Step 6: Build Frontend Assets
Vite is used for compiling and bundling frontend assets (CSS, JS). You need to build the assets before running the application in production:
npm run build


Step 7: Run the Application
You can now serve the application locally:
php artisan serve

LICENSE

This file provides clear instructions on how to set up and run the project for any developer accessing the code.

