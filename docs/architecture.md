# Architecture

AI Incident Copilot separates signal collection from AI reasoning. Logs, deployments, metrics and runbooks are normalized by small services. The incident analyzer builds a compact context package and sends it to an AI provider. If no AI provider is configured, a deterministic fallback analyzer keeps the demo usable.
