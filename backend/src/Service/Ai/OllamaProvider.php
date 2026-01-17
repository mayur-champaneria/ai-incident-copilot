<?php
declare(strict_types=1);
namespace IncidentCopilot\Service\Ai;
final class OllamaProvider implements AiProviderInterface {
    public function complete(string $prompt, array $context): ?array {
        if (!function_exists('curl_init')) return null; $url = rtrim(getenv('OLLAMA_BASE_URL') ?: 'http://localhost:11434','/').'/api/generate'; $payload = json_encode(['model'=>getenv('OLLAMA_MODEL') ?: 'llama3.1','stream'=>false,'format'=>'json','prompt'=>'Return JSON with summary, likely_root_cause, confidence, evidence, recommended_actions, follow_up_questions. '.$prompt."
Context:".json_encode($context)]);
        $ch = curl_init($url); curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_HTTPHEADER=>['Content-Type: application/json'],CURLOPT_POSTFIELDS=>$payload,CURLOPT_TIMEOUT=>30]); $response = curl_exec($ch); if (!$response) return null; $decoded = json_decode($response,true); return json_decode($decoded['response'] ?? '', true) ?: null;
    }
}
