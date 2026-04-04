# Security Policy

AI Incident Copilot is a demo/reference project for AI-assisted incident investigation.

## Supported versions

The `main` branch is the active development branch.

## Reporting a vulnerability

If you find a security issue, please do not open a public issue with sensitive details.

Contact: mayur.itpg@gmail.com

Please include:

- affected component
- reproduction steps
- potential impact
- suggested fix if available

## Security considerations

This project may process logs and incident data. In real deployments:

- redact secrets before sending logs to any LLM provider
- avoid sending personal data to external APIs
- use local Ollama mode for sensitive environments
- restrict access to incident reports
- validate all uploaded files
- store API keys in secrets management, not source code

## AI safety considerations

AI output should be treated as an investigation aid, not the final source of truth. Engineers should verify evidence before applying production changes.
