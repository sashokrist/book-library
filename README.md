## About Project

To run the project follow these steps:

run in console: 
- git clone git@github.com:sashokrist/book-library.git
- cd book-library
- composer install
- cp .env.example .env
- php artisan key:generate
- Set database credentials in .env
- php artisan migrate --seed     //it creates admin user: admin@admin.com, password: 12345678
- npm install and npm run dev
- php artisan serve

  Routes are protected with two middleware: auth, and isAdmin.

  Admin user can activate and deactivate accounts, make regular users admin, and delete every user.

  Laravel v 10, PHP 8.1, MySql 8.2/MariaDB 11.22, Tailwind CSS, Blade.

  To login as admin:

  admin user: admin@admin.com, password: 12345678

  Screenshots:

Welcome
  <img width="959" alt="welcome" src="https://github.com/sashokrist/book-library/assets/11788009/f4726278-3ddd-4dc4-8cec-65dc1f5629eb">

  Register
  <img width="958" alt="register" src="https://github.com/sashokrist/book-library/assets/11788009/fa04fc2d-2b3a-4d34-970a-446c7fe5e7f4">

  Login
  
  <img width="956" alt="login" src="https://github.com/sashokrist/book-library/assets/11788009/ae70878e-c724-48d0-af63-1e05132b1636">

  admin dashboard
<img width="941" alt="admin-dashboard" src="https://github.com/sashokrist/book-library/assets/11788009/948348f0-0273-4e82-b8ca-660130392653">

Create book
<img width="943" alt="create-book" src="https://github.com/sashokrist/book-library/assets/11788009/8f39d5cb-9600-471d-b84f-e0c6fab1ac3c">

Update book
<img width="934" alt="update-book" src="https://github.com/sashokrist/book-library/assets/11788009/776242da-e504-4d5b-b3ee-68dff01184a5">

Add a book to the collection
<img width="904" alt="add-to-collection" src="https://github.com/sashokrist/book-library/assets/11788009/eafa5075-a977-4375-a56b-8634879a128e">

Already in collection
<img width="931" alt="already-added" src="https://github.com/sashokrist/book-library/assets/11788009/90029c9b-54a7-4ed4-a00f-70c74d7756c2">

Delete book

<img width="905" alt="delete-book" src="https://github.com/sashokrist/book-library/assets/11788009/25b2f23b-5634-48e6-a649-94b796312b32">

Manage users
<img width="916" alt="manage-users" src="https://github.com/sashokrist/book-library/assets/11788009/fdda1aa7-e47d-4dc7-9751-9815339dc748">

Navigation

<img width="904" alt="navigation" src="https://github.com/sashokrist/book-library/assets/11788009/ba35b9dc-219a-4402-9d28-f5ac1fc350d2">

My book

<img width="916" alt="my-books" src="https://github.com/sashokrist/book-library/assets/11788009/1a96d15a-a51b-4ec6-81d2-27d44b77bd64">

Edit profile

<img width="815" alt="edit-profile-name-lastName-email" src="https://github.com/sashokrist/book-library/assets/11788009/96d13f2b-a4fc-4a17-a010-e53b8b0122c6">

<img width="875" alt="edit-profile-new-password-delete" src="https://github.com/sashokrist/book-library/assets/11788009/4ef82450-6ab5-4ebe-b4d8-286754d4937c">

Regular user
<img width="931" alt="regular-user" src="https://github.com/sashokrist/book-library/assets/11788009/c0203960-a7d9-411c-8b4d-718010956a5d">





  
  

  



