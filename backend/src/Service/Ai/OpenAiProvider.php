<?php
declare(strict_types=1);
namespace IncidentCopilot\Service\Ai;
final class OpenAiProvider implements AiProviderInterface {
    public function complete(string $prompt, array $context): ?array {
        $key = getenv('OPENAI_API_KEY') ?: ''; if ($key === '' || !function_exists('curl_init')) return null;
        $payload = json_encode(['model'=>getenv('OPENAI_MODEL') ?: 'gpt-4o-mini','response_format'=>['type'=>'json_object'],'messages'=>[['role'=>'system','content'=>'You are an incident response copilot. Return strict JSON with summary, likely_root_cause, confidence, evidence, recommended_actions, follow_up_questions.'],['role'=>'user','content'=>$prompt."

Context:
".json_encode($context)]]]);
        $ch = curl_init('https://api.openai.com/v1/chat/completions'); curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.$key],CURLOPT_POSTFIELDS=>$payload,CURLOPT_TIMEOUT=>30]); $response = curl_exec($ch); if (!$response) return null; $decoded = json_decode($response,true); return json_decode($decoded['choices'][0]['message']['content'] ?? '', true) ?: null;
    }
}
