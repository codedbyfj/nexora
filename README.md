# Nexora - Modern Bagisto Section Builder

Nexora is a premium Bagisto package designed for rapid storefront development using a JSON-driven section builder. It follows official Bagisto architecture patterns (Repository & Proxy) and is fully optimized for performance.

## 🚀 Features
- **Section Builder**: Admin UI to drag-and-drop homepage sections.
- **Enterprise Caching**: Multi-channel and multi-locale caching for high performance.
- **Official Patterns**: Strictly adheres to Bagisto's Repository and Proxy patterns.
- **Tailwind Ready**: Modern design system with responsive Blade components.
- **Safe Overrides**: Prepend theme namespaces without modifying core files.

## 📦 Installation
1. Clone the repository into your Bagisto project's root.
2. Add the package to your root `composer.json`:
   ```json
   "repositories": [
       {
           "type": "path",
           "url": "packages/CodedByFJ/Nexora"
       }
   ],
   "require": {
       "codedbyfj/nexora": "@dev"
   }
   ```
3. Run `composer update`.
4. Run migrations: `php artisan migrate`.
5. Publish assets: `php artisan vendor:publish --tag=nexora-assets`.

## 🛠️ Components
- Hero Section
- Banner Section
- Featured Products (Eager Loaded)
- Category Grid
- Custom HTML Section

## 📜 Authors
- **CodedByFJ** - *Initial Work*

## ⚖️ License
Proprietary - All rights reserved.
