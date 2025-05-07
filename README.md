# 🌐 Laravel Lang Sync Inertia (Vue.js / React)

![Untitled design](https://github.com/user-attachments/assets/bbefb4c4-e435-45ab-954a-17eafa1405ee)

**LaravelLangSyncInertia** is a Laravel package designed to **sync and manage language translations** with **Inertia.js** integration. It simplifies multi-language support in Laravel applications, making it easier to work with dynamic language files and frontend translations seamlessly.

---


## ❓ Why Use LaravelLangSyncInertia?

This package is perfect for Laravel developers using Inertia.js with **Vue** or **React**. It helps you:

* ✅ Easily manage language files
* ✅ Dynamically sync translations with Inertia.js
* ✅ Reduce boilerplate for loading translations
* ✅ Automatically share translations with all pages
* ✅ Improve performance with smart caching

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

To install the package, run the following command via Composer:

```bash
composer require erag/laravel-lang-sync-inertia
```

---

## 🛠️ Publish Configuration & Composables

To publish the configuration and composables, run:

```bash
php artisan erag:install-lang
```

This will publish:

* ✅ `config/lang-manager.php` — for customizing the language path
* ✅ `resources/js/composables/useLang.ts` — for Vue (if selected)
* ✅ `resources/js/hooks/useLang.tsx` — for React (if selected)

During installation, you'll be prompted to choose either **Vue** or **React** for your frontend framework.

---

## 🚀 Usage

### 🔟 Where to Use `syncLangFiles()`?

Call `syncLangFiles()` **inside your controller method** **before rendering an Inertia view** to load necessary language files and share them with the frontend.

---

### 1️⃣ Load a Single File

📍 **Example in Controller:**

```php
use Inertia\Inertia;

public function index()
{
    syncLangFiles('auth'); // Load a single language file

    return Inertia::render('Dashboard');
}
```

✅ This loads `resources/lang/{locale}/auth.php` and makes translations available to Vue or React components.

---

### 2️⃣ Load Multiple Files

📍 **Example in Controller:**

```php
use Inertia\Inertia;

public function profile()
{
    syncLangFiles(['auth', 'profile']); // Load multiple files

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
        syncLangFiles(['admin', 'auth']);
    } else {
        syncLangFiles(['user', 'auth']);
    }

    return Inertia::render('UserTypePage');
}
```

✅ This approach allows dynamic loading of translation files based on conditions.

---

## 🖥️ Frontend Usage

### ✅ Vue Example

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

### ✅ React Example

```tsx
import React from 'react'
import { useLang } from '@/hooks/useLang'

export default function Dashboard() {
    const { trans, __ } = useLang()

    return (
        <div>
            <h1>{__('auth.name')}</h1>
            <p>{trans('auth.greeting', { name: 'Amit' })}</p>
        </div>
    )
}
```

---

## 📡 Access Inertia Shared Props

**Vue:**

```ts
import { usePage } from '@inertiajs/vue3'

const { lang } = usePage().props
```

**React:**

```tsx
import { usePage } from '@inertiajs/react'

const { lang } = usePage().props
```

You can directly access the full language object shared by Inertia.

---

## 🧠 Placeholder Support in Translations

### 🔤 Example: `lang/en/auth.php`

```php
return [
    'welcome' => 'Welcome, {name}!',
];
```

### Usage in Vue/React:

```js
trans('auth.welcome', { name: 'John' })
__('auth.welcome', { name: 'John' })
__('auth.welcome', 'Vue') // For plain string
```

---

## 🗂️ Translation File Location

Language files are loaded based on the current Laravel locale. By default, Laravel uses `resources/lang/{locale}` structure:

```
resources/lang/
├── en/
│   └── auth.php
├── hi/
│   └── auth.php
```

When calling:

```php
syncLangFiles('auth');
```

It dynamically loads `resources/lang/{locale}/auth.php`.

---

## ⚙️ Configuration

You can customize the language directory by modifying `config/lang-manager.php`:

```php
return [
    'lang_path' => lang_path(), // Default: /resources/lang
];
```

---

## 🧩 Composables Location

* **Vue:** `resources/js/composables/useLang.ts`
* **React:** `resources/js/hooks/useLang.tsx`

You can modify the location or structure of these files by adjusting the published files.

---

## 📄 License

This package is licensed under the [MIT License](https://opensource.org/licenses/MIT).

---

## 🤝 Contributing

Pull requests and issues are welcome!
Let’s work together to improve localization in Laravel! 💬

---
