# AI Workflow

1. User selects an incident.
2. Backend loads incident details.
3. Logs are parsed for the affected service.
4. Recent deployments are correlated against the incident start time.
5. Metrics are summarized for anomaly signals.
6. Runbooks are matched using keyword scoring.
7. AI provider returns root cause, confidence, evidence and actions.
