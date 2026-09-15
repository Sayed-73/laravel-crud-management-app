# Laravel CRUD & User Management System

A Laravel practice application built to strengthen real-world backend skills — form handling and validation, AJAX-driven CRUD operations, file/document uploads, live search, pagination, and status management, all wired up with a jQuery/AJAX front end.

## Features

- **Student Registration** — Validated registration form with server-side error handling.
- **User / Recruiter Management** — Create, edit, and manage user records including official email, bank details, and supporting document uploads (with preview and delete).
- **Records Module (CRUD + AJAX)**
  - Add, update, and delete records without page reloads (AJAX + JSON responses)
  - Live search across name, email, and phone
  - Paginated results table, refreshed dynamically
  - One-click **status toggle** (active/inactive) per record
  - Document upload attached to each record
- **User feedback** via SweetAlert2 notifications on every action (create, update, delete, status change)

## Tech Stack

- **Backend:** PHP, Laravel (MVC, Eloquent ORM, migrations, form request validation)
- **Frontend:** Blade templates, Bootstrap, jQuery, AJAX
- **Database:** MySQL / SQLite
- **UX:** SweetAlert2 for notifications

## What I practiced building this

- Structuring a Laravel app around routes → controllers → Eloquent models
- Writing AJAX endpoints that return JSON and updating the DOM without a full page reload
- File upload handling and validation (documents, with type/size limits)
- Building a searchable, paginated data table that refreshes in place
- Toggling record status with a single AJAX call and reflecting it instantly in the UI

## Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

## Author

**Saidul Islam Sayed**
[LinkedIn](https://www.linkedin.com/in/saidul-islam-051a99340/) · [Portfolio](https://sayed-73.github.io/Saidul-Islam-Portfolio/) · [GitHub](https://github.com/Sayed-73)