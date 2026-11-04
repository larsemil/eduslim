<?php

namespace App\View;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

/**
 * Blade
 * Minimal standalone wrapper around Illuminate's view/Blade component,
 * used without pulling in the full Laravel framework.
 */
class Blade
{
    protected Factory $factory;

    public function __construct(string $viewsPath, string $cachePath)
    {
        $filesystem = new Filesystem;

        if (!is_dir($cachePath)) {
            $filesystem->makeDirectory($cachePath, 0755, true);
        }

        $resolver = new EngineResolver;
        $compiler = new BladeCompiler($filesystem, $cachePath);

        $resolver->register('blade', function () use ($compiler) {
            return new CompilerEngine($compiler, new Filesystem);
        });

        $finder = new FileViewFinder($filesystem, [$viewsPath]);

        $this->factory = new Factory($resolver, $finder, new Dispatcher(new Container));
    }

    /**
     * make
     * Render a view and return the resulting HTML.
     *
     * @param  string $view
     * @param  array $data
     * @return string
     */
    public function make(string $view, array $data = []): string
    {
        return $this->factory->make($view, $data)->render();
    }
}
