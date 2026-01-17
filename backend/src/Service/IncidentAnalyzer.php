<?php
declare(strict_types=1);
namespace IncidentCopilot\Service;
use IncidentCopilot\Service\Ai\AiProviderFactory;
use IncidentCopilot\Service\Ai\FallbackProvider;
final class IncidentAnalyzer {
    public function __construct(private LogParser $logs, private DeploymentCorrelator $deployments, private MetricsAnalyzer $metrics, private RunbookRetriever $runbooks, private AiProviderFactory $aiFactory) {}
    public function analyze(array $incident): array {
        $logs = $this->logs->logsForIncident($incident); $deployment = $this->deployments->suspiciousDeployment($incident); $metrics = $this->metrics->summarize($incident); $runbook = $this->runbooks->bestMatch($incident, $logs); $context = compact('incident','logs','deployment','metrics','runbook');
        $prompt = 'Investigate the production incident and identify root cause, evidence and recommended actions.';
        $analysis = $this->aiFactory->make()->complete($prompt, $context) ?: (new FallbackProvider())->complete($prompt, $context);
        return ['incident'=>$incident,'deployment'=>$deployment,'metrics'=>$metrics,'runbook'=>$runbook,'analysis'=>$analysis,'generated_at'=>gmdate('c')];
    }
}
