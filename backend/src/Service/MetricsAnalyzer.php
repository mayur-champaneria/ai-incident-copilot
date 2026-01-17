<?php
declare(strict_types=1);
namespace IncidentCopilot\Service;
final class MetricsAnalyzer {
    public function summarize(array $incident): array {
        $metrics = json_decode(file_get_contents(base_path('data/metrics/service-metrics.json')), true) ?: [];
        $series = $metrics[$incident['service']] ?? [];
        if (!$series) return ['status'=>'unknown','signals'=>[]];
        $last = end($series); $first = reset($series); $signals = [];
        if (($last['error_rate'] ?? 0) > max(5, ($first['error_rate'] ?? 0) * 3)) $signals[] = 'error_rate_spike';
        if (($last['p95_latency_ms'] ?? 0) > max(600, ($first['p95_latency_ms'] ?? 0) * 2)) $signals[] = 'latency_degradation';
        if (($last['queue_depth'] ?? 0) > max(100, ($first['queue_depth'] ?? 0) * 4)) $signals[] = 'queue_backlog';
        return ['status'=>$signals ? 'degraded' : 'stable', 'latest'=>$last, 'signals'=>$signals];
    }
}
