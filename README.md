# 🌍 Smart Stay — Tour & Hotel Booking Website

A full-stack travel and hotel booking web application built with **PHP**, **MySQL**, and **Vanilla CSS**. Smart Stay allows users to discover destinations, search for hotels by city, and manage their hotel reservations — all in one place.

---

## 📸 Project Screenshots

### 🏠 Homepage

![Homepage](screenshots/home_page.png)

---



### 🔍 Search Results

![Search Results](screenshots/results_page.png)

---

### 📅 Booking Page

![Booking](screenshots/book_page.png)


---

## ✨ Features

- 🔐 **User Authentication** — Register, login, and logout with secure password hashing (`password_hash` / `password_verify`)
- 🔒 **Session Management** — Protected pages redirect unauthenticated users to login
- 🔍 **Hotel Search** — Search hotels by city, check-in/check-out dates, and number of guests
- 🏨 **Hotel Listings** — View hotel name, description, star rating, available rooms, price per night, and discount
- 📅 **Booking System** — Book a hotel directly from search results; booking data is stored in the database
- 🗺️ **Google Maps Embed** — Each booking card shows an embedded Google Map for the hotel location
- 💰 **Dynamic Pricing** — Calculates final price based on nightly rate, number of nights, and discount percentage
- 🌐 **Tour Package Showcase** — Featured packages (India, Dubai, Egypt, Vietnam) displayed on the homepage
- 📧 **Newsletter Subscribe** — Email subscription section with stats display
- 📱 **Responsive Design** — Mobile-friendly layouts across all pages

---

## 🛠️ Tech Stack

| Layer        | Technology                          |
|--------------|-------------------------------------|
| Backend      | PHP 8+ (procedural + OOP MySQLi)    |
| Database     | MySQL (`smart_stay` database)        |
| Frontend     | HTML5, Vanilla CSS, Font Awesome 6  |
| Fonts        | Google Fonts — Poppins              |
| Server       | Apache via XAMPP (localhost)        |

---

## 📁 Project Structure

```
Tour_website/
│
├── index.php           # Homepage — hero, search box, tour packages, destinations
├── results.php         # Hotel search results page (filtered by city)
├── book.php            # Booking confirmation page (login required)
├── login.php           # User sign-in page
├── register.php        # User registration page
├── logout.php          # Session destroy & redirect
│
├── navbar.php          # Shared navigation bar (included in all pages)
├── footer.php          # Shared footer with newsletter + stats section
├── db_config.php       # MySQL database connection config
│
├── styles/
│   └── style.css       # Global stylesheet (layout, components, auth, responsive)
│
├── images/             # All static image assets
│   ├── tour.jpg        # Hero background image
│   ├── delhi.avif      # Delhi tour package image
│   ├── Burj Khalifa.avif
│   ├── dubai.webp
│   ├── egypt.jpg
│   ├── vietnam.avif
│   ├── licensed-image.jpg  # Pakistan card image
│   ├── us.jpg / us.png     # USA card images
│   ├── pak.png / ind.png   # Flag icons for tooltip
│   ├── info.avif       # Destination section image
│   └── place.png       # Additional asset
│
└── app/                # Reserved for future JS scripts (e.g., script.js)
```

---

## 🗄️ Database Schema

The application uses a MySQL database named **`smart_stay`**.

### `users` table

| Column     | Type         | Description                  |
|------------|--------------|------------------------------|
| `id`       | INT (PK, AI) | Unique user ID               |
| `email`    | VARCHAR      | User's email address         |
| `mobile`   | VARCHAR      | Mobile number (used for login)|
| `password` | VARCHAR      | Bcrypt-hashed password       |

### `hotels` table

| Column               | Type         | Description                          |
|----------------------|--------------|--------------------------------------|
| `id`                 | INT (PK, AI) | Unique hotel ID                      |
| `name`               | VARCHAR      | Hotel name                           |
| `city`               | VARCHAR      | City (used for search filtering)     |
| `location`           | VARCHAR      | Full address / location string       |
| `description`        | TEXT         | Hotel description                    |
| `services`           | VARCHAR      | Comma-separated list of amenities    |
| `poster`             | VARCHAR      | URL/path to the hotel's main image   |
| `room_andHotelImages`| VARCHAR      | Comma-separated URLs of room images  |
| `mrp`                | DECIMAL      | Original price per night             |
| `discount`           | INT          | Discount percentage                  |
| `rate`               | DECIMAL      | Star rating (e.g., 4.5)              |
| `rooms`              | INT          | Number of rooms available            |

