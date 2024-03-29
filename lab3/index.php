<!DOCTYPE html>
<html>
<head>
    <style>
        footer {
          margin: auto;
          width: 100%;
          text-align: center;
        }
        .header {
            color: #0A0A0A;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
            box-shadow: 0px 10px 6px -8px rgba(34, 60, 80, 0.5);
        }
        .logo {
            order: 0;
        }
        .text {
            order: 1;
            width: 100%;
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #0A0A0A;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .form-container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #181818;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(255,255,255,0.1);
        }
        .form-field {
            margin-bottom: 20px;
        }
        .form-field label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }
        .form-field input[type="text"],
        .form-field input[type="email"],
        .form-field textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #282828;
            color: #fff;
        }
        .form-field input[type="checkbox"] {
            margin-right: 10px;
        }
        .form-field button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-field button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
      <div class="header">
          <div class="logo">
              <img src="https://mospolytech.ru/upload/medialibrary/5fa/Logo_Polytech_rus_main.jpg" width="200px" alt="Логотип">
          </div>
          <div class="text">
              <h1>Домашняя работа: Feedback Form</h1>
          </div>
      </div>
    </header>

    <main>
        <?php 
        print_r(get_headers("http://localhost/php/lab999/form.php"));
        ?>
        <a href="form.html">Назад на первую</a>
    </main>
    <footer>
        <h2>Задание для самостоятельной работы</h2>
    </footer>
</body>
</html>
