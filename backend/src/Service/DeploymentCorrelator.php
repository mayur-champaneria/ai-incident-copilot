<?php
declare(strict_types=1);
namespace IncidentCopilot\Service;
final class DeploymentCorrelator {
    public function suspiciousDeployment(array $incident): ?array {
        $deployments = json_decode(file_get_contents(base_path('data/deployments/deployments.json')), true) ?: [];
        $started = strtotime($incident['started_at']);
        $candidates = array_filter($deployments, fn($d) => $d['service'] === $incident['service'] && strtotime($d['deployed_at']) <= $started && ($started - strtotime($d['deployed_at'])) <= 3600);
        usort($candidates, fn($a,$b) => strcmp($b['deployed_at'], $a['deployed_at']));
        return $candidates[0] ?? null;
    }
}
