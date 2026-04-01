<?php
declare(strict_types=1);
require __DIR__ . '/../src/bootstrap.php';
use IncidentCopilot\Repository\IncidentRepository;
use IncidentCopilot\Service\IncidentAnalyzer;
$repo = container(IncidentRepository::class); $analyzer = container(IncidentAnalyzer::class); $incident = $repo->find('INC-2026-0042'); if (!$incident) throw new RuntimeException('Demo incident missing'); $result = $analyzer->analyze($incident); if (empty($result['analysis']['likely_root_cause'])) throw new RuntimeException('Analysis failed'); echo "Analyzer smoke test passed
";
