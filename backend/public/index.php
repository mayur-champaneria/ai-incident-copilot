<?php
declare(strict_types=1);
require __DIR__ . '/../src/bootstrap.php';
use IncidentCopilot\Controller\IncidentController;
use IncidentCopilot\Controller\RunbookController;
use IncidentCopilot\Http\JsonResponse;
use IncidentCopilot\Http\Request;
$request = Request::fromGlobals();
$path = $request->path();
$method = $request->method();
try {
    $incidentController = container(IncidentController::class);
    $runbookController = container(RunbookController::class);
    if ($method === 'OPTIONS') { JsonResponse::ok(['ok' => true])->send(); return; }
    if ($method === 'GET' && $path === '/api/health') { JsonResponse::ok(['status' => 'ok', 'service' => 'ai-incident-copilot-api'])->send(); return; }
    if ($method === 'GET' && $path === '/api/incidents') { $incidentController->index()->send(); return; }
    if ($method === 'GET' && preg_match('#^/api/incidents/([^/]+)$#', $path, $m)) { $incidentController->show($m[1])->send(); return; }
    if ($method === 'POST' && preg_match('#^/api/incidents/([^/]+)/analyze$#', $path, $m)) { $incidentController->analyze($m[1])->send(); return; }
    if ($method === 'GET' && preg_match('#^/api/incidents/([^/]+)/report$#', $path, $m)) { $incidentController->report($m[1])->send(); return; }
    if ($method === 'GET' && $path === '/api/runbooks') { $runbookController->index()->send(); return; }
    JsonResponse::error('Route not found', 404)->send();
} catch (Throwable $e) { JsonResponse::error($e->getMessage(), 500)->send(); }
