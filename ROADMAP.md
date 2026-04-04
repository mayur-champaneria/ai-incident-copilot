# Roadmap

AI Incident Copilot is a portfolio-grade incident investigation assistant for production engineering teams. The roadmap focuses on practical integrations, better AI reasoning, and contributor-friendly improvements.

## Current focus

- Keep the local demo easy to run with sample logs, metrics, deployments, and runbooks.
- Improve the quality of root-cause hypotheses and supporting evidence.
- Add integrations that reflect real incident-response workflows.

## Near-term

### Search and observability integrations

- Elasticsearch indexing adapter for incident reports and evidence snippets.
- Grafana/Prometheus metrics import examples.
- Structured log ingestion examples for JSON and Nginx-style logs.

### AI and retrieval

- Embedding-based runbook matching.
- Better provider fallback tests for OpenAI, Ollama, and deterministic mode.
- Prompt templates for incident summaries, executive summaries, and postmortems.

### Frontend experience

- Incident timeline visualization.
- Evidence cards grouped by logs, deployments, metrics, and runbooks.
- Clearer loading/error states for provider failures.

## Mid-term

### DevOps workflow integrations

- GitHub commit and pull request correlation for deployments.
- Docker health checks for local services.
- CI examples for linting, type checks, and backend smoke tests.

### Collaboration inputs

- Slack/Teams incident transcript ingestion.
- Post-incident report export in Markdown.
- Labels/severity workflow for incident triage.

## Long-term ideas

- Multi-tenant incident workspaces.
- Role-based access control for teams.
- Saved investigations and comparable historical incidents.
- Self-hosted vector store support.
- Optional queue-based async analysis pipeline.

## Contribution guide

Good starting points are labeled `good first issue` in GitHub Issues:

- Tests for AI fallback behavior.
- Docker health checks.
- Grafana metrics import examples.
- Elasticsearch indexing adapter.

See [CONTRIBUTING.md](CONTRIBUTING.md) for local setup and contribution workflow.
