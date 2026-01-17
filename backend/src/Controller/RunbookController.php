<?php
declare(strict_types=1);
namespace IncidentCopilot\Controller;
use IncidentCopilot\Http\JsonResponse;
use IncidentCopilot\Service\RunbookRetriever;
final class RunbookController { public function __construct(private RunbookRetriever $runbooks) {} public function index(): JsonResponse { return JsonResponse::ok(['data' => $this->runbooks->list()]); } }
