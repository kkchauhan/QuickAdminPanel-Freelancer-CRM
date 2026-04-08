<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

# 🚀 Freelancer CRM

> A robust, modern, and highly secure Client Relationship Management tool designed for freelancers. Keep track of your projects, seamlessly manage client correspondence, monitor transactions, and generate invoices effortlessly.

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2">
  <img src="https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge" alt="License">
</p>

---

## ✨ Key Features

- **Built on Laravel 12**: Fully upgraded to leverage the latest features and performance improvements of Laravel 12.
- **Midnight Glass Theme UI**: A stunning, custom-built CSS-first dark theme that offers a premium, modern, and fluid user experience.
- **Comprehensive CRUDs**: Easily manage your Clients, Projects, Notes, Documents, and Transactions.
- **Invoicing System**: Generate, manage, and download professional client invoices as PDF files (`barryvdh/laravel-dompdf`).
- **Interactive Financial Reports**: Visualize your transaction data with dynamic financial charts powered by **Chart.js**.
- **Security First**: Comprehensive input validation, password strength policies, login rate limiting, session/cookie hardening, and global security headers to protect against common vulnerabilities.
- **File & Media Management**: Handling of essential project documents utilizing `spatie/laravel-medialibrary`.

## 📸 Screenshots

| Dashboard & Reports | Transaction Management |
| :---: | :---: |
| <img src="https://laraveldaily.com/wp-content/uploads/2019/09/freelancer-crm-report.png" alt="Report Screenshot" width="400"> | <img src="https://laraveldaily.com/wp-content/uploads/2019/09/freelancer-crm-transactions.png" alt="Transaction Screenshot" width="400"> |

*(Note: Screenshots are representative of the layout structure. The live application utilizes the new **Midnight Glass** dark theme.)*

---

## 🛠 Prerequisites

Make sure you have the following installed on your machine:
- PHP >= 8.2
- Composer
- Node.js & NPM / Yarn
- MySQL or PostgreSQL

## 🚀 Installation & Setup

Follow these simple steps to get the project up and running locally:

**1. Clone the repository**
```bash
git clone <repository-url>
cd QuickAdminPanel-Freelancer-CRM
```

**2. Install PHP Dependencies**
```bash
composer install
```

**3. Configure Environment**
Copy the example `.env` file and configure your database credentials.
```bash
cp .env.example .env
```
Open `.env` and adjust the database settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

**4. Generate Application Key**
```bash
php artisan key:generate
```

**5. Migrate and Seed Database**
This will generate the necessary tables and populate them with default data for testing purposes.
```bash
php artisan migrate --seed
```

**6. Launch the Application**
```bash
php artisan serve
```

> **Default Admin Credentials**:
> - **Email:** `admin@admin.com`
> - **Password:** `password`

## 🔒 Security Best Practices Implemented

This project recently underwent a robust security audit, resulting in several hardening measures:
- Strictly enforced input validation across all Form Requests.
- Mass assignment vulnerabilities addressed using properly defined `$fillable` scopes.
- Enhanced Password Policies and integrated rate limiting on authentication routes.
- Comprehensive Security Headers implemented (e.g., CSP, X-Frame-Options, X-XSS-Protection).

## 📄 License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT). Feel free to use, modify, and build upon this CRM!

---

<p align="center">
  Crafted meticulously for independent professionals.
</p>
