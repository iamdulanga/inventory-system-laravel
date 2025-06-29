# 📦 Inventory Management System - Laravel

A complete Inventory Management System built with **Laravel** and **MySQL**, designed for beginner to intermediate developers. This project includes a fully functional **admin panel**, **invoice management**, and **inventory tracking** with PDF export options.

This system was originally developed as a learning resource and is ideal for student projects, small-scale inventory systems, and anyone looking to explore Laravel-based CRUD applications.

---

## 📌 Features

- 🔐 Admin Panel (no user self-registration)
- 🗂 Category Management
- 📦 Product Management (price, stock, image, category)
- 🧾 Invoice Management (PDF & Excel export)
- 🚚 Supplier Management
- 🧍 Customer Management
- 📤 Outgoing Product Management
- 📥 Purchase Product Management
- 🔍 Search & Pagination in all lists
- 📄 Export to PDF and Excel
- 👨‍💻 System User Management (add/view/delete admins)

> Built with: **PHP 7.3+**, **Laravel 8+**, **Bootstrap**, **MySQL**, **Vanilla CSS**

---

## 🚀 Getting Started

### ✅ Requirements

- PHP >= 7.3 (Recommended: 8.x)
- Composer
- Laravel >= 8.x
- MySQL / SQLite / PostgreSQL
- Node.js & NPM (optional for frontend assets)

---

## 🛠️ Setup Instructions

```bash
# 1. Clone the repository
git clone https://github.com/iamdulanga/inventory-system-laravel.git
cd inventory-system-laravel

# 2. Install backend dependencies
composer install

# 3. Copy the .env file and configure database
cp .env.example .env
# Edit the .env file with your database credentials

# 4. Generate application key
php artisan key:generate

# 5. Run migrations
php artisan migrate

# 6. Seed admin user
php artisan db:seed

# 7. Serve the app
php artisan serve
````

Open the provided local URL (usually `http://127.0.0.1:8000`) in your browser to access the system.

---

## 🧪 Default Admin Login

Login credentials may be located in the included `.txt` file after cloning. If login fails:

> “**These credentials do not match our records**” = likely no user exists or password isn't hashed.

### 🔧 Create Admin via Tinker

```bash
php artisan tinker

use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
  'name' => 'Admin',
  'email' => 'admin@example.com',
  'password' => Hash::make('password123'),
]);
```

---

## 🧠 Dev Notes & Common Fixes

### 🛠 Controller Tips

* ✅ Use: `use App\Models\User;` not `App\User`.
* ✅ Always hash passwords:

  ```php
  'password' => Hash::make($request->password),
  ```
* ✅ Unique email validation fix:

  ```php
  'email' => 'required|email|unique:users,email,' . $id,
  ```
* ✅ Controller should return views properly:

  ```php
  return view('user.index', compact('users'));
  ```

---

## 🧾 About the Project

This system was designed to simulate real-world inventory tracking and includes:

* Interconnected **Category** and **Product** logic.
* **Supplier** data used to manage purchase history.
* **Customer** data tied to **Outgoing (sales)** transactions.
* Automatic stock increase/decrease based on **Purchases** and **Outgoing** entries.
* Invoice export to PDF.
* User-friendly dashboard with Bootstrap-based UI.

---

## 📁 Project Structure

```text
app/
 └── Http/
      └── Controllers/
          └── UserController.php
database/
 └── migrations/
     └── create_users_table.php
resources/
 └── views/
      └── user/
.env.example  # environment settings template
routes/
 └── web.php  # Laravel routes
```

---

## ⚙️ Troubleshooting

### 🔐 Git Safe Directory

If you encounter the error:

```
fatal: detected dubious ownership in repository
```

Run:

```bash
git config --global --add safe.directory C:/Users/Samsung/Desktop/inventory
```

---

## 🤝 Contributing

Pull requests are welcome!

Before submitting:

* Test all migrations and features.
* **Do not push `.env`, `vendor/`, or compiled assets.**
* Use **PSR-12** coding standards.
* Create an issue for major feature proposals.

---

## 📜 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 🔗 Additional Notes

* ✅ Ideal for students learning Laravel CRUD, Eloquent, and MVC structure.
* ✅ All admin actions are role-restricted — no self-registration.
* ✅ Great for extending into a full e-commerce or warehouse system.

---

## 📎 Credits

Original Developer: **Revan Apriyandi**
Modified and maintained by: **[iamdulanga](https://github.com/iamdulanga)**
Inspired by: [codeastro.com](https://codeastro.com/inventory-management-system-in-laravel-with-source-code/)

---

## 📥 Download & Demo

To get the full source code and setup instructions, visit:
👉 [https://github.com/iamdulanga/inventory-system-laravel](https://github.com/iamdulanga/inventory-system-laravel)
