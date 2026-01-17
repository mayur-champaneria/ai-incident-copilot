<?php
declare(strict_types=1);
spl_autoload_register(function (string $class): void {
    $prefix = 'IncidentCopilot\\';
    if (!str_starts_with($class, $prefix)) { return; }
    $relative = str_replace('\\', '/', substr($class, strlen($prefix)));
    $file = __DIR__ . '/' . $relative . '.php';
    if (is_file($file)) { require $file; }
});
function base_path(string $path = ''): string { return dirname(__DIR__, 2) . ($path ? '/' . ltrim($path, '/') : ''); }
function container(string $class): object {
    static $instances = [];
    if (isset($instances[$class])) { return $instances[$class]; }
    $ref = new ReflectionClass($class);
    $ctor = $ref->getConstructor();
    if (!$ctor) { return $instances[$class] = new $class(); }
    $args = [];
    foreach ($ctor->getParameters() as $param) {
        $type = $param->getType();
        if ($type instanceof ReflectionNamedType && !$type->isBuiltin()) { $args[] = container($type->getName()); }
    }
    return $instances[$class] = $ref->newInstanceArgs($args);
}
