**Purpose**
- **Scope:** Guidance for AI coding agents working on this Laravel student-portal app (PHP 8.2, Laravel 12).

**Quick Setup**
- **Install & build:** run the composer `setup` script which installs PHP deps, migrates DB, and builds frontend: `composer run-script setup`.
- **Dev (fast):** the repo provides a combined dev script: `composer run-script dev` — it launches `php artisan serve`, `php artisan queue:listen` and `npm run dev` via `npx concurrently`.
- **Frontend only:** use `npm run dev` or `npm run build` (uses Vite).
- **Tests:** run `composer run-script test` (calls `php artisan test`). PHPUnit/Pest config is in `phpunit.xml` and uses in-memory sqlite for tests.

**Big-picture architecture & patterns**
- **Framework:** standard Laravel app layout; PHP backend with Blade views and Vite-built frontend assets.
- **Routing & controllers:** many example routes are implemented as closures in [routes/web.php](routes/web.php). Look there for sample data flows (e.g., the `/students` list and `/students/{id}` pages).
- **Views:** Blade templates live under `resources/views/` (see [resources/views/students/index.blade.php](resources/views/students/index.blade.php)). Small interactive behavior is implemented inline (vanilla JS search in `students/index.blade.php`).
- **Models & persistence:** `app/Models/User.php` follows standard Eloquent conventions; however the current `/students` pages use static sample arrays (no DB integration) — expect controllers/routes to be the place to integrate DB-backed models.

**Developer workflows & important scripts**
- **Project-wide scripts:** see `composer.json` for `setup`, `dev`, and `test`. Prefer these scripts so environment steps (env copy, key generation, migrations, build) run consistently.
- **Testing specifics:** `phpunit.xml` sets `DB_CONNECTION=sqlite` and `DB_DATABASE=:memory:` for fast tests. Use `php artisan test` or `composer run-script test`.
- **Serving locally:** `php artisan serve` is used by the `dev` script; with XAMPP you can also serve via Apache but ensure `.env` and `APP_URL` are set.

**Project-specific conventions & notable patterns**
- **Temporary/sample data in routes:** Many student pages use hard-coded arrays inside route closures in [routes/web.php](routes/web.php). When adding real persistence, replace those closures with controller actions and Eloquent queries.
- **Blade layout usage:** top-level layout file is `resources/views/layout.blade.php` and pages extend it (`@extends('layout')`). Follow its structure for CSS/JS includes.
- **Inline JS for small interactions:** small features are implemented directly in Blade (see `studentSearch` filtering in `students/index.blade.php`). For larger features, prefer separate JS modules under `resources/js` and build via Vite.

**Integration points & external deps**
- **Composer packages:** core deps in `composer.json` (Laravel core, tinker) and dev tools include Pest, Pint, Sail. Use the composer scripts to keep behaviour consistent.
- **Node tooling:** Vite + Tailwind + `laravel-vite-plugin`. Frontend entry points are in `resources/js` and `resources/css` (see `vite.config.js`).

**What to change when adding features**
- **Routing:** move logic from route closures to controller methods under `app/Http/Controllers/` and register routes in `routes/web.php` (use route groups where appropriate).
- **Database:** add migrations in `database/migrations/` and factories in `database/factories/` (there is `UserFactory.php` example). Tests will run against sqlite in-memory by default.
- **Frontend assets:** add modules to `resources/js` and import them in `resources/js/app.js`; update Vite entry if needed and run `npm run build` or `npm run dev`.

**Examples (copy-paste hints)**
- Start full local dev: `composer run-script dev`
- Run tests quickly: `composer run-script test`
- Replace sample students list with Eloquent: in `routes/web.php` replace the sample array with `Student::all()` (after creating `Student` model and migration) and return the same view.

**When unsure — where to look**
- Routing samples: [routes/web.php](routes/web.php)
- Blade views: `resources/views/` (student pages in `resources/views/students/`)
- Model example: [app/Models/User.php](app/Models/User.php)
- Dev scripts: [composer.json](composer.json) and [package.json](package.json)

If any parts of the codebase rely on external services or additional setup you expect I missed, tell me which area to inspect and I'll expand the instructions.
