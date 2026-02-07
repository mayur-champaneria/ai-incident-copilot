<?php
declare(strict_types=1);
namespace IncidentCopilot\Service\Ai;
final class FallbackProvider implements AiProviderInterface {
    public function complete(string $prompt, array $context): ?array {
        $incident = $context['incident']; $deployment = $context['deployment']; $logs = $context['logs']; $messages = strtolower(implode(' ', array_column($logs, 'message'))); $cause = 'The incident appears related to recent service degradation.';
        if (str_contains($messages, 'payment_provider_timeout')) $cause = 'Missing PAYMENT_PROVIDER_TIMEOUT environment variable introduced during deployment.';
        elseif (str_contains($messages, 'wildcard') || str_contains($messages, 'slow_search_query')) $cause = 'Expensive wildcard search query caused Elasticsearch latency spike.';
        elseif (str_contains($messages, 'memory_limit')) $cause = 'Worker memory exhaustion caused queue processing to stop.';
        elseif (str_contains($messages, 'redis')) $cause = 'Redis/session storage outage caused authentication failures.';
        return ['summary'=>$incident['title'].' affected '.$incident['service'].' starting at '.$incident['started_at'].'.','likely_root_cause'=>$cause,'confidence'=>$deployment ? 0.87 : 0.72,'evidence'=>array_values(array_filter([$deployment ? 'Recent deployment '.$deployment['version'].' occurred before the incident.' : null, count($logs).' relevant log lines were found for '.$incident['service'].'.', 'Metrics status: '.($context['metrics']['status'] ?? 'unknown').'.', $context['runbook'] ? 'Matched runbook: '.$context['runbook']['title'].'.' : null])),'recommended_actions'=>['Validate the most recent deployment and configuration changes.','Follow the matched runbook and capture command output in the incident notes.','Apply the minimal safe fix or roll back if customer impact continues.','Add a regression check to prevent recurrence.'],'follow_up_questions'=>['Did the error begin immediately after deployment?','Are all required environment variables present in production?','Is the service dependency healthy?','Can the change be rolled back safely?']];
    }
}

