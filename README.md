# 🛒Laravel Webshop

# Technologies

**Project is created with**

- Laravel Framework 10.12.0
- MySQL: v8.0.27
- XAMPP v3.3.0
- PHP 
- Tailwind CSS
- PHP Unit
- Mailtrap


# Key Features

## The Project offers the following key features:

- **Responsive-webdesign**
- **User-authentication**
- **Cookie-consent**
- **Product-CRUD**
- **User-login-logout-registrate**
- **User-dashboard**
- **User-dashboard-profil**
- **Change-user-email-or-password**
- **User-delete-account**
- **Add-to-cart**
- **Remove-from-cart**
- **Calculate-subtotal**
- **Calculate-discount-price-3-5-pieces**
- **Verify-email**
- **Forgot-password**
- **Form-Validation**
- **Darkmode-lightmode**
- **Unit-test-to-calculate-subtotal**


## Technology Stack

The Laravel Webshop project is developed using the Laravel framework, which offers a robust ecosystem.


## Installation

To install and run the application, follow these steps:

**1. Clone the repository**

```bash
git clone https://github.com/petermuladi/laravel-webshop.git
```

**2. 👉Go to project folder->(laravel-webshop/my-app)**


**3. Install dependencies
(sometimes the composer install command has to be run twice if it throws errors the first time)**

```bash
composer install
```

**4. Create a new .env file**

```bash
cp .env.example .env
```

**5. Update the .env file with your database credentials**

```bash
DB_DATABASE=[your-database-name]
DB_USERNAME=[your-database-username]
DB_PASSWORD=[your-database-password]
```

**6. Generate an application key**

```bash
php artisan key:generate
```

**7. Run database migrations**

```bash
php artisan migrate
```

**8.Make a storage link to images**

```bash
php artisan storage:link
```

**9.Run seeder with fresh migrate**

```bash
php artisan migrate:fresh --seed
```

***9. install node modules***
```bash
npm install
```

***10. run npm in developemant mode***
```bash
npm run dev
```


***11. Login webshop and dashboard:
👉create a Mailtrap account [Mailtrap](https://mailtrap.io)
and configure.env the Mail account with Mailtrap
SMTP Settings Laravel 7+***

```bash
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME={{mailtrap username}}
MAIL_PASSWORD={{mailtrap password}}
MAIL_ENCRYPTION=tls

```
**12. Open a new terminal and Start the web server**

```bash
php artisan serve
```

**13. Navigate to the project URL**

```bash
localhost:8000
```
----------------

**🚩When registrate or login in webshop 
coming a Verify email in your Mailtrap account.
Log in to your Mailtrap account and approve the webshop registration,
then you can access the webshop admin and user interface, products..**


## Additional Notes
**The application was created by Muladi Péter.**
