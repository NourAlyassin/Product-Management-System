# Product Management System (PMS)

A simple Product Management System built with pure PHP — no frameworks, no database. All data is stored in flat JSON files using PHP's File System functions, with Sessions handling authentication and the shopping cart.
This project was built to practice core PHP concepts: file handling (CRUD on JSON), sessions, form validation, file uploads, and organizing a real project into a clean folder structure.


Features
•	Authentication — login / logout with sessions
•	Products CRUD — list, create, update, delete products
•	Image Upload — upload product images; old images are removed automatically on update/delete
•	Shopping Cart — add products to cart (stored in session)
•	Orders — checkout and store each order (customer data + total) in a file
•	Form Validation — server-side validation for all inputs
•	Protected Routes — admin pages require a logged-in session



Tech Stack
Language:  PHP (procedural, no framework)
Storage:  JSON files (File System APIs)
