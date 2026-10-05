# 🚀 Job Board — Premium Job Board

A premium, dark-themed job board application built with **Laravel 13**, **Tailwind CSS**, and **Alpine.js**. This platform connects developers with modern career positions, featuring custom job listing cards, full authorization management, and an integrated flash notification engine.

---

## ✨ Features

- **Premium Dark Mode UI:** Seamless aesthetic featuring glassmorphic accents built with Tailwind CSS.
- **3-Column Interactive Job Panels:** Responsive card layouts complete with relative-positioned, custom 3-dots dropdown options.
- **Dynamic Authorization Engine:** Utilizes Laravel Policies (`JobPolicy`) to lock down editing and delete mechanics so users only manage listings they own.
- **Automated Dismiss Notifications:** High-visibility flash alert system configured with Alpine.js self-dismissing timers.
- **Smart URL Resolvers:** Automatic fallback logic handling both local storage uploads and external image links dynamically.
- **Custom Application Error Overrides:** Dark-mode tailored custom layout error templates (`404`, `403`, `500`).

---

## 🛠️ Tech Stack

- **Framework:** Laravel 13
- **Frontend Utilities:** Alpine.js
- **Styling UI:** Tailwind CSS
- **Bundler:** Vite
- **Database (Local Environment):** SQLite

---

## ⚡ Installation & Setup

Follow these sequential steps to clone down and configure the development stack locally:

### 1. Clone the Repository
```bash
git clone https://github.com
cd YOUR_REPOSITORY_NAME
```

### 2. Install Backend Dependencies
```bash
composer install
```

### 3. Configure the Environment
Duplicate the environment template file and generate your application's encryption key:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Setup Database & Assets Link
Configure your storage link layer and execute database migrations:
```bash
php artisan storage:link
php artisan migrate --seed
```

### 5. Install & Build Frontend Assets
Build your local JS, Alpine scripts, and Tailwind assets using the Vite compiler:
```bash
npm install
npm run dev
```

### 6. Boot the Local Server
```bash
php artisan serve
```
Your instance should now be running smoothly at **`http://localhost:8000`**.

---

## 🔒 Security & Authorization

This project implements strict safety protocols:
- Form data modifications (`edit`, `update`, `destroy`) are protected via Controller Route Middleware.
- UI elements (like editing dropdown fields) are kept safe inside Blade layouts via `@can('update', $job)` parameters.
- External application routing redirections automatically sanitize paths with secure `rel="noopener noreferrer"` parameters.
