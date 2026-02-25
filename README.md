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
           "type": "vcs",
           "url": "https://github.com/codedbyfj/nexora"
       }
   ],
   "require": {
       "codedbyfj/nexora": "dev-main"
   }
   ```
3. Run `composer update`.
4. Run the installer: `php artisan nexora:install`.

## 🛠️ Frontend Development (Optional for Developers)
If you wish to modify the Vue components or CSS:
1. Navigate to the package directory: `cd packages/CodedByFJ/Nexora`.
2. Install dependencies: `npm install`.
3. Build assets: `npm run build`.

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
