
# Screenshot Overview: User Login Page

<img width="1526" height="777" alt="Screenshot 2026-07-10 123248" src="https://github.com/user-attachments/assets/081e4832-0233-434e-9271-d9d2c1f9527b" />

**Explanation:**
This screenshot shows the login interface of the project’s web application.  
The page features a clean gradient background with a centered login form titled **MyWebsite**.  
Key elements include:  
- Input fields for **Username** and **Password**  
- A **Login** button with a lock icon  
- A registration link for new users (“Register here”)  
- Demo credentials provided for testing (`admin / admin123`)  

This confirms that the authentication system is integrated and accessible through the deployed domain.


# Screenshot Overview: Deployment Dashboard (ZenSpace)

<img width="1532" height="767" alt="Screenshot 2026-07-10 123330" src="https://github.com/user-attachments/assets/69769985-4a62-4f27-81f4-992592b3fca2" />


**Explanation:**
This screenshot displays the project’s dashboard interface, accessible after login.  
The dashboard, titled **MyWebsite – ZenSpace**, provides a calm and reassuring environment for deployment monitoring.  
Key features include:  
- A **Logout** option and timestamp showing login session details  
- A system status indicator (“All Systems Calm”)  
- Motivational tagline: *“Deploy with calm. Build with focus.”*  
- A digital clock for real-time tracking  

This validates that the application’s backend and frontend are connected, and the deployment monitoring interface is fully functional.
# Screenshot Overview: phpMyAdmin Database Management

<img width="1516" height="772" alt="Screenshot 2026-07-10 122759" src="https://github.com/user-attachments/assets/47a18b24-6eb6-49fd-8b04-2f66f9b66452" />


**Explanation:**
This screenshot shows the phpMyAdmin interface connected to the project’s MySQL server.  
It provides details about the database environment, including:  
- **Server version:** MySQL 8.0.46  
- **Databases available:** `information_schema`, `myappdb`, `mysql`, `performance_schema`, `sys`  
- **Web server:** Apache with PHP 8.3.26  
- **phpMyAdmin version:** 5.2.3 (up to date)  

This confirms that the database administration tool is properly configured and accessible, enabling direct management of the project’s MySQL environment.

---
<img width="1536" height="597" alt="Screenshot 2026-07-10 135505" src="https://github.com/user-attachments/assets/82157292-a161-49ab-a617-c1e04c01a89d" />

**Explanation:**
This screenshot shows the Linux terminal output demonstrating the project’s Dockerized environment.  
It includes a file listing (`ls -l`) with key project files such as `dockerfile`, `docker-compose.yml`, and PHP scripts (`index.php`, `authenticate.php`, `db.php`, etc.).  
The Docker images section highlights the presence of essential components:  
- **MySQL 8.0** for database services  
- **Nginx** for web server functionality  
- **phpMyAdmin** for database management  
- **Custom PHP image** for application logic  

The running containers confirm that the stack is active and functional:  
- **Nginx** serving on ports 80/443  
- **phpMyAdmin** accessible via port 8081  
- **PHP application** running on port 9000  
- **MySQL database** available on port 3306  

This screenshot validates that the complete web application stack is deployed and operational inside Docker, ensuring a dynamic and test-ready environment.


---
# Screenshot Overview: Dockerized Web Application Stack

<img width="1536" height="766" alt="Screenshot 2026-07-10 122933" src="https://github.com/user-attachments/assets/23c0be25-973e-4efd-82b0-266cf5d5c627" />


**Explanation:**
This screenshot displays the contents of the `users` table inside the `myappdb` database.  
The SQL query executed (`SELECT * FROM users`) returns stored user records.  
Key columns include:  
- **id** – unique identifier for each user  
- **username** – account name (e.g., `admin`, `King`)  
- **password** – securely hashed values  
- **email** – associated email addresses  
- **created_at** – timestamp of account creation  

This validates that the application’s authentication system is integrated with the database, and user data is being stored and managed correctly.
# Screenshot Overview: MySQL Container Initialization Logs

<img width="1536" height="762" alt="Screenshot 2026-07-10 011845" src="https://github.com/user-attachments/assets/cd95fd8c-f9ed-498b-bc30-7d792059a2a8" />


**Explanation:**
This screenshot captures the terminal logs from the `mysql_container` during its initialization process.  
Key highlights include:  
- Loading of time zone data and execution of initialization scripts (`setup.sql`).  
- Creation of the database **`myappdb`** and user **`root1`**, with granted access rights.  
- InnoDB initialization, certificate configuration, and plugin readiness messages.  
- Confirmation that the MySQL server (version **8.0.46**) is fully operational, listening on port **3306**, and ready for connections.  

This log output validates that the MySQL Docker container has been successfully set up, initialized, and is ready to serve as the backend database for the project.
---

## Final Note

All the screenshots included above serve as **proof of deployment and functionality**.  
They demonstrate that the environment, services, and application stack are not just theoretical concepts but are **running in practice**.  

> Proofs are everything — theory is just knowledge, but practical implementation makes the real difference.

