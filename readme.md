## LaravelStarter
laravel9 template with basics

### Step 1
```shell
ligne 60 ContactController -- remplacer contact@LaravelStarter.com par contact@appname.com
ligne 1 .env -- changer le app name
ligne 37 .env -- remplacer "no-reply@LaravelStarter.com" par -- "no-reply@appname.com"
```

### Step 2 
```shell
composer install
npm install
php artisan storage:link
php artisan migrate:fresh
php artisan serve
```

### Commands 
```shell
php artisan route:list --name=articles
php artisan make:request StorePostRequest
php artisan make:controller CategoryController --resource
php artisan make:Model Post -m
php artisan migrate:refresh --seed
```

### Links 
LangSwitcher
```shell
youtube.com/watch?v=DxqqcW_wFPM&list=PLX4adOBVJXaudcpmlpCZNVazpu1jRGxVB&index=2
```

ContactForm
```shell
https://www.positronx.io/laravel-contact-form-example-tutorial/
```

UserProfil and UserPassword Update
```shell
https://www.youtube.com/watch?v=NTc5FXmnWYc
```

Blog Feature
```shell
https://www.youtube.com/watch?v=F8iYtkBXoh4
```

Unique Slug Generation
```shell
https://codelapan.com/post/how-to-generate-unique-slug-in-laravel-8
```

Fit image / Pagination
```shell
https://www.youtube.com/watch?v=ImtZ5yENzgE&list=PLSNOHuL1GhdUieA7dV4QlCJQY0EyWMYlA&index=5
```