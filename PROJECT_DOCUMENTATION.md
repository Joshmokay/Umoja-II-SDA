# Umoja II Seventh-day Adventist Church - Project Documentation

## 1. Project Overview & Structure
This is a comprehensive web application built for the Umoja II Seventh-day Adventist Church. It manages public-facing content (Sabbath School lessons, events, sermons, articles, ministries) and includes a secure administrative dashboard.

**Root Directory:** `C:\xampp\htdocs\umoja2-sda-church`

**Key Directories:**
*   `app/`: Core application logic (Models, Controllers, Middleware, Services).
*   `config/`: Framework and package configurations.
*   `database/`: Migrations, Seeders, and Factories.
*   `public/`: Publicly accessible files (`index.php`, generated CSS/JS, compiled assets).
*   `resources/views/`: Blade templates and UI components.
*   `routes/`: Routing definitions (`web.php`, `api.php`, `auth.php`).
*   `storage/`: Logs, framework cache, and locally uploaded files (`storage/app/public/`).
*   `sabbath-school-lessons-stage/`: An external file-based directory containing structured YAML and Markdown files for the Sabbath School lesson integration.

---

## 2. Technology Stack & Dependencies

### Backend
*   **PHP:** 8.0+
*   **Framework:** Laravel 9.x
*   **Database:** MySQL / MariaDB
*   **ORM:** Eloquent (Laravel standard)
*   **Key Packages:**
    *   `barryvdh/laravel-dompdf`: PDF generation (e.g., downloading Bible stories).
    *   `mews/purifier`: HTML sanitization to prevent XSS attacks.
    *   `symfony/yaml`: YAML parsing for Sabbath school lessons.
    *   `doctrine/dbal`: Modifying database schema columns.
    *   `laravel/breeze` & `laravel/sanctum`: Authentication mechanisms.

### Frontend
*   **Templating:** Laravel Blade
*   **CSS Framework:** Tailwind CSS 3.1.0
*   **JavaScript:** Alpine.js 3 (for lightweight reactivity like dropdowns and modals)
*   **Asset Bundler:** Laravel Mix 6.0 (`webpack`)

---

## 3. Frontend Architecture

The frontend relies heavily on Blade layout inheritance and reusable partial components.

*   **Main Layouts:**
    *   `layouts.front`: The primary wrapper for public pages.
    *   `layouts.admin`: The wrapper for the secure backend dashboard.
    *   `layouts.app` / `layouts.guest`: Inherited from Breeze for Auth views.
*   **UI Components & Partials (`resources/views/partials/`):**
    *   The homepage is constructed from distinct partials (`hero.blade.php`, `leadership.blade.php`, `upcoming-events.blade.php`, `sabbath-school.blade.php`, `sermons.blade.php`).
    *   The design uses a custom Tailwind palette (`primary` blue, `secondary`, `adventist-blue`, `slate-900`) defined in `tailwind.config.js`.

---

## 4. Backend Architecture

The backend follows the MVC (Model-View-Controller) design pattern.

### Routing (`routes/web.php`)
*   **Public Routes:** Home (`/`), About (`/about/fundamental-beliefs`), Events, Ministries, Sabbath School Reader, Articles, and POST routes for Prayer Requests.
*   **Auth Routes:** Defined via `require __DIR__.'/auth.php'`.
*   **Admin Routes:** Protected by `['auth', 'verified', 'admin']` middleware, utilizing Resource controllers mapped to `/admin/...`.

### Controllers
Grouped logically into public and admin namespaces:
*   `App\Http\Controllers`: Handles public data fetching (e.g., `SabbathSchoolController`, `HomeController`, `ArticleController`).
*   `App\Http\Controllers\Admin`: Handles CRUD logic for the dashboard (e.g., `Admin\EventController`, `Admin\LeaderController`).

### Services
*   `App\Services\SabbathSchoolService`: A specialized service class responsible for reading, parsing, and caching the external YAML/Markdown files located in `sabbath-school-lessons-stage/`.

---

## 5. Database Structure

The database utilizes Eloquent ORM. Below are the key tables and their purposes:

*   **Authentication & Roles:**
    *   `users`: Core user accounts (includes `is_admin` boolean flag).
    *   `roles`: (Optional/Expansion) For nuanced permissions.
*   **Content Management:**
    *   `articles` / `article_categories`: Church news and blog posts.
    *   `events`: Calendar events.
    *   `sermons`: Audio/Video sermon links and details.
    *   `announcements`: Short-form notices.
    *   `gallery_albums` / `gallery_images`: Photo galleries.
*   **Church Organization:**
    *   `leaders`: Church staff and leadership profiles (Name, Role, Portrait, Description).
    *   `departments` / `department_leaders`: Mapping leaders to ministries.
    *   `service_times`: Scheduling for church services.
    *   `church_programs` / `program_activities`: Detailed scheduling for specific days.
*   **Educational Content:**
    *   `study_guides`: Uploaded/created study materials.
    *   `bible_stories` / `bible_story_lessons` / `quiz_questions`: Content for Children's Ministry.
*   **Interactivity:**
    *   `prayer_requests`: Submitted prayers from the public.
    *   `newsletter_subscribers`: Email collection.
    *   `site_settings`: Global configuration overrides.

---

## 6. Authentication and Authorization

*   **Flow:** Standard Laravel Breeze cookie-based authentication.
*   **Authorization:** Handled via a custom middleware (`App\Http\Middleware\AdminMiddleware`).
*   **Admin Identification:** Access to the `/admin` dashboard requires the authenticated user to have `is_admin = true` in the database.

