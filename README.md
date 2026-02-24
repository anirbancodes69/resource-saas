# 🚀 Resource SaaS

A production‑grade, containerized Laravel API designed with modern DevOps, CI/CD, and scalable architecture principles. This project demonstrates how a real-world SaaS backend should be structured and delivered.

---

# 🧭 Project Vision

Resource SaaS aims to be an AI‑ready resource and project management platform built with clean architecture, strong testing discipline, and enterprise‑style delivery practices.

**Key goals:**

* Production‑ready Laravel API
* JWT‑based stateless authentication
* Docker‑first local development
* CI‑driven quality gates
* Scalable branching strategy
* Test‑driven development workflow
---

# 🏗️ High-Level Architecture

```
Client (React – planned)
        ↓
Nginx (Docker)
        ↓
Laravel API (PHP‑FPM)
        ↓
MySQL 8
```

## Core Principles

* **Stateless API** (JWT auth)
* **Containerized environment parity**
* **CI‑enforced quality**
* **Feature‑branch workflow**
* **TDD-first backend development**

---

# 🧰 Tech Stack

## Backend

* Laravel 10
* PHP 8.x
* tymon/jwt-auth
* PHPUnit

## Infrastructure

* Docker & Docker Compose
* MySQL 8
* Nginx

## DevOps

* GitHub Actions
* Branch protection rules
* Squash merge strategy

---

# 📁 Repository Structure

```
resource-saas/
├── .github/workflows/   # CI pipeline
├── backend/             # Laravel application
│   ├── app/
│   ├── config/
│   ├── database/
│   ├── routes/
│   └── tests/
├── docker/              # Container configs
└── README.md
```

---

# 🔀 Branching Strategy

We use **Trunk-Based Development with short‑lived feature branches**.

## Main branches

| Branch    | Purpose                     |
| --------- | --------------------------- |
| main      | production-ready, protected |
| develop   | integration branch          |
| feature/* | active development          |

## Workflow

```
feature → develop → main
```

## Protections

* PR required for main
* CI must pass
* Force push blocked
* Squash merge only

---

# 🐳 Local Development Setup

## 1️⃣ Clone the repository

```bash
git clone <your-repo-url>
cd resource-saas
```

---

## 2️⃣ Start containers

```bash
docker compose up -d --build
```

This starts:

* PHP container
* MySQL container
* Nginx container

---

## 3️⃣ Install dependencies (first time)

```bash
docker exec -it rs_php composer install
```

---

## 4️⃣ Environment setup

Copy environment file if needed:

```bash
cp backend/.env.example backend/.env
```

Then generate key:

```bash
docker exec -it rs_php php artisan key:generate
```

---

## 5️⃣ Run migrations

```bash
docker exec -it rs_php php artisan migrate
```

---

# ✅ Health Check

**Endpoint**

```
GET http://localhost:8080/api/health
```

**Expected response**

```json
{
  "status": "ok",
  "service": "resource-saas-api"
}
```

---

# 🔐 Authentication

The project uses **JWT-based stateless authentication**.

## Register

```
POST /api/auth/register
```

Returns:

```json
{
  "access_token": "...",
  "token_type": "bearer",
  "expires_in": 3600
}
```

---

# 🧪 Running Tests

## Run all tests

```bash
docker exec -it rs_php php artisan test
```

## Test environment

Tests use:

```
backend/.env.testing
```

Key points:

* Separate test database
* Deterministic JWT secret
* RefreshDatabase for isolation

---

# ⚙️ CI Pipeline

GitHub Actions pipeline performs:

1. Spin up MySQL service
2. Install Composer dependencies
3. Generate app key
4. Generate JWT secret
5. Run migrations
6. Execute PHPUnit tests

## Triggers

CI runs on:

* push to main
* push to develop
* push to feature/*
* PR to main/develop

---

# 🔒 Environment & Security

## Ignored files

* `.env`
* `.env.testing`
* `vendor/`
* `node_modules/`

## Committed templates

* `.env.example`

---

# 🚀 Current Project Status

## ✅ Completed

* Dockerized Laravel
* Health endpoint (TDD)
* JWT infrastructure
* Registration API
* CI pipeline
* Branch protection

## 🚧 In Progress

* Login API
* Auth middleware
* RBAC (Spatie)

## 🔮 Planned

* React frontend
* Redis caching
* Queue workers
* AI features

---

# 🧠 Engineering Standards

This project follows:

* Test‑Driven Development
* Feature branch workflow
* CI‑first validation
* Stateless authentication
* Container parity

---

# 👨‍💻 Author

Built as a **production‑grade SaaS learning and demonstration project** following real-world backend and DevOps practices.

---

# ⭐ Contributing (Future)

1. Fork the repo
2. Create feature branch
3. Ensure tests pass
4. Open PR to develop

---

**Happy building. Ship clean. 🚀**
