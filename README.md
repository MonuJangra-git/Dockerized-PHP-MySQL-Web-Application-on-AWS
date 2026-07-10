# Dockerized-PHP-MySQL-Web-Application-on-AWS

Developed and deployed a containerized PHP-MySQL web application on AWS EC2 using Docker and Nginx. The application demonstrates user authentication with session management and includes phpMyAdmin for database administration (commonly accessed via SSH tunnel in production). This repository contains the application source, Docker configuration, and example environment files for local development.

## Project Overview

This is a simple PHP web application intended for learning and demo purposes. It includes:

- User registration and login
- A protected dashboard page
- A MySQL database for storing users
- Docker Compose setup for PHP, Nginx, MySQL, and phpMyAdmin

## Tech Stack

- PHP
- MySQL
- Nginx
- Docker Compose
- phpMyAdmin

## Project Structure

<img width="2048" height="2048" alt="zen-bear-v6_b_make_an_image_so_tha" src="https://github.com/user-attachments/assets/1bb20c92-c7b4-4c3b-bff3-217d9a255607" />

- `index.php` - Main landing/login page
- `register.php` - User registration page
- `authenticate.php` - Login authentication logic
- `dashboard.php` - Protected user dashboard
- `config.php` - Database and session configuration (reads from `.env` when present)
- `setup.sql` - Database initialization script
- `docker-compose.yml` - Container setup
- `.env.example` - Example environment variables
- `nginx/nginx.conf` - Contains nginx configuration (https)
- `Proof-Screenshots/` - Screenshots and proof files

## Networking of project 

<img width="4864" height="3328" alt="a_now_make_an_image_wh" src="https://github.com/user-attachments/assets/255468e5-ed8d-4f20-81da-5cac0d15d066" />


## Prerequisites

Ensure you have the following installed:

- Docker Desktop ( good if already have )
- Docker Compose ( mandatory)
- Git 

## Setup (Local Development)

1. Clone the repository.
2. Copy `.env.example` to `.env` and update the values if needed.
3. Start the containers:
   ```bash
   docker compose up --build
   ```
4. Open the app in your browser:
   - Main app: http://localhost/
   - phpMyAdmin: http://localhost:8081/

## Environment Variables

The app uses environment variables for database configuration. Example values are stored in `.env.example`.

Key variables:
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`
- `MYSQL_ROOT_PASSWORD`
- `MYSQL_DATABASE`
- `MYSQL_USER`
- `MYSQL_PASSWORD`

## Database Notes

- The MySQL container is configured through Docker Compose.
- The database schema and initial data are loaded using `setup.sql`.
- For production deployments (e.g., AWS EC2), restrict access to phpMyAdmin and consider using SSH tunnels or VPN for administration.

## Deployment (AWS)

This repo was used in a deployment to an AWS EC2 instance running Docker. Typical steps used for an EC2 deployment include:

1. Provision an EC2 instance and install Docker + Docker Compose.
2. Transfer project files and a secured `.env` to the server.
3. Use `docker compose up -d --build` to start the services.
4. Secure nginx, close unnecessary ports, and use SSH tunnels or an authentication layer for phpMyAdmin.

## Notes

- Do not commit your real `.env` file—keep secrets local and out of Git.
- The `.env` file is ignored by Git via `.gitignore`.
- This project is intended for learning, demos, and small-scale deployments.

## Proof and Screenshots

See the `Proof-Screenshots/` folder for images and proof files related to the project.

---

If you'd like, I can now finish the rebase and push the resolved commits to the remote. If you prefer a force overwrite of the remote instead, tell me and I will do that instead.
The app uses environment variables for database configuration. The example values are stored in [.env.example](.env.example).

Key variables:
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD
- MYSQL_ROOT_PASSWORD
- MYSQL_DATABASE
- MYSQL_USER
- MYSQL_PASSWORD

## Database Notes
- The MySQL container is configured through Docker Compose.
- The database schema and initial data are loaded using [setup.sql](setup.sql).
- The application connects to the database using settings from [config.php](config.php).

## Notes
- Keep your real secrets in a local .env file and do not commit it to Git.
- The .env file is ignored by Git through [.gitignore](.gitignore).
- This project is suitable for learning, local development, and basic portfolio/demo purposes.
- Use domain name and SSL certificates owned by you.
>>>>>>> da7b54b (Initial commit: project files and proof-screenshots)
