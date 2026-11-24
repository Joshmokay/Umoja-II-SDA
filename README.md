# Umoja II Seventh-day Adventist Church - Website Application

## 1. Project Overview
This project is the official dynamic web application for the Umoja II Seventh-day Adventist Church. Built on the Laravel framework, this site manages departments, events, sermons, articles, and worship services dynamically through a professional MySQL-backed CMS. The visual language strictly inherits the UI philosophy of the `AYAdvent` project (using Tailwind CSS, and native spacing) while adapting typography to `Georgia` for a classic, institutional feel. No emojis are used throughout the application.

## 2. Technology Stack
**Backend**: PHP 8.0, Laravel 9
**Frontend**: HTML5, Tailwind CSS, Alpine.js, Laravel Blade
**Database**: MySQL (via XAMPP)
**Local Environment**: XAMPP Apache & MySQL

## 3. Installation Instructions
1. Clone or copy the project into your `C:\xampp\htdocs\umoja2-sda-church` folder.
2. Ensure you have Composer and Node.js installed.
3. Open a terminal in the project directory and run:
   ```bash
   composer install
   npm install
   npm run dev
   ```

## 4. XAMPP Setup Instructions
- Launch **XAMPP Control Panel**.
- Start **Apache** and **MySQL** modules.
- Ensure Apache is serving `C:\xampp\htdocs`.
- The application will be accessible at: `http://localhost/umoja2-sda-church/public/`

## 5. Database Configuration
1. Open XAMPP's phpMyAdmin or MySQL CLI.
2. Create a new database named: `umoja2_sda_church`.
3. The default credentials in XAMPP are typically username `root` with a blank password.

## 6. Environment Configuration
Copy `.env.example` to `.env` (if not already present).
Ensure the database settings match your local XAMPP configuration:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=umoja2_sda_church
DB_USERNAME=root
DB_PASSWORD=
```
Run `php artisan key:generate`.

## 7. How to run the project
Once installed, run:
```bash
php artisan migrate
```
Access the application in your browser via your XAMPP local server:
`http://localhost/umoja2-sda-church/public`
Do not rely on `php artisan serve` for testing the main features.

## 8. Project Architecture
The application follows standard Laravel MVC conventions:
- **Models & Migrations**: Defined for Users, Roles, Departments, Events, Sermons, Articles, etc.
- **Controllers**: Handle HTTP requests (e.g., `HomeController`).
- **Views**: Reusable Blade components for the navbar, footer, and individual section cards.

## 9. Folder Structure
- `app/Models/`: Eloquent database models.
- `app/Http/Controllers/`: Logic and request handling.
- `database/migrations/`: Database schema definitions.
- `resources/views/`: Blade templates, layouts, partials, and components.
- `routes/web.php`: Application routes.

## 10. Routes
- `/` - Home
- `/dashboard` - Admin Dashboard (Protected by Auth)

## 11. Database Models
- `User`, `Role`
- `Department`, `DepartmentLeader`
- `Event`, `Sermon`, `Article`, `ArticleCategory`
- `Announcement`, `GalleryAlbum`, `GalleryImage`, `Media`
- `ServiceTime`, `PrayerRequest`, `NewsletterSubscriber`, `Download`
- `HomepageSection`, `SiteSetting`

## 12. Major Features
- **Dynamic Landing Page**: 14 fully responsive sections perfectly integrated with Tailwind CSS.
- **SDA Branding**: Official Adventist logo and typography integrated into the unified header navbar, as the desktop sidebar layout has been retired for a modern full-width aesthetic.
- **Sabbath School Lesson Platform**: A file-based service architecture that dynamically reads, parses, and serves Markdown and YAML lesson resources for Adults and Children in both English (`en`) and Swahili (`sw`) directly from the `sabbath-school-lessons-stage` directory. Caching is used heavily to prevent unnecessary parsing.

## 13. Admin Functionality
Laravel Breeze provides the baseline authentication scaffolding. Role-based middleware will protect CMS routes for Super Admins, Admins, and Department Leaders.

## 14. Department Architecture
Departments are driven by the `departments` table. Related entities (events, articles, leaders) link back to departments using a `department_id` foreign key constraint, enforcing DRY principles.

## 15. Assets and Design System
The visual theme is a direct descendant of the AYAdvent project. Tailwind configuration has been explicitly mapped to `adventist-blue`, `primary`, and `secondary` palette colors. Fonts emphasize `Georgia`.

