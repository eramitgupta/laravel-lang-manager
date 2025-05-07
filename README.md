# 🌐 Laravel Lang Sync Inertia (Vue.js / React)

**LaravelLangSyncInertia** is a Laravel package designed to **sync and manage language translations** with **Inertia.js** integration. It simplifies multi-language support in Laravel applications, making it easier to work with dynamic language files and frontend translations seamlessly.

---

## ❓ Why Use LaravelLangSyncInertia?

LaravelLangSyncInertia is the perfect solution for Laravel developers using Inertia.js with Vue or React. It helps you:

✅ Easily manage language files
✅ Dynamically sync translations with Inertia.js
✅ Reduce boilerplate for loading translations
✅ Automatically share translations with all pages
✅ Improve performance with smart caching

---

## ✨ Features

* ⚙️ Inertia.js integration with automatic sharing
* 📂 Load single or multiple language files
* 🔄 Dynamic replacement support in translations
* 🧩 Supports both Vue.js and React
* 🧵 Built-in middleware for automatic sharing
* 🛠️ Helper functions like `trans()` and `__()` for frontend usage

---

## 📦 Installation

Install the package via Composer:

```bash
composer require erag/laravel-lang-sync-inertia
```

---

## 🛠️ Publish Configuration & Composables

Run the install command:

```bash
php artisan erag:install-lang
```

This publishes:

* ✅ `config/lang-manager.php` — for customizing language path
* ✅ `resources/js/composables/useLang.ts` — Vue/React composable for frontend translations

---

## 🚀 Usage

### 🔟 Where to Use `lang_file_load()`?

Call `lang_file_load()` **inside your controller method** **before returning an Inertia view**. This ensures the necessary language files are loaded and shared with the frontend.

---

### 1️⃣ Load a Single File

📍 **Example in Controller:**

```php
use Inertia\Inertia;

public function index()
{
    lang_file_load('auth'); // Load a single language file

    return Inertia::render('Dashboard');
}
```

✅ This loads `resources/lang/{locale}/auth.php` and makes the translations available to your Vue or React component.

---

### 2️⃣ Load Multiple Files

📍 **Example in Controller:**

```php
use Inertia\Inertia;

public function profile()
{
    lang_file_load(['auth', 'profile']); // Load multiple files

    return Inertia::render('Profile');
}
```

✅ This loads both `auth.php` and `profile.php` based on the active locale.

---

### 3️⃣ Load Based on Condition

```php
use Inertia\Inertia;

public function show($type)
{
    if ($type === 'admin') {
        lang_file_load(['admin', 'auth']);
    } else {
        lang_file_load(['user', 'auth']);
    }

    return Inertia::render('UserTypePage');
}
```

✅ Useful when different views or modules require different translation files.

---

## 💡 Vue/React Component Usage

### ✅ Vue Example:

```vue
<template>
    <div>
        <h1>{{ __('auth.name') }}</h1>
        <p>{{ trans('auth.greeting', { name: 'Amit' }) }}</p>
    </div>
</template>

<script setup>
import { useLang } from '@/composables/useLang'

const { trans, __ } = useLang()
</script>
```

---

## 📡 Access Inertia Shared Props

```js
import { usePage } from '@inertiajs/vue3'

const { lang } = usePage().props
```

You can directly access the full language object shared by Inertia.

---

## 🧠 Translation Placeholder Examples

### 🗂️ Example Translation File: `lang/en/auth.php`

```php
return [
    'welcome' => 'Welcome, {name}!',
];
```

### 🧩 Vue/React Usage:

```js
<p>{{ trans('auth.welcome', { name: 'John' }) }}</p>
```

OR:

```js
<p>{{ __('auth.welcome', { name: 'John' }) }}</p>
```

You can also pass a simple string:

```js
<p>{{ __('auth.welcome', 'Vue') }}</p>
```

---

## 🗂️ Translation File Location

Language files are loaded based on the current Laravel locale. By default, Laravel uses the `resources/lang/{locale}` structure.

📁 Directory structure example:

```
resources/lang/
├── en/
│   └── auth.php
├── hi/
│   └── auth.php
```

When using:

```php
lang_file_load('auth');
```

It loads:

```
resources/lang/en/auth.php   // If 'en' is the current app locale
```

---

## ⚙️ Configuration

Located at: `config/lang-manager.php`

```php
return [
    'lang_path' => lang_path(), // Default: /resources/lang
];
```

You can update this to a custom path if needed.

---

## 📄 License

Licensed under the [MIT License](https://opensource.org/licenses/MIT).

---

## 🤝 Contributing

Pull requests and issues are welcome!
Let’s make localization in Laravel even better 💬
