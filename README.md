<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# KP-PPID: PPID Dispora Jabar Portfolio

## Project Description
This is a modern portfolio website for PPID (Pejabat Pengelola Informasi dan Dokumentasi) Dispora Jabar built with Laravel. It features a responsive design with modern UI elements, animations, and a full-featured admin panel to control all content.

## Features

- **Modern Design**: Clean, professional layout with animations and interactive elements
- **Responsive Layout**: Optimized for all screen sizes from mobile to desktop
- **Interactive Components**: Hover effects, overlays, and smooth transitions
- **Admin Dashboard**: Complete control panel for managing all website content
- **Multiple Content Sections**:
  - Hero carousel with animated text
  - Video gallery with YouTube integration
  - Portfolio showcase with filterable categories
  - About section with custom content
  - Information sources with interactive cards
  - Guestbook for visitor feedback
  - Complaint submission system

## How to Install
1. Clone the project
2. Go to the project root directory and run `composer install` and `npm install`
3. Create `.env` file and copy content from `.env.example`
4. Run `php artisan key:generate` from terminal
5. Change database information in `.env`
6. Run migrations by executing `php artisan migrate`
7. Seed the database with dummy data by running `php artisan db:seed --class=DummyDataSeeder`
8. Generate storage link with `php artisan storage:link`
9. Start the project by running `php artisan serve`
10. Access the site at http://localhost:8000

## Demo Account
- Admin URL: http://localhost:8000/admin
- Email: test@example.com
- Password: password

## Deployment
For deployment instructions, please refer to the [DEPLOYMENT_GUIDE.md](./DEPLOYMENT_GUIDE.md) file.

## Technologies Used
- Laravel 9+
- Bootstrap 5
- JavaScript/jQuery
- MySQL/MariaDB
- Font Awesome
- Animate.css & WOW.js
- Owl Carousel
- Lightbox

