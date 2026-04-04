# Launch Plan

This document contains ready-to-use posts for sharing AI Incident Copilot with developer communities.

## Short pitch

AI Incident Copilot is an AI-powered incident investigation assistant for production engineering teams. It analyzes logs, deployments, metrics and runbooks to generate root-cause hypotheses, evidence trails, recommended actions and post-incident reports.

Repo: https://github.com/mayur-champaneria/ai-incident-copilot

## LinkedIn post

I built **AI Incident Copilot**, a production-inspired AI assistant for debugging incidents faster.

Production incidents are difficult because engineers jump between logs, deployment history, metrics, dashboards and runbooks. This project brings those signals together and generates:

- likely root cause
- evidence trail
- related deployment
- matched runbook
- recommended actions
- post-incident report

Tech stack:
PHP/Symfony-style backend, TypeScript frontend, Docker Compose, OpenAI/Ollama provider support, markdown runbooks and GitHub Actions CI.

It is not meant to replace engineers. It is designed to help engineers investigate faster and document incidents better.

GitHub: https://github.com/mayur-champaneria/ai-incident-copilot

## Hacker News / Show HN

Title:
Show HN: AI Incident Copilot – analyze logs, deployments, metrics and runbooks

Post:
I built AI Incident Copilot, a production-inspired incident investigation assistant.

It takes sample incidents, logs, deployments, metrics and runbooks, then generates a root-cause hypothesis, evidence trail, recommended actions and a post-incident report.

The project uses a PHP/Symfony-style backend, TypeScript frontend, Docker Compose and supports OpenAI-compatible APIs or local Ollama. It also has a fallback analyzer so the demo works without an API key.

I built it to explore how AI can help engineering teams reduce time spent jumping between observability tools during production incidents.

Repo: https://github.com/mayur-champaneria/ai-incident-copilot

## Reddit post

Title:
I built an AI incident copilot for debugging production issues faster

Post:
I built a project called AI Incident Copilot. It analyzes logs, deployments, metrics and runbooks to generate a likely root cause, evidence trail, recommended actions and a post-incident report.

The idea came from a real problem: during incidents, developers usually jump between logs, dashboards, deployment history and documentation. This project brings those signals together in one investigation flow.

Stack:
- PHP/Symfony-style backend
- TypeScript frontend
- Docker Compose
- OpenAI/Ollama support
- markdown runbooks
- sample production incidents

Repo: https://github.com/mayur-champaneria/ai-incident-copilot

Feedback is welcome, especially around incident workflows and observability use cases.

## Dev.to / blog outline

Title: Building an AI Incident Copilot for Production Engineering Teams

Sections:
1. Why incident investigation is hard
2. Signals engineers check during production failures
3. Architecture overview
4. Log parsing and deployment correlation
5. Runbook retrieval
6. AI root-cause hypothesis generation
7. Post-incident report generation
8. Lessons learned
9. Future roadmap
