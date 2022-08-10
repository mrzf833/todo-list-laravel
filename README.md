# Laravel 9. PHP 8.1

# Cara Pemasangan


## Clone Source Code Ini, Lalu Jalankan

- `composer install`
- `cp .env.example .env`
- `setting .envnya`
    - `dbnya disesuaikan`
    - `config smtp email di sesuaikan`
- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan migrate:fresh --seed`
- `jika ingin menjalankan task scheduling lakukan`
    - `php artisan schedule:work`


## Roadmap yang telah di terapkan.
- <a href="https://github.com/Hasnayeen/laravel-developer-roadmap">url roadmap laravel</a>
### Belum Diterapkan
- Task Scheduling
- Caching
- Text Search
- Unit Test
- CI/CD
- Monitoring

### Sudah Diterapkan
- Routing
- Controller
- View -> Blade
- Model -> Eloquent & Database
- Error Handling -> try catch
- Request
- Response
- Authentication
- Middleware
- Validation
- Events
- Mail
- Notification
- Queue
- Broadcasting
- Authorization
- Service Container
- Service Provider
- Facade -> Helpers
- Package
- Security
- Deployment
- Architecture
