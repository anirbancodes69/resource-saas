# Resource SaaS

AI-powered resource and project management platform.

---

## 🚀 Tech Stack

- Laravel 12
- MySQL 8
- Docker
- Nginx
- Redis
- GitHub Actions (CI)

---

## 🐳 Local Setup

### 1. Clone repo

```bash
git clone <repo-url>
cd resource-saas


2. Start containers
docker compose up -d --build


3. Install dependencies (first time only)
docker exec -it rs_php composer install


4. Generate app key
docker exec -it rs_php php artisan key:generate


5. Run migrations
docker exec -it rs_php php artisan migrate


✅ Health Check
GET http://localhost:8080/api/health
Expected response:
{
  "status": "ok",
  "service": "resource-saas-api"
}


🧪 Run Tests
docker exec -it rs_php php artisan test


🔄 CI Pipeline
GitHub Actions automatically:
installs dependencies
runs tests
fails on errors