## 16. Known Issues
- Currently relying on placeholder asset images while the CMS backend for file uploads is finalized.

## 17. Development Notes
- Avoid inserting any emojis in code or database seeds.

## 18. Change log

### 2026-08-12
- Created dynamic Laravel 9 project structure in XAMPP `htdocs`.
- Configured MySQL database `umoja2_sda_church`.
- Copied and adapted Tailwind config and design system from AYAdvent.
- Implemented exact AYAdvent navbar components, updated with Umoja II SDA Church branding and white SVG logo (SDA Sidebar layout was subsequently removed for a modern full-width approach).
- Created `HomeController` and implemented 14-section homepage in Blade.
- Generated all requested Models and Migrations.
- Configured Laravel Breeze authentication scaffolding.

### 2026-08-12: Debugging and Stabilization Pass
- **Bug 1 Identified**: `Undefined variable $heroSlides`, `$galleries`, `$ministries` etc.
  - **Root Cause**: The components migrated from the AYAdvent project expected specific variables to be passed from the Controller.
  - **Fix Applied**: Updated `HomeController@index` to pass empty fallback arrays for all required partial variables (`$heroSlides`, `$upcomingEvents`, etc.) to gracefully handle empty database states. Added null-coalescing (`?? []`) operators to all Blade `@foreach` and `@if` directives inside the `resources/views/partials/` directory.
- **Bug 2 Identified**: `Target class [App\Services\SabbathSchool\SabbathSchoolService] does not exist.`
  - **Root Cause**: The `sabbath-school.blade.php` partial relies on a backend service to fetch lesson data, which was missing in the new project.
  - **Fix Applied**: Copied the entire `app/Services/` directory from the AYAdvent project to ensure all service dependencies are resolved.
- **Bug 3 Identified**: `Route [sabbath-school.index] not defined.`
  - **Root Cause**: Migrated UI components contained links to specific pages (like `/search` and `/ministries/{slug}`) that do not yet exist in this new project.
  - **Fix Applied**: Implemented fallback placeholder routes in `routes/web.php` that safely redirect back to `/` instead of throwing `RouteNotFoundException`.
- **Bug 4 Identified**: `Undefined variable $dailyVerse`
  - **Root Cause**: The `daily-verse.blade.php` component lacked a fallback if `$dailyVerse` was not passed.
  - **Fix Applied**: Safely updated `HomeController` to pass `$dailyVerse => null` and adjusted the Blade conditional to `@if($dailyVerse ?? false)`.
- **Verification**: Cleared all application caches (`php artisan optimize:clear`, `view:clear`, `route:clear`). Confirmed `storage/logs/laravel.log` has zero remaining application crash exceptions. Homepage correctly loads via XAMPP Apache `localhost` without errors. No emojis are used.

### 2026-08-12: Sabbath School Lesson Platform
- **Architecture Analyzed**: Analyzed `/sabbath-school-lessons-stage/README.md` and determined the optimal approach was a File-Based caching Service layer rather than database duplication, preserving the YAML and Markdown structures.
- **Languages Implemented**: Identified `en` (English) and `sw` (Swahili) as the primary required languages, including dynamic fallbacks.
- **Categories Implemented**: Fully integrated Adult and all Children's categories (e.g., InVerse, Easy Reading, Primary, Kindergarten) automatically derived from `groups.yml`.
- **Parsing**: Added `symfony/yaml` via Composer to safely parse metadata. Used Laravel's `Str::markdown()` for lesson body rendering.
- **Views Created**: Built a robust set of public views (`index`, `language`, `quarter`, `lesson`) with fully responsive mobile and desktop navigation.
- **Routing**: Integrated Sabbath School paths into `routes/web.php` and the main site header.

### 2026-08-13: Professional Admin Dashboard
- **Architecture Upgraded**: Removed the default Laravel Breeze dashboard and built a professional Church CMS administration layout.
- **Layout Restructured**: Created a dynamic 2-column off-canvas Sidebar (`layouts.admin.sidebar`) and Topbar (`layouts.admin.topbar`) layout framework.
- **DashboardController Implemented**: Created `Admin\DashboardController` to dynamically inject database statistics directly into the dashboard view.
- **Widgets Developed**: 
  - Dynamic Statistics Grid (Events, Articles, Sermons, Gallery, Prayer Requests).
  - Upcoming Events (with date tracking).
  - Recent Content listing.
  - Secure Prayer Request Summary (metadata only).
- **Security Check**: Verified that the dashboard requires correct authentication and restricts private data visibility.