### `reservation` table

| Column       | Type         | Description                              |
|--------------|--------------|------------------------------------------|
| `u_id`       | INT (FK)     | References `users.id`                    |
| `h_id`       | INT (FK)     | References `hotels.id`                   |
| `start_date` | DATE         | Check-in date                            |
| `end_date`   | DATE         | Check-out date                           |
| `people`     | INT          | Number of guests                         |

> **Note:** The `reservation` table uses `ON DUPLICATE KEY UPDATE` to prevent duplicate bookings for the same user-hotel pair.

---

## ⚙️ Installation & Setup

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (or any Apache + PHP + MySQL stack)
- PHP **8.0+**
- MySQL **5.7+** or MariaDB

### Steps

1. **Clone or download** this repository into your XAMPP `htdocs` folder:
   ```
   C:\xampp\htdocs\Tour_website\
   ```

2. **Start XAMPP** — enable **Apache** and **MySQL** from the XAMPP Control Panel.

3. **Create the database** — open [phpMyAdmin](http://localhost/phpmyadmin) and:
   - Create a new database named `smart_stay`
   - Run the SQL below to create the required tables:

   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       email VARCHAR(100) NOT NULL,
       mobile VARCHAR(20) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL
   );

   CREATE TABLE hotels (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(150) NOT NULL,
       city VARCHAR(100) NOT NULL,
       location VARCHAR(255),
       description TEXT,
       services VARCHAR(500),
       poster VARCHAR(500),
       room_andHotelImages TEXT,
       mrp DECIMAL(10,2) DEFAULT 0,
       discount INT DEFAULT 0,
       rate DECIMAL(3,1) DEFAULT 0,
       rooms INT DEFAULT 0
   );

   CREATE TABLE reservation (
       u_id INT NOT NULL,
       h_id INT NOT NULL,
       start_date DATE,
       end_date DATE,
       people INT DEFAULT 1,
       PRIMARY KEY (u_id, h_id),
       FOREIGN KEY (u_id) REFERENCES users(id),
       FOREIGN KEY (h_id) REFERENCES hotels(id)
   );
   ```

4. **Configure the database** — open `db_config.php` and update if needed:
   ```php
   $server   = "localhost";
   $userName = "root";
   $pass     = "";           // Add your MySQL password if set
   $database = "smart_stay";
   ```

5. **Open in browser:**
   ```
   http://localhost/Tour_website/
   ```

---

## 🔄 Page Flow

```
index.php  ──(search)──►  results.php  ──(Book Now)──►  login.php (if not logged in)
                                                              │
                                                              ▼
                                                         book.php  (logged in users)
                                                              │
                                                         Booking stored in DB
```

---

## 🔐 Security Notes

- Passwords are hashed using PHP's `password_hash()` with `PASSWORD_DEFAULT` (bcrypt).
- All database queries use **prepared statements** (`execute_query` with parameter binding) to prevent SQL injection.
- User inputs are sanitized with `htmlspecialchars()` before rendering in HTML.
- The booking page (`book.php`) is protected — unauthenticated users are redirected to `login.php`.

---

## 🚧 Known Limitations / Future Improvements

- [ ] Filter sidebar on `results.php` is currently commented out (amenities, price, star rating filters)
- [ ] No admin panel for managing hotels — hotels must be inserted directly into the database
- [ ] No booking cancellation feature yet
- [ ] Newsletter subscription form is UI-only (no backend handler)
- [ ] "Community", "Special Deals", and "About Us" navbar links are placeholder (`#`)
- [ ] Navbar shows user ID instead of username after login

---

## 👤 Author

**Sohail Khan**
- GitHub: [@Sohail-Khan123](https://github.com/Sohail-Khan123)

---
