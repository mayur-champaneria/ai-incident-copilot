<?php
declare(strict_types=1);
namespace IncidentCopilot\Controller;
use IncidentCopilot\Http\JsonResponse;
use IncidentCopilot\Repository\IncidentRepository;
use IncidentCopilot\Service\IncidentAnalyzer;
use IncidentCopilot\Service\IncidentReportGenerator;
final class IncidentController {
    public function __construct(private IncidentRepository $incidents, private IncidentAnalyzer $analyzer, private IncidentReportGenerator $reports) {}
    public function index(): JsonResponse { return JsonResponse::ok(['data' => $this->incidents->all()]); }
    public function show(string $id): JsonResponse { $incident = $this->incidents->find($id); return $incident ? JsonResponse::ok(['data' => $incident]) : JsonResponse::error('Incident not found', 404); }
    public function analyze(string $id): JsonResponse { $incident = $this->incidents->find($id); return $incident ? JsonResponse::ok(['data' => $this->analyzer->analyze($incident)]) : JsonResponse::error('Incident not found', 404); }
    public function report(string $id): JsonResponse { $incident = $this->incidents->find($id); if (!$incident) return JsonResponse::error('Incident not found', 404); return JsonResponse::markdown($this->reports->generate($incident, $this->analyzer->analyze($incident))); }
}
