# Contributing to AI Incident Copilot

Thanks for considering a contribution. This project is designed as a practical, production-inspired AI incident response tool.

## Good contribution areas

- Add new demo incidents and realistic log samples
- Improve runbook matching and scoring
- Add Elasticsearch indexing adapter
- Add GitHub commit correlation
- Add Grafana export/import examples
- Improve frontend incident visualization
- Add more tests for analyzers and providers
- Improve documentation and architecture diagrams

## Local setup

```bash
cp .env.example .env
docker compose up -d
```

Backend only:

```bash
cd backend
php -S 127.0.0.1:8080 -t public
```

Frontend only:

```bash
cd frontend
npm install
npm start
```

## Before opening a pull request

Run backend smoke test:

```bash
php backend/tests/AnalyzerSmokeTest.php
```

Run frontend checks:

```bash
cd frontend
npm install
npm run test
npm run build
```

## Pull request style

Please include:

- what problem the change solves
- screenshots for UI changes
- sample input/output for analyzer changes
- test notes

## Code style

- Keep PHP services small and focused
- Keep AI prompts explicit and structured
- Prefer readable TypeScript over clever abstractions
- Document new incident scenarios in `docs/incident-examples.md`

