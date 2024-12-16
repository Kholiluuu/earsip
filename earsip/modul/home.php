<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Light Bulb</title>
  <style>
    /* Base styling */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(90deg, red, blue); /* Initial gradient */
      background-size: 200% 200%; /* Scale up for smooth animation */
      animation: gradient-animation 5s ease infinite; /* Apply animation */
      color: #fff;
    }

    @keyframes gradient-animation {
      0% {
        background-position: 0% 50%; /* Start position */
      }
      50% {
        background-position: 100% 50%; /* Midway position */
      }
      100% {
        background-position: 0% 50%; /* Return to start */
      }
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    .content {
      display: flex;
      align-items: center;
      gap: 20px;
      flex-wrap: wrap; /* Enable responsiveness by wrapping */
    }

    .image-container img {
      max-width: 300px;
      width: 100%; /* Ensure the image adjusts responsively */
      border-radius: 10px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
    }

    .text-content {
      max-width: 500px; /* Increase max-width for better readability */
      width: 100%; /* Ensure responsive behavior */
      text-align: center; /* Center text content for smaller screens */
    }

    .text-content h1 {
      font-size: 2.5em;
      margin: 0;
      background: linear-gradient(90deg, #FF5722, #FF8A50);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .text-content h2 {
      font-size: 2em;
      margin: 10px 0;
      color: #fff;
    }

    .text-content p {
      font-size: 1em;
      line-height: 1.8;
      color: #ccc;
    }

    .menu {
      position: absolute;
      top: 20px;
      right: 20px;
      color: #FF5722;
      font-size: 1.2em;
      cursor: pointer;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
      .content {
        flex-direction: column; /* Stack elements vertically on small screens */
        align-items: center;
      }

      .text-content h1 {
        font-size: 2em;
      }

      .text-content h2 {
        font-size: 1.8em;
      }
    }

    @media (max-width: 480px) {
      .text-content p {
        font-size: 0.9em;
      }

      .menu {
        font-size: 1em;
      }
    }
  </style>
</head>
<body>
 

  <div class="container text-center">
    <div class="content">
      <div class="image-container">
        <img src="image/umah.png" alt="Light Bulb" >
      </div>
      <div class="text-content">
        <h1>KABUPATEN TEGAL</h1>
        <h2>DINAS PERKIM</h2>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio maiores accusamus vero impedit quos veritatis laboriosam architecto iusto. Ea, voluptatem atque distinctio et corporis dolores doloribus culpa quod delectus libero!
        </p>
        
        
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>