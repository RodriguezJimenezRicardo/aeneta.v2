@extends('layouts.index', ['navbar' => true])

@section('content')
<div class="container">
 <!-- Modal -->
 <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="background-color: #e4ebf0;">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="/img/team.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Challenge</b> Team</h1>
                                <h3 class="h2">Repositorio de Trabajos Academicos ESCOM</h3>
                                <p>
                                    Es mas que una plataforma digital que almacena, organiza y proporciona acceso a 
                                    documentos y publicaciones academicas  
                                    sin tanto esfuerzo 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="/img/trabajos.jpeg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Sube tus Trabajos Academicos</h1>
                                <h3 class="h2">Facil e intuitivo</h3>
                                <p>
                                    Si eres estudiante de ESCOM, ingresa con tu correo y boleta y difruta de las 
                                    funciones, que permiten tener un repositorio mas amplio de todos los trabajos existentes y un orden en ellos.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="/img/seguir.jpeg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Dale seguimiento a tus Trabajos</h1>
                                <h3 class="h2">Toda la informacion que necesitas para tus Trabajos Academicos </h3>
                                <p>
                                    Con aeneta severla estarás simpre al tanto de tus Trabajos.
                                    Puedes dar seguimiento a tu proceso de asignacion de Sinodales, La evaluacion de tu trabajo, el estatus de subida y metodos de titulacion.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


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
</div>

@endsection

