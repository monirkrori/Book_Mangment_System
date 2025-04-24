# 📚 Book Management System

The **Book Management System** is a modern, full-stack Laravel web application designed to manage books, authors, and categories efficiently. With a clean UI and well-structured backend, it simulates a basic library or bookstore panel using Laravel's MVC architecture, Blade templating engine, and Bootstrap 5.

---

## 🧠 Project Overview

This project showcases the practical implementation of:

- CRUD operations
- Relational database modeling using Eloquent ORM
- UI/UX design using Blade & Bootstrap
- Modular, scalable code structure following Laravel standards

The system allows users to:
- Manage books and associate them with authors and categories
- Navigate easily using an interactive navbar
- Access a dashboard displaying live statistics

---

## 🗃️ Database Design

The system follows a relational schema with three main entities: **Books**, **Authors**, and **Categories**.

### 📘 Books Table
| Column      | Type        | Description                        |
|-------------|-------------|------------------------------------|
| id          | BIGINT      | Primary Key                        |
| title       | STRING      | Title of the book                  |
| author_id   | FOREIGN KEY | Reference to `authors.id`          |
| category_id | FOREIGN KEY | Reference to `categories.id`       |
| description | TEXT        | Book description                   |
| price       | NUMERIC     | Book price                         |
| quantity    | INTEGER     | Available quantity                 |
| created_at  | TIMESTAMP   | Created date                       |
| updated_at  | TIMESTAMP   | Last updated date                  |

### 👤 Authors Table
| Column     | Type      | Description                 |
|------------|-----------|-----------------------------|
| id         | BIGINT    | Primary Key                 |
| name       | STRING    | Full name of the author     |
| created_at | TIMESTAMP | Created date                |
| updated_at | TIMESTAMP | Last updated date           |

### 🏷️ Categories Table
| Column      | Type      | Description                  |
|-------------|-----------|------------------------------|
| id          | BIGINT    | Primary Key                  |
| name        | STRING    | Name of the category         |
| description | TEXT      | Detailed category description|
| created_at  | TIMESTAMP | Created date                 |
| updated_at  | TIMESTAMP | Last updated date            |

### 🔗 Relationships

- One **Author** has many **Books**
- One **Category** has many **Books**
- Each **Book** belongs to one **Author** and one **Category**

> This relationship structure is implemented using Eloquent ORM’s `hasMany`, `belongsTo` relationships.

---

## 🌐 Application Flow

### 🏠 Welcome Dashboard
- Displays total count of books, authors, and categories using animated Bootstrap cards.
- Cards act as links to their respective management pages.

### 🔀 Navigation
- A responsive top navbar enables seamless switching between:
    - Books
    - Authors
    - Categories

### ✍️ CRUD Functionality
- **Create** new records using intuitive forms
- **Read** all data in structured Bootstrap tables
- **Update** any record with editable forms
- **Delete** records with confirmation prompts

---

## 🧰 Technologies Used

| Tool/Library     | Purpose                            |
|------------------|------------------------------------|
| Laravel 12       | Backend framework (PHP MVC)        |
| Blade            | View templating engine             |
| Eloquent ORM     | Database abstraction layer         |
| Bootstrap 5      | Frontend styling & components      |
| MySQL            | Relational database                |
| Laravel UI       | Authentication scaffolding         |

---

## 🚀 Getting Started

### 1. Clone the Repository
```bash
    git clone https://github.com/monirkrori/Book_Mangment_System.git
    cd Book_Mangment_System
```
### 2. Environment setup 

```bash
    cp .env.example .env
    php artisan key:generate
```

### 3.Run Database Migrations

```bash
    php artisan migrate 
```






