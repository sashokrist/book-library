## Book Library application

To install and run the project follow these steps:

run in console: 
- git clone git@github.com:sashokrist/book-library.git
- cd book-library
- composer install
- cp .env.example .env
- php artisan key:generate
- Set database credentials in .env
- php artisan migrate --seed  // generate admin user and 10 authors
- npm install and npm run dev
- php artisan serve

Project details:

- Routes are protected with two middleware: auth, and isAdmin.

- The dashboard books page and manage users page have a pagination 10 per page.

- Admin users can activate and deactivate accounts, make regular users admin, delete every user,

  and create, update, delete books, and add books to his/her collection.

- Regular users can add/delete books to his/her collections, edit profiles, and see the My Books page.

- Author added.

- Option to upload user avatar.

- Search functionality to search for books by name, ISBN, or description.

- Keep count of the existing books and users in the database.

- Forgot the password option.

Create User:

- To create an admin user:
  
   Running a command in console: php artisan db:seed, will create an admin user with these credentials:

   email: admin@admin.com
  
   password: 12345678

- If you want to specify user info run in console command:

   php artisan user:create-admin and follow the steps.

- PHP Coding Standards Fixer - cs-fixer is installed.

- Laravel v 10, PHP 8.1, MySql 8.2/MariaDB 11.22, Tailwind CSS, Blade.

- Total work hours: (18)h.

Screenshots:

Welcome

<img width="959" alt="welcome" src="https://github.com/sashokrist/book-library/assets/11788009/f4726278-3ddd-4dc4-8cec-65dc1f5629eb">

Register
  
<img width="959" alt="register" src="https://github.com/sashokrist/book-library/assets/11788009/e26bcb5b-1f7c-4fdf-9452-1b9e95f9ab63">

Login
  
<img width="949" alt="login" src="https://github.com/sashokrist/book-library/assets/11788009/8712e211-0fb7-451b-b0b7-ae6655a010e2">

Not active yet.
  
<img width="943" alt="not-active" src="https://github.com/sashokrist/book-library/assets/11788009/279e0731-4edd-46e6-8ec2-851c8d6b53ef">

Regular user dashboard.

<img width="938" alt="regular-user" src="https://github.com/sashokrist/book-library/assets/11788009/0f167d76-668c-4774-a3c0-bf058f2a4492">

Admin user dashboard.

<img width="947" alt="admin-dashboard" src="https://github.com/sashokrist/book-library/assets/11788009/77f8d43e-004e-4dce-8a10-6204f0d47753">

Create book

<img width="944" alt="create-book" src="https://github.com/sashokrist/book-library/assets/11788009/0d7ed1b4-b8e6-4b5e-914b-9a48b3d1f568">

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

<img width="941" alt="avatar" src="https://github.com/sashokrist/book-library/assets/11788009/676667b1-3185-406f-bc67-36050e01431f">

<img width="815" alt="edit-profile-name-lastName-email" src="https://github.com/sashokrist/book-library/assets/11788009/96d13f2b-a4fc-4a17-a010-e53b8b0122c6">

<img width="875" alt="edit-profile-new-password-delete" src="https://github.com/sashokrist/book-library/assets/11788009/4ef82450-6ab5-4ebe-b4d8-286754d4937c">

Search

<img width="939" alt="search" src="https://github.com/sashokrist/book-library/assets/11788009/427bb0f1-b92c-45c7-8a16-3a044f0213a2">

Search result

<img width="952" alt="search2" src="https://github.com/sashokrist/book-library/assets/11788009/e88922c0-3b91-4b1a-b84f-a13cea23ccf6">

Keep count of the books and users

<img width="935" alt="count1" src="https://github.com/sashokrist/book-library/assets/11788009/62b7e914-518d-493c-a15a-0fcda3d49d5b">

<img width="917" alt="count3" src="https://github.com/sashokrist/book-library/assets/11788009/ac458018-be6d-45fa-a79e-3743c19a1b7e">

<img width="933" alt="count2" src="https://github.com/sashokrist/book-library/assets/11788009/83c8aec5-fd05-4a45-a58a-db4ecbbdea9f">

Create user.

<img width="660" alt="create-user-command" src="https://github.com/sashokrist/book-library/assets/11788009/69e67ccd-19a9-4c8d-b6e5-e53b7bfac42f">









  
  

  



