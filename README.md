# Mindvize code sample

[Browse the repository structure](STRUCTURE.md). The snapshot follows the source project’s Laravel directory layout. Each folder contains selected source or a short README describing its role.

| Original path | What the code shows |
| --- | --- |
| [`routes/web.php`](routes/web.php) and [`CareerLibraryController.php`](app/Http/Controllers/CareerLibraryController.php) | Routes career library requests, preserves query parameters during pagination, and prepares consistent card data. |
| [`CareerCategory.php`](app/Models/CareerCategory.php) and [`Career.php`](app/Models/Career.php) | Models the category-to-career relationship with Eloquent. |
| [`SitemapGenerator.php`](app/Services/SitemapGenerator.php) and [`sitemap.blade.php`](resources/views/sitemap.blade.php) | Builds a sitemap from indexable routes, renders XML, and writes the rendered sitemap to the configured destination. |
| [`seo-preview.js`](resources/js/seo-preview.js) | Resolves metadata defaults and template values, tracks preview lengths, and reflects indexing directives. |
| [`stat-tile.blade.php`](resources/views/components/stat-tile.blade.php) and [`topic-card.blade.php`](resources/views/components/audience/topic-card.blade.php) | Render reusable Blade UI for dashboard statistics and public content. |
| [Feature test](tests/Feature/CareerLibraryResponsiveTest.php) and [unit test](tests/Unit/SitemapGeneratorFileTest.php) | Show coverage for out-of-range pagination and XML file output. |

This snapshot is intended for code review. The excerpts retain project implementation logic. Some reference application dependencies represented by folder notes. Environment settings, credentials, datasets, uploads, logs, and build output were excluded.

[Commit history](CommitHistory.md)
