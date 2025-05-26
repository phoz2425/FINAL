<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Student - WST System</title>
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
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    /* Animated background elements */
    .bg-animation {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
    }

    .floating-shape {
      position: absolute;
      border-radius: 50%;
      background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
      animation: float 6s ease-in-out infinite;
    }

    .shape-1 {
      width: 80px;
      height: 80px;
      top: 10%;
      left: 10%;
      animation-delay: 0s;
    }

    .shape-2 {
      width: 120px;
      height: 120px;
      top: 70%;
      right: 10%;
      animation-delay: 2s;
    }

    .shape-3 {
      width: 60px;
      height: 60px;
      bottom: 20%;
      left: 20%;
      animation-delay: 4s;
    }

    @keyframes float {
      0%, 100% { 
        transform: translateY(0px) rotate(0deg) scale(1); 
        opacity: 0.7;
      }
      50% { 
        transform: translateY(-30px) rotate(180deg) scale(1.1); 
        opacity: 1;
      }
    }

    .form-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 25px;
      padding: 50px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
      position: relative;
      z-index: 10;
      animation: slideInUp 0.8s ease-out;
    }

    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 2px;
      background: linear-gradient(90deg, #00f5ff, #ff00ff, #00f5ff);
      background-size: 200% 100%;
      animation: gradient-move 3s linear infinite;
      border-radius: 25px 25px 0 0;
    }

    @keyframes gradient-move {
      0% { background-position: 0% 50%; }
      100% { background-position: 200% 50%; }
    }

    .form-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .form-title {
      font-size: 2.5rem;
      font-weight: 800;
      background: linear-gradient(45deg, #fff, #00f5ff, #ff00ff);
      background-size: 200% 200%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradient-text 3s ease infinite;
      margin-bottom: 10px;
    }

    @keyframes gradient-text {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .form-subtitle {
      color: rgba(255, 255, 255, 0.8);
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 25px;
      position: relative;
    }

    .form-input {
      width: 100%;
      padding: 18px 25px;
      font-size: 16px;
      border: 2px solid rgba(255, 255, 255, 0.2);
      border-radius: 50px;
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
      transition: all 0.3s ease;
      outline: none;
    }

    .form-input::placeholder {
      color: rgba(255, 255, 255, 0.6);
      transition: all 0.3s ease;
    }

    .form-input:focus {
      border-color: #00f5ff;
      background: rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 25px rgba(0, 245, 255, 0.3);
      transform: translateY(-2px);
    }

    .form-input:focus::placeholder {
      color: rgba(255, 255, 255, 0.8);
      transform: translateX(10px);
    }

    .input-icon {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      color: rgba(255, 255, 255, 0.6);
      font-size: 20px;
      transition: all 0.3s ease;
    }

    .form-input:focus + .input-icon {
      color: #00f5ff;
      transform: translateY(-50%) scale(1.2);
    }

    .button-group {
      display: flex;
      gap: 15px;
      margin-top: 40px;
      flex-wrap: wrap;
    }

    .btn {
      flex: 1;
      min-width: 140px;
      padding: 18px 30px;
      font-size: 16px;
      font-weight: 700;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s ease;
    }

    .btn:hover::before {
      left: 100%;
    }

    .btn-primary {
      background: linear-gradient(45deg, #00f5ff, #0099cc);
      color: #000;
      box-shadow: 0 10px 25px rgba(0, 245, 255, 0.3);
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(0, 245, 255, 0.4);
    }

    .btn-secondary {
      background: linear-gradient(45deg, #ff006e, #cc0055);
      color: #fff;
      box-shadow: 0 10px 25px rgba(255, 0, 110, 0.3);
    }

    .btn-secondary:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(255, 0, 110, 0.4);
    }

    .btn:active {
      transform: translateY(-1px);
    }

    /* Loading animation */
    .btn.loading {
      pointer-events: none;
      opacity: 0.7;
    }

    .btn.loading::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 20px;
      height: 20px;
      margin-top: -10px;
      margin-left: -10px;
      border: 2px solid transparent;
      border-top: 2px solid #fff;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .success-message {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: linear-gradient(45deg, #00ff88, #00cc6a);
      color: #000;
      padding: 20px 40px;
      border-radius: 25px;
      font-weight: bold;
      font-size: 18px;
      box-shadow: 0 25px 50px rgba(0, 255, 136, 0.3);
      z-index: 1000;
      animation: successPop 0.6s ease-out;
      display: none;
    }

    @keyframes successPop {
      0% {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.5);
      }
      80% {
        transform: translate(-50%, -50%) scale(1.1);
      }
      100% {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .form-container {
        padding: 30px 25px;
        margin: 20px;
      }
      
      .form-title {
        font-size: 2rem;
      }
      
      .button-group {
        flex-direction: column;
      }
      
      .btn {
        min-width: 100%;
      }
    }

    /* Input validation styles */
    .form-input.valid {
      border-color: #00ff88;
      box-shadow: 0 0 15px rgba(0, 255, 136, 0.2);
    }

    .form-input.invalid {
      border-color: #ff006e;
      box-shadow: 0 0 15px rgba(255, 0, 110, 0.2);
    }

    .error-message {
      color: #ff006e;
      font-size: 14px;
      margin-top: 8px;
      margin-left: 25px;
      animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-5px); }
      75% { transform: translateX(5px); }
    }
  </style>
</head>
<body>

  <div class="bg-animation">
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
  </div>

  <div class="form-container">
    <div class="form-header">
      <h1 class="form-title">Add Student</h1>
      <p class="form-subtitle">Register a new student to the system</p>
    </div>

    <form id="studentForm" method="post">
      <div class="form-group">
        <input type="text" name="id" class="form-input" placeholder="Student ID (e.g., 2024-001)" required>
        <span class="input-icon">🆔</span>
      </div>

      <div class="form-group">
        <input type="text" name="name" class="form-input" placeholder="Full Name" required>
        <span class="input-icon">👤</span>
      </div>

      <div class="form-group">
        <input type="text" name="course" class="form-input" placeholder="Course (e.
