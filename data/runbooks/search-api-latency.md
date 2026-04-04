# Search API Latency Runbook

## Symptoms
- Search p95 latency increases
- Elasticsearch slow query warnings
- Wildcard or unbounded filters appear in logs

## Immediate Actions
1. Inspect the latest SearchQueryBuilder changes.
2. Replace wildcard queries with keyword filters where possible.
3. Validate index mappings and refresh slow query dashboard.
