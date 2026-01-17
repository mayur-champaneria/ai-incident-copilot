<?php
declare(strict_types=1);
namespace IncidentCopilot\Repository;
final class IncidentRepository {
    public function all(): array { return $this->readJson('data/incidents/incidents.json'); }
    public function find(string $id): ?array { foreach ($this->all() as $incident) { if (($incident['id'] ?? '') === $id) return $incident; } return null; }
    private function readJson(string $path): array { $file = base_path($path); return is_file($file) ? json_decode(file_get_contents($file), true) : []; }
}
