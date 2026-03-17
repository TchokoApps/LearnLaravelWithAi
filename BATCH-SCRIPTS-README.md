# Laravel Batch Scripts - Quick Reference

All batch scripts are located in the root directory of the Laravel project. Simply double-click or run from CMD/PowerShell.

## 📋 Files Overview

### 0_MAIN-MENU.bat
**Master menu** for quick access to all command groups. Start here!

```cmd
0_MAIN-MENU.bat
```

---

## 1️⃣ 1_app-run-debug.bat
**App run and debug commands**

Commands included:
- `php artisan serve` - Start development server (http://localhost:8000)
- `php artisan tinker` - Interactive shell for testing code
- `php artisan route:list` - List all registered routes
- `php artisan about` - Display framework information
- `php artisan pail` - Real-time log monitoring

**When to use:** Development, debugging, testing quick code snippets

---

## 2️⃣ 2_cache-performance.bat
**Cache and performance optimization**

Commands included:
- `php artisan optimize` - Optimize application for production
- `php artisan optimize:clear` - Clear optimization cache
- `php artisan config:cache` - Cache configuration
- `php artisan route:cache` - Cache routes (better performance)
- `php artisan view:cache` - Cache compiled views
- **Clear all cache** - Remove all caches at once

**When to use:** Deployment, fixing configuration issues, improving performance

---

## 3️⃣ 3_database-workflow.bat
**Database migrations and seeding**

Commands included:
- `php artisan migrate` - Run pending migrations
- `php artisan migrate:rollback` - Undo last migration batch
- `php artisan migrate:fresh --seed` - ⚠️ DROP all tables and reseed (destructive!)
- `php artisan db:seed` - Only seed data
- `php artisan db:show` - Display database information
- `php artisan db:table users` - Show table structure

**When to use:** 
- Setting up database
- Testing migrations
- Seeding test data
- Checking database schema

**⚠️ Fresh seed will delete all data!**

---

## 4️⃣ 4_code-generation.bat
**Generate Laravel components**

Commands included:
- `php artisan make:model` - Create model with migrations/factories/seeders (-mfs flags)
- `php artisan make:controller` - Create resource controller
- `php artisan make:request` - Create form request class
- `php artisan make:test` - Create test file
- `php artisan make:job` - Create queueable job

**Usage:** You'll be prompted to enter custom names for each component

**When to use:** When building new features, CRUD operations, API endpoints

---

## 5️⃣ 5_queues-jobs.bat
**Queue and background job management**

Commands included:
- `php artisan queue:work` - Process background jobs (runs continuously)
- `php artisan queue:restart` - Restart all queue workers
- `php artisan queue:failed` - List failed queue jobs
- `php artisan queue:retry all` - Retry all failed jobs

**When to use:** 
- Processing background jobs (email, image resize, etc.)
- Debugging failed queue jobs
- Restarting workers

**Note:** `queue:work` runs continuously - press Ctrl+C to stop

---

## 6️⃣ 6_scheduler-cron.bat
**Task scheduler and cron configuration**

Commands included:
- `php artisan schedule:list` - View all scheduled tasks
- `php artisan schedule:run` - Execute one pass of scheduler
- `php artisan schedule:work` - Run scheduler continuously

**When to use:** 
- Testing scheduled tasks
- Setting up background jobs
- Monitoring scheduler status

**Note:** For production, set up a cron job: `* * * * * php artisan schedule:run >> /dev/null 2>&1`

---

## 7️⃣ 7_testing-quality.bat
**Testing and quality assurance**

Commands included:
- `php artisan test` - Run all tests
- `php artisan test --filter=FeatureName` - Run specific test
- `php artisan test --parallel` - Run tests in parallel (faster)

**When to use:**
- Test-driven development
- Before committing code
- Regression testing
- Ensuring code quality

**Tip:** Use parallel mode for faster test execution!

---

## 8️⃣ 8_utilities.bat
**Development utilities**

Commands included:
- `npm run dev` - Start Vite development server (frontend)
- `npm run build` - Build assets for production
- `composer dump-autoload` - Regenerate autoloader
- `php artisan env` - Show current environment
- `php artisan status` - Check application status

**When to use:**
- Frontend development
- Asset compilation
- Checking configuration
- Status verification

---

## 🚀 Quick Start

1. **Open terminal** in the project directory (or double-click `0_MAIN-MENU.bat`)
2. **Select a batch file** from the menu
3. **Follow prompts** - each script is interactive
4. **Results displayed** - output shows in same window

---

## 💡 Common Workflows

### Starting Development
```
1. Run: 0_MAIN-MENU.bat
2. Select: 1_app-run-debug.bat → php artisan serve
3. In another terminal: 8_utilities.bat → npm run dev
```

### Database Setup
```
1. Run: 0_MAIN-MENU.bat
2. Select: 3_database-workflow.bat → migrate:fresh --seed
```

### Testing New Feature
```
1. Run: 4_code-generation.bat (create model/controller/test)
2. Run: 7_testing-quality.bat → run tests
3. Fix issues
4. Re-run tests
```

### Before Committing
```
1. Run: 7_testing-quality.bat (all tests pass?)
2. Run: 2_cache-performance.bat → clear all cache
3. Commit changes
```

---

## 📝 Notes

- All scripts use interactive menus - easy navigation
- Confirmation for destructive operations (like migrate:fresh)
- Press `Pause` to review output before continuing
- Press `Ctrl+C` to stop long-running commands (serve, queue:work, etc.)

---

## 🤔 Troubleshooting

**Command not found?**
- Ensure PHP and Composer are in your PATH
- Test: `php artisan --version`

**Port 8000 already in use?**
- Run with custom port: `php artisan serve --port=8001`

**Dependencies missing?**
- Run: `composer install && npm install`

---

**Last Updated:** March 17, 2026
