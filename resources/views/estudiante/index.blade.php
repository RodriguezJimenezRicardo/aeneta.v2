@extends('layouts.baseUser', ['navbar' => true,'id_estudiante' => $estudiante->id_estudiante])

@section('content')
    <div class="containerperfil" style="background-color: #bdd1de;">
        <section class="carta">
            <img src="/img/trabajos.jpeg" alt="Fondo de la carta" class="fondoCarta">
            <img src="/img/perfil.png" alt="Foto de perfil" class="fotoPerfil">
            <div class="detalles">
            <p>Bienvenid@:   {{ $estudiante->nombre }} </p>
                <p>Estudiante</p>
                <section class="info">
                    <div>Estado</div>
                    <div>Boleta</div>
                </section>
                <section class="influencia">
                    <div>Activo</div>
                    <div> {{ $estudiante->id_estudiante }}</div>
                </section>
                <section class="botonperfil">
                <button class="btn btn-primary mt-4"
                    onclick="window.location.href='{{ route('estudiante.consultarTrabajos', ['id_estudiante' => $estudiante->id_estudiante]) }}'">Consultar
                    trabajo(s)
                    terminales</button>
                </section>
            </div>
        </section>
    </div>

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3" style="background-color: #bdd1de;">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Enlaces Destacados</h1>
                <p>
                    Mejora la experiencia teniendo todo lo necesario al alcance de un click
                    Selecciona el enlace que desees
                </p>
            </div>
        </div>
        <div class="row" style="background-color: #bdd1de;">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="/img/escom2.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">ESCOM</h5>
                <p class="text-center"><a class="btn btn-success" href="https://www.escom.ipn.mx/SSEIS/apoyoseducativos/servicios/titulacion.php">Go to Page</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="/img/Saes.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">SAES</h2>
                <p class="text-center"><a class="btn btn-success" href="https://www.saes.escom.ipn.mx/">Go to Page</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="/img/cual.jpeg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Accessories</h2>
                <p class="text-center"><a class="btn btn-success" href="https://www.saes.escom.ipn.mx/">Go to Page</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer" style="background-color: #e4ebf0;">
        <div class="container" >
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Challenge Teams</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            123 Consectetur at ligula 10660
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">5573442640</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">Challengeteam@contacto.ipn.mx</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Conócenos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Sobre nosotros</a></li>
                        <li><a class="text-decoration-none" href="#">Mision</a></li>
                        <li><a class="text-decoration-none" href="#">Vision</a></li>
                        <li><a class="text-decoration-none" href="#">Objetivos</a></li>
                        <li><a class="text-decoration-none" href="#">Ubicacion</a></li>
                        <li><a class="text-decoration-none" href="#">Asesorias</a></li>
                        <li><a class="text-decoration-none" href="#">Ver luego</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Otra Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Inicio</a></li>
                        <li><a class="text-decoration-none" href="#">IPN</a></li>
                        <li><a class="text-decoration-none" href="#">Locaciones</a></li>
                        <li><a class="text-decoration-none" href="#">ESCOM</a></li>
                        <li><a class="text-decoration-none" href="#">Contacto</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3"  style="background-color: #e4ebf0;">
            <div class="container" style="background-color: #e4ebf0;">
                <div class="row pt-2">
                    <div class="col-12">
                       <p>&copy; 2024 Challenge team</p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

@endsection
