<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    <!-- Custom CSS for Styling -->
    <style>
      /* Navbar fixed at top */
      .navbar {
        position: sticky;
        top: 0;
        z-index: 1000; /* Ensure it stays above other content */
      }

      /* Navbar link hover effect with underline animation */
      .nav-link {
        position: relative;
        padding-bottom: 5px; /* Space for underline */
        transition: color 0.3s ease;
      }

      .nav-link:hover {
        color: #fff; /* Change text color on hover */
      }

      /* Underline effect on hover */
      .nav-link:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background-color: #fff;
        transform: scaleX(0);
        transition: transform 0.3s ease-in-out;
      }

      .nav-link:hover:after {
        transform: scaleX(1); /* Underline appears when hovering */
      }

      /* Dropdown item hover effect */
      .dropdown-item:hover {
        background-color: #f8f9fa;
        transition: background-color 0.3s ease;
      }

      /* Style for navbar brand */
      .navbar-brand {
        font-weight: bold;
        font-size: 1.5rem;
      }

      /* Center the navbar items */
      .navbar-nav {
        margin-left: auto;
        margin-right: auto;
      }

      /* Mobile responsiveness tweaks */
      @media (max-width: 768px) {
        .navbar {
          padding: 10px;
        }

        .navbar-brand {
          font-size: 1.2rem;
        }

        .container {
          margin-top: 20px;
        }
      }
    </style>

    <title>E Arsip |PERKIM|</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="?hal=home">E ARSIP PERKIM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto"> <!-- Centering navbar items with mx-auto -->
          <li class="nav-item active">
            <a class="nav-link" href="?hal=home">HOME <span class="sr-only"></span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="?haladmin=inputhal">INPUT DATA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?haladmin=arsiphal">DATA ARSIP</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              LAYANAN
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="https://sicantik.go.id/">SICANTIK</a>
              <a class="dropdown-item" href="https://siarum.tegalkab.go.id/">SIARUM</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-danger" href="logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>
