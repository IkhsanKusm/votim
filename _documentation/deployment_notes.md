# Critical Technical Notes

## 1. Session Configuration
- **Driver**: Ensure `.env` uses `SESSION_DRIVER=file` or `SESSION_DRIVER=cookie`.
- **Constraint**: Do NOT use `database` driver to conserve Postgres connections.

## 2. Queue Worker Strategy (Deployment)
- **Command**: 
  ```bash
  php artisan queue:work --queue=high,low --timeout=60 --tries=3
  ```
- **Description**: Single worker instance handling `high` priority queues first, then `low`. This ensures critical tasks like emails/notifications are processed before background aggregation.

## 3. PDF Generation
- **Strategy**: Use **dompdf** (pure PHP) or generating a **CSS Print view** in the frontend.
- **RESTRICTION**: Do NOT use `wkhtmltopdf` or any binary-dependent libraries. Keep the dependency strictly PHP-based or Client-side.
