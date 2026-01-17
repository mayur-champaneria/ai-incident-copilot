<?php
declare(strict_types=1);
namespace IncidentCopilot\Service\Ai;
interface AiProviderInterface { public function complete(string $prompt, array $context): ?array; }
