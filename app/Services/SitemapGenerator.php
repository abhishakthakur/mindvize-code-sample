<?php

namespace App\Services;

use App\Models\SeoMeta;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use RuntimeException;

class SitemapGenerator
{
    public function __construct(private readonly Filesystem $files) {}

    public function urls(): Collection
    {
        $overrides = SeoMeta::all()->keyBy('route_name');

        return collect(array_keys(SeoMeta::sitemapPages()))
            ->map(function ($routeName) use ($overrides) {
                $seo = $overrides->get($routeName);
                $robots = $seo?->robots ?: SeoMeta::defaultsFor($routeName)['robots'];

                return [
                    'route_name' => $routeName,
                    'robots' => $robots,
                    'loc' => route($routeName),
                    'lastmod' => ($seo?->updated_at ?? now())->toAtomString(),
                    'priority' => $routeName === 'home' ? '1.0' : '0.7',
                ];
            })
            ->reject(fn ($url) => str_contains($url['robots'], 'noindex'))
            ->values();
    }

    public function render(): string
    {
        return view('sitemap', ['urls' => $this->urls()])->render();
    }

    public function write(?string $path = null): string
    {
        $path ??= public_path('sitemap.xml');
        $directory = dirname($path);

        if (! $this->files->isDirectory($directory) || ! $this->files->isWritable($directory)) {
            throw new RuntimeException("The sitemap directory is not writable: {$directory}");
        }

        $this->files->replace($path, $this->render());

        if (! $this->files->exists($path)) {
            throw new RuntimeException("The sitemap file could not be generated: {$path}");
        }

        return $path;
    }
}
