# 🧩 Filament Pro Starter

A **professional Laravel + Filament starter kit** preconfigured with authentication, roles, permissions, and modern developer tooling — so you can start building admin panels in minutes instead of hours.

![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square)
![Filament Version](https://img.shields.io/badge/Filament-4.x-blueviolet?style=flat-square)
![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)
![Status](https://img.shields.io/badge/Status-Active-success?style=flat-square)

---

## 🚀 Quick Start

```bash
composer create-project muazzam/filament-pro-starter myapp
cd myapp
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve
```

Visit your new app at 👉 **http://localhost:8000**

---

## ⚙️ Preconfigured Packages

| Package | Description |
|----------|--------------|
| **[filament/filament](https://filamentphp.com/)** | Core Filament admin panel |
| **[bezhansalleh/filament-shield](https://github.com/bezhanSalleh/filament-shield)** | Roles & permissions made simple |
| **[stechstudio/filament-impersonate](https://github.com/stechstudio/filament-impersonate)** | Login as any user |
| **[joaopaulolndev/filament-edit-profile](https://github.com/joaopaulolndev/filament-edit-profile)** | Editable user profile in Filament |
| **[stephenjude/filament-two-factor-authentication](https://github.com/stephenjude/filament-two-factor-authentication)** | Secure 2FA integration |
| **[spatie/laravel-passkeys](https://github.com/spatie/laravel-passkeys)** | WebAuthn passkey authentication |

All configured and ready to go out of the box 🧙‍♂️

---

## 🧠 Key Features

✅ **Laravel 12 + Filament 4.1**  
✅ **Role & Permission System (Shield)**  
✅ **Two-Factor Authentication (2FA)**  
✅ **Passkey Authentication Support**  
✅ **User Impersonation**  
✅ **Edit Profile Page**  
✅ **Preconfigured Build System** (Vite + Tailwind)  
✅ **Dev Script for Instant Startup**

---

## 🧰 Available Commands

| Command | Purpose |
|----------|----------|
| `composer setup` | Runs install, migrations, and npm build automatically |
| `composer dev` | Starts Laravel, Vite, and queue listener concurrently |
| `composer test` | Runs all tests |
| `php artisan migrate` | Migrates database |
| `php artisan serve` | Starts the local server |

---

## 🧪 Development Workflow

You can use the included concurrent dev script for a full local environment:

```bash
composer dev
```

This will run:

- 🟢 Laravel server (`php artisan serve`)
- 🟡 Queue listener
- 🔵 Vite build (hot reload)

Perfect for rapid Filament development.

---

## 🧩 Project Structure

```
.
├── app/
│   ├── Filament/        # Your Filament Resources
│   ├── Http/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
└── composer.json
```

---

## 🛠️ Requirements

- **PHP ≥ 8.2**
- **Composer ≥ 2.6**
- **Node.js ≥ 18**
- **MySQL or SQLite**

---

## 📦 Deployment Ready

This starter includes:

- 🧾 **Optimized autoloading**
- ⚙️ **Production build scripts**
- 🔑 **Security best practices**
- 🐳 **Laravel Sail support** (Docker ready)

---

## 🪄 Example Setup Script

🪄 Example Setup Script (with Filament Shield)

After running your migrations, simply execute:

Run this to generate permissions and policies

```bash
php artisan shield:generate --all
```
Then generate a super user

```bash
php artisan shield:super-admin
```

You’ll be guided through a short setup:

Enter the name, email, and password for your super admin.

Shield will automatically:

Create the Super Admin role

Assign all permissions

Link the new user to that role

When done, you can log in at /admin using those credentials 🎉


Then visit `/admin` and log in 🎉

---

## 🧰 Optional Tools

If you’d like to extend this starter:

| Package | Adds |
|----------|------|
| `spatie/laravel-activitylog` | User activity tracking |
| `filament/forms` + `filament/tables` | Advanced Filament components |
| `livewire/livewire` | Reactive UI support |

---

## 🤝 Contributing

Pull requests are welcome!  
If you plan major changes, please open an issue first to discuss what you’d like to add.

---

## 📄 License

This project is open-sourced software licensed under the **[MIT license](LICENSE)**.

---

## ✨ Credits

Built with ❤️ by [Muazzam Khan](https://github.com/Muazzamkhan95)  
Powered by [Laravel](https://laravel.com) + [Filament](https://filamentphp.com)
