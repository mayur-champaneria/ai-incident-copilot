# Session Cache Outage Runbook

## Symptoms
- Login failures
- Redis connection refused errors
- Session writes fail

## Immediate Actions
1. Check Redis cluster health.
2. Restart unhealthy cache node if required.
3. Enable fallback session storage if supported.
