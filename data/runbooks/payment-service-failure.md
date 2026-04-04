# Payment Service Failure Runbook

## Symptoms
- Checkout API returns HTTP 500
- Payment authorization fails
- Logs mention payment configuration or timeout variables

## Immediate Actions
1. Check required payment environment variables.
2. Validate PAYMENT_PROVIDER_TIMEOUT and provider credentials.
3. Restart checkout-api workers after configuration is restored.
4. Roll back the deployment if failures continue.
