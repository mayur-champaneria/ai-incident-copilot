<?php
declare(strict_types=1);
namespace IncidentCopilot\Service\Ai;
final class AiProviderFactory { public function make(): AiProviderInterface { return match (getenv('AI_PROVIDER') ?: 'fallback') { 'openai' => new OpenAiProvider(), 'ollama' => new OllamaProvider(), default => new FallbackProvider() }; } }
