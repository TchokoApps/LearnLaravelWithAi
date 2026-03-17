# Laravel Artisan Option 1 - Daily Dev Pro Shortlist

## 1. App run and debug
- php artisan serve
- php artisan tinker
- php artisan route:list
- php artisan about
- php artisan pail

## 2. Cache and performance
- php artisan optimize
- php artisan optimize:clear
- php artisan config:cache
- php artisan route:cache
- php artisan view:cache

## 3. Database workflow
- php artisan migrate
- php artisan migrate:rollback
- php artisan migrate:fresh --seed
- php artisan db:seed
- php artisan db:show
- php artisan db:table users

## 4. Code generation (make)
- php artisan make:model Post -mfs
- php artisan make:controller PostController --resource
- php artisan make:request StorePostRequest
- php artisan make:test PostTest
- php artisan make:job ProcessOrder

## 5. Queues and async jobs
- php artisan queue:work
- php artisan queue:restart
- php artisan queue:failed
- php artisan queue:retry all

## 6. Scheduler and cron
- php artisan schedule:list
- php artisan schedule:run
- php artisan schedule:work

## 7. Testing and quality
- php artisan test
- php artisan test --filter=FeatureName
- php artisan test --parallel

## 8. Storage and assets
- php artisan storage:link
- php artisan view:clear
- php artisan cache:clear
