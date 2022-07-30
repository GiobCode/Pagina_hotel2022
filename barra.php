<head>
    <style>
        li:hover
        {
        background-color:#000000;
        color:white;
        }
        
        .nav-item
        {
        color: black;
        display: block;
        font-size: 10pt;
        font-family: 'GothamBook';
        padding: 1px 30px;
        text-transform: uppercase;
        letter-spacing: 4px;
        transition: background .5s;
        border-right: 1px solid #000000;
        }
    </style>
</head>

 <header>
            <nav class="navbar navbar-expand-lg bg-light fixed-top">
                <div class="container-fluid">  <!-- Inicio del div contenedor principal-->
                    <a class="navbar-brand" href="#">
                        <img src="icon.jpg" alt="" width="50" height="50" class="d-inline-block align-text-top">
                        Hotel Samaros</a>
                    <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" id ="boton1"><img src="boton.png"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent" > <!-- Contenedor para generar efecto menu -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" id = "navul1">
                          <li class="nav-item"><a class="nav-link active" href="login.php">Salir</a></li>
                          <li class="nav-item"><a class="nav-link" href="reservaciones.php">Reservas</a></li>
                          <li class="nav-item"><a class="nav-link" href="habitaciones.php">Habitaciones</a></li>
                        </ul>
                    </div> <!-- Cierre del div efecto menu -->
                </div> <!-- Cierre del div contenedor principal -->
        </nav>
</header>