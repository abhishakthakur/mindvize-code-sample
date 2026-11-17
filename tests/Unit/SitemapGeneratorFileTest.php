<?php

namespace Tests\Unit;

use App\Services\SitemapGenerator;
use Illuminate\Filesystem\Filesystem;
use PHPUnit\Framework\TestCase;

class SitemapGeneratorFileTest extends TestCase
{
    public function test_it_writes_rendered_xml_to_the_requested_file(): void
    {
        $files = new Filesystem;
        $path = sys_get_temp_dir().'/portfolio-sitemap-unit-'.bin2hex(random_bytes(8)).'.xml';
        $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset></urlset>';

        $generator = new class($files, $xml) extends SitemapGenerator
        {
            public function __construct(Filesystem $files, private readonly string $xml)
            {
                parent::__construct($files);
            }

            public function render(): string
            {
                return $this->xml;
            }
        };

        try {
            $this->assertSame($path, $generator->write($path));
            $this->assertSame($xml, $files->get($path));
        } finally {
            $files->delete($path);
        }
    }
}
