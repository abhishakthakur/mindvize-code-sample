# Repository structure

Mindvize uses Laravel, Blade, and Vite. Requests enter through `routes/` and `app/Http/`. Application models and services live in `app/`, while Blade views, JavaScript, and CSS live under `resources/`.

```text
mindvize-portfolio-demo/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── README.md
│   │   │   ├── Concerns/
│   │   │   │   └── README.md
│   │   │   ├── CareerLibraryController.php
│   │   │   └── Controller.php
│   │   ├── Middleware/
│   │   │   └── README.md
│   │   ├── Requests/
│   │   │   ├── Auth/
│   │   │   │   └── README.md
│   │   │   └── README.md
│   │   └── README.md
│   ├── Models/
│   │   ├── Career.php
│   │   └── CareerCategory.php
│   ├── Providers/
│   │   └── README.md
│   ├── Services/
│   │   └── SitemapGenerator.php
│   ├── Support/
│   │   └── README.md
│   ├── View/
│   │   ├── Components/
│   │   │   └── GuestLayout.php
│   │   └── README.md
│   └── README.md
├── bootstrap/
│   ├── cache/
│   │   └── README.md
│   └── README.md
├── config/
│   └── README.md
├── database/
│   ├── factories/
│   │   └── README.md
│   ├── migrations/
│   │   └── README.md
│   ├── seeders/
│   │   └── README.md
│   └── README.md
├── docs/
│   └── README.md
├── public/
│   ├── build/
│   │   └── README.md
│   ├── favicon/
│   │   └── README.md
│   ├── images/
│   │   └── README.md
│   └── README.md
├── resources/
│   ├── css/
│   │   ├── pages/
│   │   │   └── career-library.css
│   │   └── README.md
│   ├── data/
│   │   └── README.md
│   ├── js/
│   │   └── seo-preview.js
│   ├── views/
│   │   ├── auth/
│   │   │   └── README.md
│   │   ├── components/
│   │   │   ├── about/
│   │   │   │   └── README.md
│   │   │   ├── audience/
│   │   │   │   └── topic-card.blade.php
│   │   │   ├── marketing/
│   │   │   │   └── README.md
│   │   │   ├── who-we-help/
│   │   │   │   └── README.md
│   │   │   └── stat-tile.blade.php
│   │   ├── layouts/
│   │   │   └── README.md
│   │   └── sitemap.blade.php
│   └── README.md
├── routes/
│   └── web.php
├── scripts/
│   └── README.md
├── storage/
│   ├── app/
│   │   └── README.md
│   ├── framework/
│   │   └── README.md
│   ├── logs/
│   │   └── README.md
│   └── README.md
├── tests/
│   ├── Feature/
│   │   └── CareerLibraryResponsiveTest.php
│   ├── Unit/
│   │   └── SitemapGeneratorFileTest.php
│   └── README.md
├── README.md
└── STRUCTURE.md
```

The original checkout also contains `artisan`, `composer.json`, `package.json`, `vite.config.js`, and `bootstrap/app.php`. Those paths handle the CLI, dependency manifests, frontend builds, and application startup.
