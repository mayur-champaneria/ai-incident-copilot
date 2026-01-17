<?php
declare(strict_types=1);
namespace IncidentCopilot\Service;
final class IncidentReportGenerator {
    public function generate(array $incident, array $result): string {
        $a = $result['analysis']; $lines = ['# Post-Incident Report: '.$incident['title'],'','## Summary',$a['summary'] ?? 'No summary generated.','','## Likely Root Cause',$a['likely_root_cause'] ?? 'Unknown.','','## Confidence',(string)round(($a['confidence'] ?? 0)*100).'%', '', '## Evidence'];
        foreach (($a['evidence'] ?? []) as $item) $lines[] = '- '.$item;
        $lines[]=''; $lines[]='## Recommended Actions'; foreach (($a['recommended_actions'] ?? []) as $item) $lines[] = '- [ ] '.$item;
        $lines[]=''; $lines[]='## Related Deployment'; $lines[] = $result['deployment'] ? ('`'.$result['deployment']['version'].'` deployed at '.$result['deployment']['deployed_at']) : 'No recent deployment found.';
        $lines[]=''; $lines[]='## Related Runbook'; $lines[] = $result['runbook']['title'] ?? 'No runbook matched.';
        return implode("
", $lines)."
";
    }
}
