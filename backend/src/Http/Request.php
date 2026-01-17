<?php
declare(strict_types=1);
namespace IncidentCopilot\Http;
final class Request {
    public function __construct(private string $method, private string $path, private array $body = []) {}
    public static function fromGlobals(): self {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $raw = file_get_contents('php://input') ?: '';
        return new self($_SERVER['REQUEST_METHOD'] ?? 'GET', rtrim($uri, '/') ?: '/', json_decode($raw, true) ?: []);
    }
    public function method(): string { return strtoupper($this->method); }
    public function path(): string { return $this->path; }
    public function body(): array { return $this->body; }
}
