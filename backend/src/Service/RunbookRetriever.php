<?php
declare(strict_types=1);
namespace IncidentCopilot\Service;
final class RunbookRetriever {
    public function list(): array { return array_map(fn($file) => ['slug'=>basename($file),'title'=>$this->title(file_get_contents($file))], glob(base_path('data/runbooks/*.md')) ?: []); }
    public function bestMatch(array $incident, array $logs): ?array {
        $query = strtolower($incident['title'].' '.$incident['service'].' '.implode(' ', array_column($logs, 'message'))); $best = null;
        foreach (glob(base_path('data/runbooks/*.md')) ?: [] as $file) { $content = file_get_contents($file); $score = 0; foreach (array_unique(str_word_count(strtolower($content), 1)) as $token) { if (strlen($token)>4 && str_contains($query,$token)) $score++; } if (!$best || $score > $best['score']) $best = ['slug'=>basename($file),'title'=>$this->title($content),'score'=>$score,'excerpt'=>mb_substr($content,0,360)]; }
        return $best;
    }
    private function title(string $markdown): string { return preg_match('/^#\s+(.+)$/m', $markdown, $m) ? $m[1] : 'Untitled runbook'; }
}
