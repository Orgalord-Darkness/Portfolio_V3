<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio BTS SIO - SLAM</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionnel: importer la police Roboto depuis Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        /* Ton CSS ici inchangé */
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #1f2d3d;
            font-family: 'Roboto', sans-serif;
        }

        .list-group {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 100%;
            animation: zoomIn 0.5s ease-in-out, fadeIn 0.8s;
            transition: all 0.3s ease-in-out;
            position: relative;
        }

        .list-group a {
            width: 100%;
            padding: 15px;
            margin: 15px 0;
            font-size: 1.5rem;
            border-radius: 30px;
            background-color: #343a40;
            color: #fff;
            opacity: 0;
            transform: translateY(50px);
            animation: fadeInUp 0.8s forwards;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .list-group a:nth-child(1) { animation-delay: 0.5s; }
        .list-group a:nth-child(2) { animation-delay: 1s; }
        .list-group a:nth-child(3) { animation-delay: 1.5s; }

        .list-group a:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
            background-color: #007bff;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .list-group a.btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }

        .list-group a.btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .decoration {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            opacity: 0.1;
        }

        .code-line {
            position: absolute;
            color: rgba(245, 245, 0, 0.8);
            font-size: 1rem;
            font-family: 'Courier New', monospace;
            animation: floating 6s ease-in-out infinite;
        }

        .code-line:nth-child(1) {
            top: 20%;
            left: 10%;
        }

        .code-line:nth-child(2) {
            top: 50%;
            right: 5%;
        }

        .code-line:nth-child(3) {
            bottom: 10%;
            left: 30%;
        }
        .code-line:nth-child(4) {
            top: 10%;
            left: 9%;
        }

        .code-line:nth-child(5) {
            top: 40%;
            left: 15%;
        }

        .code-line:nth-child(6) {
            bottom: 5%;
            left: 5%;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>
<body>

    <div class="decoration"></div>
    <div class="code-line">echo "Bienvenue" ; </div>
    <div class="code-line">System.Console.WriteLine("Hello World!");</div>
    <div class="code-line">print("Portfolio Version 2")</div>
    <div class="code-line">cd portfolio/resultat/ ; </div>
    <div class="code-line">var = 42; console.log(var); </div>
    <div class="code-line">symfony serve</div>

    <div class="list-group d-grid gap-2 col-12 mx-auto my-auto">
        <a class="btn btn-secondary" title="Accéder à la première version" href="{{ url('portfolioV1/index.php') }}">
            PORTFOLIO V1 - Html/css/js
        </a>
        <a class="btn btn-secondary" title="Accéder à la seconde version" href="{{ url('portfolio/') }}">
            PORTFOLIO V2 - Back office php
        </a>
        <a class="btn btn-primary" title="Accéder à la troisième version" href="{{ url('app') }}">
            PORTFOLIO V3 : Laravel - VueJS 
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

