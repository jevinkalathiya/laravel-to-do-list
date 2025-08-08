# ✅ Laravel To-Do List App

A responsive and user-friendly **To-Do List application** built with Laravel. Easily manage daily tasks — add, edit, set statuses, and delete — with all tasks **sorted by due date** for better productivity.

---

## 📌 Features

- 📝 Add new tasks with due date
- ✏️ Edit tasks in place
- 🔁 Change task status:
  - Pending
  - In Progress
  - Completed
- 🗑️ Delete tasks
- 📅 Tasks sorted **by due date ascending**
- 🔄 Status-based color coding (with CSS classes)
- 📱 Fully responsive layout for mobile, tablet, laptop, and desktop
- 📃 Pagination (with page state preserved after edit/status updates)

---

## 📂 Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Blade templating, Font Awesome
- **Database**: MySQL
- **Styling**: Custom CSS + Bootstrap (for pagination)

---

## ⚙️ Getting Started

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/jevinkalathiya/laravel-to-do-list.git
cd laravel-to-do-list
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Set Up `.env`

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` with your database config:

```
DB_CONNECTION=mysql
DB_DATABASE=your_db_name
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Run Migrations

```bash
php artisan migrate
```

### 5️⃣ Serve the App

```bash
php artisan serve
```

Then visit:
```
http://127.0.0.1:8000
```

---

## 📊 Task Ordering

Tasks are **ordered by `due_date` in ascending order** by default. Upcoming tasks appear at the top.

```php
DB::table('tasklists')->orderBy('due_date', 'asc')->paginate(5);
```

---

## 📸 Screenshot

![image_alt](https://github.com/jevinkalathiya/laravel-to-do-list/blob/ad881cbdef1a1789718f112afcbe245b3ce81b7b/public/img/To-Do-List.png)


---

## 👤 Author

**Jevin Kalathiya**  
🔗 [GitHub Profile](https://github.com/jevinkalathiya)
🔗 [LinkedIn Profile](https://in.linkedin.com/in/jevinkalathiya)

---
