# Laravel Artisan Option 2 - Intermediate and Pro Sets

## 1. Intermediate set (feature development workflow)
- Generate full CRUD starter:
  - php artisan make:model Product -mfs
  - php artisan make:controller ProductController --resource
  - php artisan make:request StoreProductRequest
- Run and verify DB changes:
  - php artisan migrate
  - php artisan db:seed
  - php artisan migrate:status
- Verify routes and behavior:
  - php artisan route:list
  - php artisan test --filter=Product
- Local optimization loop:
  - php artisan optimize:clear
  - php artisan config:cache

## 2. Pro set (team workflow and release prep)
- Pre-release checks:
  - php artisan test --parallel
  - php artisan route:cache
  - php artisan config:cache
  - php artisan view:cache
  - php artisan event:cache
- Build runtime caches:
  - php artisan optimize
- Validate production safety:
  - php artisan about
  - php artisan queue:monitor default
  - php artisan schedule:list

## 3. Pro set (deployment and rollback)
- Safe deploy sequence:
  - php artisan down
  - php artisan migrate --force
  - php artisan optimize
  - php artisan queue:restart
  - php artisan up
- If issues appear:
  - php artisan migrate:rollback --step=1
  - php artisan optimize:clear
  - php artisan up

## 4. Pro set (incidents and recovery)
- Queue failures:
  - php artisan queue:failed
  - php artisan queue:retry all
  - php artisan queue:flush
- Scheduler stuck or misfiring:
  - php artisan schedule:interrupt
  - php artisan schedule:run
  - php artisan schedule:work
- Cache corruption suspicion:
  - php artisan optimize:clear
  - php artisan cache:clear
  - php artisan config:clear
  - php artisan route:clear
  - php artisan view:clear

## 5. Pro set (database maintenance)
- Emergency reset in non-prod:
  - php artisan migrate:fresh --seed
- Introspection:
  - php artisan db:show
  - php artisan db:table users
- Cleanup:
  - php artisan db:wipe
