# Queue Backlog Runbook

## Symptoms
- Queue depth grows continuously
- Worker memory limit errors

## Immediate Actions
1. Restart failed workers.
2. Reduce batch size temporarily.
3. Reprocess failed jobs in controlled batches.
