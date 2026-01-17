<?php
declare(strict_types=1);
namespace IncidentCopilot\Service;
final class LogParser {
    public function logsForIncident(array $incident): array {
        $file = base_path("data/sample-logs/{$incident['service']}.log");
        if (!is_file($file)) return [];
        return array_values(array_filter(array_map(fn($line) => $this->parseLine($line, $incident['service']), file($file) ?: [])));
    }
    private function parseLine(string $line, string $service): ?array {
        if (!preg_match('/^(?<timestamp>[^ ]+ [^ ]+) (?<level>[A-Z]+) (?<message>.*)$/', trim($line), $m)) return null;
        return ['timestamp'=>$m['timestamp'], 'service'=>$service, 'level'=>$m['level'], 'message'=>$m['message']];
    }
}
