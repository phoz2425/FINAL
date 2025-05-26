<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WST Student Management System</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Animated background particles */
    .particles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
    }

    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }

    header {
      background: rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      color: #fff;
      padding: 20px 40px;
      position: sticky;
      top: 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 1000;
      transition: all 0.3s ease;
    }

    header:hover {
      background: rgba(0, 0, 0, 0.3);
    }

    .left-section {
      display: flex;
      align-items: center;
      gap: 40px;
    }

    header h1 {
      font-size: 28px;
      font-weight: 700;
      background: linear-gradient(45deg, #00f5ff, #ff00ff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: glow 2s ease-in-out infinite alternate;
    }

    @keyframes glow {
      from { filter: drop-shadow(0 0 5px rgba(0, 245, 255, 0.5)); }
      to { filter: drop-shadow(0 0 20px rgba(255, 0, 255, 0.5)); }
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 25px;
      font-weight: 600;
      position: relative;
      transition: all 0.3s ease;
      padding: 8px 16px;
      border-radius: 20px;
    }

    nav a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 0;
      height: 100%;
      background: linear-gradient(45deg, #00f5ff, #ff00ff);
      border-radius: 20px;
      transition: width 0.3s ease;
      z-index: -1;
    }

    nav a:hover::before {
      width: 100%;
    }

    nav a:hover {
      color: #000;
      transform: translateY(-2px);
    }

    .class-section {
      font-weight: 700;
      font-size: 16px;
      background: linear-gradient(45deg, #ffd700, #ff6b35);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .main-content {
      position: relative;
      z-index: 10;
      padding: 40px 20px;
    }

    .hero-section {
      text-align: center;
      margin-bottom: 60px;
    }

    .hero-title {
      font-size: 3.5rem;
      font-weight: 800;
      background: linear-gradient(45deg, #fff, #00f5ff, #ff00ff, #fff);
      background-size: 400% 400%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradient 3s ease infinite;
      margin-bottom: 20px;
    }

    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .hero-subtitle {
      font-size: 1.2rem;
      color: rgba(255, 255, 255, 0.8);
      margin-bottom: 30px;
    }

    .stats-container {
      display: flex;
      justify-content: center;
      gap: 30px;
      margin: 40px 0;
      flex-wrap: wrap;
    }

    .stat-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 20px;
      padding: 25px;
      text-align: center;
      min-width: 150px;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transform: rotate(45deg);
      transition: all 0.6s ease;
      opacity: 0;
    }

    .stat-card:hover::before {
      animation: shine 0.6s ease-in-out;
    }

    @keyframes shine {
      0% { transform: translateX(-100%) rotate(45deg); opacity: 0; }
      50% { opacity: 1; }
      100% { transform: translateX(100%) rotate(45deg); opacity: 0; }
    }

    .stat-card:hover {
      transform: translateY(-10px) scale(1.05);
      background: rgba(255, 255, 255, 0.15);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 800;
      color: #00f5ff;
      display: block;
    }

    .stat-label {
      color: rgba(255, 255, 255, 0.8);
      font-size: 0.9rem;
      margin-top: 8px;
    }

    .table-container {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 25px;
      padding: 30px;
      margin: 40px auto;
      max-width: 90%;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      position: relative;
    }

    .table-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #00f5ff, transparent);
      animation: loading 2s linear infinite;
    }

    @keyframes loading {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: transparent;
    }

    th, td {
      padding: 18px 25px;
      text-align: center;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
    }

    th {
      background: linear-gradient(45deg, rgba(0, 245, 255, 0.2), rgba(255, 0, 255, 0.2));
      color: #fff;
      font-weight: 700;
      font-size: 1.1rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      position: relative;
    }

    td {
      color: rgba(255, 255, 255, 0.9);
      background: rgba(255, 255, 255, 0.02);
      transition: all 0.3s ease;
    }

    tr:hover td {
      background: rgba(255, 255, 255, 0.1);
      transform: scale(1.02);
      color: #fff;
    }

    .btn-container {
      text-align: center;
      margin: 50px 0;
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .btn {
      background: linear-gradient(45deg, #00f5ff, #ff00ff);
      color: #000;
      font-weight: 700;
      padding: 15px 30px;
      margin: 10px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }

    .btn:hover::before {
      left: 100%;
    }

    .btn:hover {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .btn:active {
      transform: translateY(-2px) scale(1.02);
    }


    .btn-add {
      background: linear-gradient(45deg, #00ff88, #00b4d8);
    }

    .btn-delete {
      background: linear-gradient(45deg, #ff006e, #fb8500);
    }

    .btn-update {
      background: linear-gradient(45deg, #7209b7, #560bad);
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .hero-title {
        font-size: 2.5rem;
      }
      
      .stats-container {
        flex-direction: column;
        align-items: center;
      }
      
      .btn-container {
        flex-direction: column;
        align-items: center;
      }
      
      th, td {
        padding: 12px 8px;
        font-size: 0.9rem;
      }
    }

    /* Loading animation for table */
    .table-loading {
      opacity: 0;
      animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <div class="particles"></div>

  <header>
    <div class="left-section">
      <h1>WST Student System</h1>
      <nav>
        <a href="index.php">🏠 Home</a>
        <a href="team.html">👥 Team</a>
      </nav>
    </div>
    <div class="class-section">BSIT 3A-G2</div>
  </header>

  <div class="main-content">
    <div class="hero-section">
      <h1 class="hero-title">Student Management</h1>
      <p class="hero-subtitle">Modern • Efficient • Powerful</p>
    </div>

    <div class="stats-container">
      <div class="stat-card">
        <span class="stat-number" id="totalStudents">0</span>
        <span class="stat-label">Total Students</span>
      </div>
      <div class="stat-card">
        <span class="stat-number" id="totalCourses">0</span>
        <span class="stat-label">Unique Courses</span>
      </div>
      <div class="stat-card">
        <span class="stat-number">100%</span>
        <span class="stat-label">Success Rate</span>
      </div>
    </div>

    <div class="table-container table-loading">
      <table>
        <thead>
          <tr>
            <th>🆔 Student ID</th>
            <th>👤 Full Name</th>
            <th>📚 Course</th>
          </tr>
        </thead>
        <tbody id="studentTableBody">
        </tbody>
      </table>
    </div>

    <div class="btn-container">
      <button class="btn btn-add" onclick="location.href='add.php'">
        ➕ Add New Student
      </button>
      <button class="btn btn-delete" onclick="location.href='delete.php'">
        🗑️ Delete Student
      </button>
      <button class="btn btn-update" onclick="location.href='update.php'">
        🔍 Search & Update
      </button>
    </div>
  </div>

  <script>
    function createParticles() {
      const particles = document.querySelector('.particles');
      const particleCount = 50;

      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        const size = Math.random() * 4 + 2;
        const x = Math.random() * window.innerWidth;
        const y = Math.random() * window.innerHeight;
        const duration = Math.random() * 3 + 3;
        
        particle.style.width = size + 'px';
        particle.style.height = size + 'px';
        particle.style.left = x + 'px';
        particle.style.top = y + 'px';
        particle.style.animationDuration = duration + 's';
        particle.style.animationDelay = Math.random() * 2 + 's';
        
        particles.appendChild(particle);
      }
    }

    function animateNumber(element, target) {
      let current = 0;
      const increment = target / 50;
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          current = target;
          clearInterval(timer);
        }
        element.textContent = Math.floor(current);
      }, 30);
    }

    document.addEventListener('DOMContentLoaded', function() {
      createParticles();
      
      const sampleStudents = [
        { id: '2021-001', name: 'John Doe', course: 'Computer Science' },
        { id: '2021-002', name: 'Jane Smith', course: 'Information Technology' },
        { id: '2021-003', name: 'Mike Johnson', course: 'Software Engineering' }
      ];

      const tbody = document.getElementById('studentTableBody');
      sampleStudents.forEach((student, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${student.id}</td>
          <td>${student.name}</td>
          <td>${student.course}</td>
        `;
        row.style.animationDelay = (index * 0.1) + 's';
        tbody.appendChild(row);
      });


      setTimeout(() => {
        animateNumber(document.getElementById('totalStudents'), sampleStudents.length);
        animateNumber(document.getElementById('totalCourses'), new Set(sampleStudents.map(s => s.course)).size);
      }, 500);

      const rows = document.querySelectorAll('tbody tr');
      rows.forEach(row => {
        row.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(10px)';
        });
        row.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });
    });

    window.addEventListener('scroll', function() {
      const header = document.querySelector('header');
      if (window.scrollY > 100) {
        header.style.background = 'rgba(0, 0, 0, 0.4)';
      } else {
        header.style.background = 'rgba(0, 0, 0, 0.2)';
      }
    });
  </script>
</body>
</html>
