<?php
declare(strict_types=1);
namespace IncidentCopilot\Http;
final class JsonResponse {
    public function __construct(private array|string $payload, private int $status = 200, private string $contentType = 'application/json') {}
    public static function ok(array $payload): self { return new self($payload); }
    public static function markdown(string $payload): self { return new self($payload, 200, 'text/markdown; charset=utf-8'); }
    public static function error(string $message, int $status): self { return new self(['error' => $message], $status); }
    public function send(): void {
        http_response_code($this->status);
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Content-Type: ' . $this->contentType);
        echo is_array($this->payload) ? json_encode($this->payload, JSON_PRETTY_PRINT) : $this->payload;
    }
}

