# 🏫 TeacherPortal | Full-Stack Management System

> **Internship Project - 2026** > A high-performance, responsive management portal built with **CodeIgniter 4** (REST API) and **React.js** (Frontend).

<div align="center">

![React](https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JWT](https://img.shields.io/badge/JWT-000000?style=for-the-badge&logo=JSON%20web%20tokens&logoColor=white)
![MUI](https://img.shields.io/badge/Material--UI-0081CB?style=for-the-badge&logo=material-ui&logoColor=white)

</div>

---

### 🌟 Key Features
- 🔐 **JWT Security:** Stateless authentication for secure API access.
- 📊 **Dynamic Dashboard:** Real-time data visualization with Material-UI.
- ⚡ **RESTful Architecture:** Decoupled frontend and backend for maximum speed.
- 📱 **Mobile First:** Fully responsive design for all screen sizes.
- 🛠️ **Data Integrity:** Strict one-to-one mapping between Users and Teacher profiles.

---

### 📁 Project Architecture
```text
TeacherPortal/
├── 📂 backend/               # CodeIgniter 4 API
│   ├── 📄 app/Controllers/Api.php
│   ├── 📄 app/Filters/JwtFilter.php
│   └── 📄 .env               # API Configuration
├── 📂 frontend/              # React.js SPA
│   ├── 📄 src/context/AuthContext.tsx
│   ├── 📄 src/services/api.ts``
│   └── 📄 src/pages/Dashboard.tsx
└── 📄 database.sql           # Database Schema
📝 API Reference

```

Action	Method	Endpoint	Auth Required
Register	POST	/api/register	❌
Login	POST	/api/login	❌
Get Teachers	GET	/api/teachers	✅
Update Profile	PUT	/api/teachers/:id	✅
🚀 Quick Start Guide
<p>
1️⃣ Database Setup
Create a database teacher_portal and import the database.sql file.

SQL
-- Example SQL Import
SOURCE C:/xampp/htdocs/TeacherPortal/database.sql;
2️⃣ Backend (PHP 8.1+)
</p>
<p>
Bash
cd backend
composer install
php spark serve --port 8080
</p>
<p>

```
3️⃣ Frontend (Node.js)
Bash
cd frontend
npm install
npm start
🔐 Security & Logic
Bcrypt Hashing: No raw passwords stored in the database.
</p>
```

Middleware: JwtFilter intercepts every request to validate the token.

State Management: React Context API manages user session across the app.
```
<p>
👨‍💻 Developer
Aaditya Internship 2026 ⭐ Leave a star if you find this helpful!
</p>
<div align="center">
<sub>Built with ❤️ using <b>CodeIgniter 4</b> & <b>React</b></sub>
</div>
```

-----

### 💡 What changed?

1.  **Interactive Elements:** Added a "Quick Start" guide with code blocks.
2.  **Visual Hierarchy:** Used HTML `<div>` tags for alignment and `>` blockquotes for the project intro.
3.  **Corrected API Table:** Added an "Auth Required" column with clear icons (✅/❌).
4.  **Modern Badges:** Included Material-UI and cleaned up the badge colors.

Would you like me to generate the **`database.sql`** or the **`.env`** file configuration to go with this?
