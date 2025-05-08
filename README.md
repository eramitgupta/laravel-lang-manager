# 🌐 Laravel Lang Sync Inertia (Vue.js / React)

![Untitled design](https://github.com/user-attachments/assets/bbefb4c4-e435-45ab-954a-17eafa1405ee)

**Laravel Lang Sync Inertia** is a Laravel package designed to **sync and manage language translations** with **Inertia.js** integration. It simplifies multi-language support in Laravel applications, making it easier to work with dynamic language files and frontend translations seamlessly.

---


## ❓ Why Use Laravel Lang Sync Inertia?

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
* 🌍 Automatically switches language folder based on current Laravel locale

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

* ✅ `config/inertia-lang.php` — for customizing the language path
* ✅ `resources/js/composables/useLang.ts` — for Vue (if selected)
* ✅ `resources/js/hooks/useLang.tsx` — for React (if selected)

During installation, you'll be prompted to choose either **Vue** or **React** for your frontend framework.

---

## 🚀 Usage Guide: `syncLangFiles()`

The `syncLangFiles()` function is a Laravel helper provided by this package. Use it inside your **controller methods** to load translation files and automatically **share them with your Vue or React frontend via Inertia.js**.

> ✅ Think of `syncLangFiles()` as a bridge between Laravel’s backend translations and your Inertia-powered frontend.

---

### 🧪 How It Works

Suppose you have the following language file:

📁 **`resources/lang/en/auth.php`**

```php
return [
    'welcome' => 'Welcome, {name}!',
    'greeting' => 'Hello!',
];
```

Now, you want to show `auth.welcome` and `auth.greeting` on the frontend using Vue or React.

---

### 🔁 Step-by-Step Example

#### 🔹 1. Load Translations in Controller

```php
use Inertia\Inertia;

public function dashboard()
{
    // Load the auth.php language file
    syncLangFiles('auth');

    return Inertia::render('Dashboard');
}
```

🧠 This loads the file `resources/lang/en/auth.php` based on the current Laravel locale and shares its content with Inertia.

---

### 💡 Frontend Usage

#### ✅ Vue Example

```vue
<template>
    <div>
        <h1>{{ __('auth.greeting') }}</h1>
        <p>{{ trans('auth.welcome', { name: 'John' }) }}</p>
    </div>
</template>

<script setup>
import { useLang } from '@/composables/useLang'

const { trans, __ } = useLang()
</script>
```

#### ✅ React Example

```tsx
import React from 'react'
import { useLang } from '@/hooks/useLang'

export default function Dashboard() {
    const { trans, __ } = useLang()

    return (
        <div>
            <h1>{__('auth.greeting')}</h1>
            <p>{trans('auth.welcome', { name: 'John' })}</p>
        </div>
    )
}
```

---

### 📤 Output on Page

When the above code is rendered, this will be the output:

```
Hello!
Welcome, John!
```

---

### 🧠 Notes on `trans()` vs `__()`

| Function  | Use Case | Description                                                  |
| --------- | -------- | ------------------------------------------------------------ |
| `trans()` | Advanced | Use when you need to pass dynamic placeholders like `{name}` |
| `__()`    | Simple   | Shortcut for quick access to translated strings              |

✅ You can use them interchangeably for basic translations.
✅ Both support placeholder replacement.

---

### 🛠 Example with Plain String

Sometimes, you might want to append something without a key:

```js
__('auth.welcome', 'Vue Developer')
// Output: "Welcome, {name}! Vue Developer" (if placeholder is not used)
```

But recommended usage is always with an object:

```js
trans('auth.welcome', { name: 'Amit' })
// Output: "Welcome, Amit!"
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

You can customize the language directory by modifying `config/inertia-lang.php`:

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