---

## 7. Admin and User Functionality

### Public Users
*   View all public content (events, leaders, stories, programs).
*   Read the interactive Sabbath School lessons.
*   Submit public/private prayer requests.

### Administrators
*   Access the secure `/admin` dashboard.
*   Manage (Create, Read, Update, Delete) church leadership profiles.
*   Publish Articles, Events, and Bible Stories.
*   Update Site Settings.
*   View Prayer Requests (Note: highly restricted by privacy mechanisms).

---

## 8. Security Mechanisms & Privacy

*   **CSRF Protection:** Active on all forms (`@csrf`).
*   **Input Sanitization:** User-submitted rich text is sanitized using `mews/purifier` to block malicious HTML/JS.
*   **Prayer Request Encryption (CRITICAL):** 
    *   Prayer requests (`name` and `request_text` columns) are encrypted **at rest** in the database using Laravel's `Crypt::encryptString()` (AES-256-CBC).
    *   The Admin dashboard is explicitly blocked from decrypting or displaying the plaintext contents of these prayers to protect congregant privacy. The database admins also cannot read the contents.
*   **File Uploads:** Validated strictly for MIME types and sizes in Controller validation rules.

---

## 9. Configuration & Environment Variables

The project relies on `.env` for environment-specific configurations.
*(Note: No actual secrets are documented here)*

*   `APP_ENV` / `APP_DEBUG`: Set to `production` and `false` for live environments.
*   `APP_KEY`: **CRITICAL.** This key is used to encrypt the Prayer Requests. If lost, all submitted prayers become permanently unreadable.
*   `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`: Database connection details.
*   `FILESYSTEM_DISK`: Standardized to `public` for image uploads.

---

## 10. File Upload and Storage Mechanisms

*   The application uses Laravel's `public` disk.
*   Files are physically stored in `storage/app/public/`.
*   A symlink connects `public/storage` to `storage/app/public` (generated via `php artisan storage:link`).
*   Images uploaded via the admin panel (like Leader portraits or Bible story cover images) are stored here and referenced in the DB as paths (e.g., `leaders/image123.jpg`).

---

## 11. Important Business Logic: Sabbath School Reader

The application includes a custom file-parser engine for Sabbath School lessons.
1.  **Source Data:** Exists externally in `sabbath-school-lessons-stage/src/`.
2.  **Service Logic:** `App\Services\SabbathSchoolService` reads `info.yml` files to discover languages, quarters, and lessons.
3.  **Parsing:** It parses YAML for metadata and extracts Markdown for the lesson content.
4.  **Display:** `SabbathSchoolController` passes this to `resources/views/sabbath-school/reader.blade.php`.
5.  **Limitation/Known Bug:** The parser currently treats all files in the lesson directories as text/markdown, causing errors if it encounters PDFs, JPGs, or MP4s. (Pending fix in `SabbathSchoolController->lesson()`).

---

## 12. Deployment and Setup Instructions

### Local Setup
1.  `composer install` (Install PHP dependencies).
2.  `npm install` (Install JS/CSS dependencies).
3.  Copy `.env.example` to `.env` and configure database credentials.
4.  `php artisan key:generate` (Generate encryption key).
5.  `php artisan migrate` (Run database migrations).
6.  `php artisan storage:link` (Create symlink for image uploads).
7.  `npm run dev` or `npm run watch` (Compile frontend assets for development).
8.  `php artisan serve` (Start local development server).

### Production Compilation
When modifying styles or Blade templates with arbitrary Tailwind classes, run:
`npm run prod && php artisan view:clear`
*(Note: on Windows, this is best executed as `cmd.exe /c "npm run prod && php artisan view:clear"`)*

---

## 13. Code Feature Map (Where to find what)

| Feature | Core Code Location |
| :--- | :--- |
| **Homepage Layout** | `resources/views/home/index.blade.php` |
| **Homepage Sections (Partials)** | `resources/views/partials/` |
| **Sabbath School Logic** | `app/Services/SabbathSchoolService.php`, `app/Http/Controllers/SabbathSchoolController.php` |
| **Sabbath School UI** | `resources/views/sabbath-school/` |
| **Leadership Logic (Admin)** | `app/Http/Controllers/Admin/LeaderController.php` |
| **Prayer Request Encryption** | `app/Http/Controllers/PrayerRequestController.php` |
| **Admin Dashboard UI** | `resources/views/layouts/admin/`, `resources/views/admin/` |
| **Routing Definitions** | `routes/web.php` |
| **CSS/Design System** | `tailwind.config.js`, `resources/css/app.css` |
| **Public User Logic** | `app/Models/User.php`, `app/Http/Controllers/Auth/` |
| **Database Schemas** | `database/migrations/` |

---

## 14. Technical Debt & Known Limitations

1.  **Sabbath School Asset Handling:** The Markdown reader attempts to `File::get()` all content in lesson folders. Binary files (PDFs/Images) inside those folders will break the reader. A file-extension filter needs to be implemented.
2.  **Tailwind JIT Compilation:** In Laravel Mix / Tailwind 3.1.0 setups, adding arbitrary bracket classes (e.g., `bg-[#06101e]`) directly into `.blade.php` files sometimes fails to compile to CSS in production mode. **Always use standard Tailwind palette colors** (e.g., `bg-slate-900`, `text-primary`) or define new ones in `tailwind.config.js` to ensure bulletproof compilation.
3.  **Prayer Management:** Because prayers are entirely encrypted and hidden from the UI for privacy, administrators cannot delete specific inappropriate prayers easily via the dashboard without deleting by timestamp or ID.
