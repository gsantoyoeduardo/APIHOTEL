<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


//creacion de controller personalizados
Artisan::command('make:custom-controller {name}', function ($name) {
    $baseNamespace = "App\\Application\\Controller";
    $basePath = app_path('application/controller');
    $pathParts = explode('/', $name);
    $className = array_pop($pathParts);
    $folderPath = implode('/', $pathParts);
    $namespace = $baseNamespace . ($folderPath ? '\\' . str_replace('/', '\\', $folderPath) : '');
    $directory = $basePath . ($folderPath ? '/' . $folderPath : '');
    $path = $directory . "/{$className}.php";
    if (file_exists($path)) {
        $this->error("El controlador {$name} ya existe.");
        return;
    }
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true); // Crea las carpetas con permisos 0755
    }
    $stub = file_get_contents(base_path('stubs/custom.controller.stub'));
    $stub = str_replace(['{{ namespace }}', '{{ class }}'], [$namespace, $className], $stub);
    file_put_contents($path, $stub);
    $this->info("Controlador {$name} creado en {$path}");
})->describe('Crea un controlador en app/application/controller');
