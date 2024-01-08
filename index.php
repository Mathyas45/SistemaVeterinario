<?php
include('app/config.php');
include('layout/parte1.php');

include('app/controlador/productos/listadoProductosControlador.php');
?>



    <section>
        <div class="container-fluid">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-perro_23-2149100186.jpg?w=1380&t=st=1701055167~exp=1701055767~hmac=cf6254bdc0a89a96877d8c71aa440679fc3ac0b2be52fd7e132560098b4f2da6" height="800dp" width="10dp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <a href="<?php echo $URL."/reservas.php"; ?>" class="btn btn-primary mb-5 btn-lg">Reservar Cita</a><br>
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/vector-gratis/fondo-plano-dia-internacional-gato_52683-86986.jpg?w=1380&t=st=1701054612~exp=1701055212~hmac=e95c3bfba8c779577abb12936c6f585f00e09f0cae97f53046fda8a143994ee5" height="800dp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2012/02/27/17/00/puppy-17473_1280.jpg" height="800dp" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section class="our-services">
        <div class="container">
            <div class="row"></div>
            <div class="col-md-12 mb-5 mt-5">
                <center>
                    <h1>Nuestros <span class="text-primary">Servicios</span></h1>
                </center>
            </div>


            <div class="row">
                <div class="col-md-3  mx-auto">
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-perro_23-2149100197.jpg?w=1380&t=st=1701065356~exp=1701065956~hmac=16217a0ee5ff864beeaf8edfb6d8fa00b098f12762af9836a13a8a4da54469a9" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card titleee</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>

                    </div>
                </div>

                <div class="col-md-3  mx-auto">
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/acercamiento-al-medico-veterinario-cuidando-mascota_23-2149267934.jpg?w=1380&t=st=1701065263~exp=1701065863~hmac=6ffca0c90978897d6c86e1ab44e34612d9175516e2324a70d7d3b50d5b0692d8" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mx-auto">
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-perro_23-2149100223.jpg?size=626&ext=jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                </div>

                <div class="imagen col-md-3 mx-auto">

                    <img src="https://cdn.pixabay.com/photo/2013/07/12/14/17/stethoscope-148159_1280.png" alt="" width="160%">
                </div>
                <br>
                <div class="imagen col-md-3">

                    <img src="https://img.freepik.com/vector-gratis/establecer-tratamiento-dental-e-higiene-protesis_24877-55019.jpg?w=740&t=st=1701855400~exp=1701856000~hmac=513742a1b3679bc57256fb95729f50f5dd686b719047efe0ed6823738d9969a0" alt="" width="100%">

                </div>
                <div class="col-md-3  mx-auto">
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-perro_23-2149100197.jpg?w=1380&t=st=1701065356~exp=1701065956~hmac=16217a0ee5ff864beeaf8edfb6d8fa00b098f12762af9836a13a8a4da54469a9" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card titleee</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>

                    </div>
                </div>

                <div class="col-md-3  mx-auto">
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/acercamiento-al-medico-veterinario-cuidando-mascota_23-2149267934.jpg?w=1380&t=st=1701065263~exp=1701065863~hmac=6ffca0c90978897d6c86e1ab44e34612d9175516e2324a70d7d3b50d5b0692d8" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mx-auto">
                    <div class="card">
                        <img src="https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-perro_23-2149100223.jpg?size=626&ext=jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <br>
    </section>

    <section class="our-services">
        <div class="container">
            <div class="row"></div>
            <div class="col-md-12 mb-5 mt-5">
                <center>
                    <h1>Nuestros <span class="text-primary">Productos</span></h1>
                </center>
            </div>


            <div class="row">

                <?php
                foreach ($productos as $producto) { ?>

                    <div class="col-md-3">
                        <div class="card">
                            <img src="<?= $URL."/public/img/productos/".$producto['imagen']; ?>" height="350px" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?=$producto['nombre_producto']; ?></h5>
                                <p class="card-text"><?=$producto['descripcion']; ?></p>
                                <p class="card-text">Precio: S/.<?=$producto['precio_venta']; ?></p>
                            </div>

                        </div>
                    </div>
                    <br>
                <?php
                }
                ?>




            </div>

        </div>
        <br>
    </section>
    <section class="info">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 ">
                    <center>
                        <img src="public/img/29.png" alt="" width="100%">
                    </center>
                </div>

                <div class="parte2 col-md-6 col-sm-12">

                    <h1>Acerca de nuestra <span class="text-primary">clínica de mascotas</span></h1>
                    <br>
                    <p class="" style="text-align: justify;"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Ratione,
                        dolores, fugit, voluptatem
                        architecto placeat vel incidunt odit in assumenda nobis ipsam sapiente! Ea nobis obcaecati
                        consequuntur est sapiente, dolore maxime!</p>
                    <a href="" class="btn btn-outline-primary btn-lg">Más sobre nosotros</a>

                </div>

            </div>
        </div>
        <br>
    </section>
    <section class="gallery">
        <div class="container">
            <br>
            <h1 class="text-black mb-3 ">Nuestras <span class="text-primary">Fotos</span></h1>
            <div class="row">
                <div class="col-md-5 zoomP">
                    <center>
                        <img src="https://cdn.pixabay.com/photo/2019/05/07/12/53/vet-4185908_1280.jpg" width="100%" height="300" alt="">
                    </center>
                    <br>
                </div>


                <div class="col-md-7 zoomP">
                    <center>
                        <img src="https://img.freepik.com/foto-gratis/retrato-grupo-adorables-cachorros_53876-64778.jpg?w=1800&t=st=1701069720~exp=1701070320~hmac=1408751f88d680a9a0163df31cb8fb9a1a50e9b05fce296d40f86e3e2f349872" width="100%" height="300px" alt="">
                    </center>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 zoomP">
                    <center>
                        <img src="https://cdn.pixabay.com/photo/2016/07/19/22/59/veterinary-1529191_1280.jpg" alt="" width="100%" height="300px">
                    </center>
                    <br>
                </div>
                <div class="col-md-4 zoomP">
                    <center>
                        <img src="https://cdn.pixabay.com/photo/2020/03/17/10/13/monitoring-4939621_640.jpg" alt="" width="100%" height="300px">
                    </center>
                    <br>
                </div>
                <div class="col-md-4  zoomP">
                    <center><img src="https://cdn.pixabay.com/photo/2022/05/15/12/35/vet-7197464_640.png" alt="" width="100%" height="300px">
                    </center>
                    <br>
                </div>
            </div>
        </div>
    </section>


    <!-- <section class="clients">
        <div class="container">
            <br><br>
            <h1 style="text-align: center">Testimonios de Clientes</h1> <br><br>
            <div class="row">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="" height="100px" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
 -->
    <section class="contactos mt-4">
        <div class="container ">
            <br>
            <center>
                <h1 class="text-primary">Contáctanos</h1>
            </center>


            <div class="row">
                <div class="col-md-3"></div> <!-- Espacio a la izquierda -->
                <div class="col-md-6">


                    <div class="card  mb-5">
                        <div class="card-header">
                            <center><b>Rellena los campos</b></center>
                        </div>
                        <div class="card-body  bg-primary">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="" class="mb-2 text-white" >Nombres y Apellidos</label>
                                    <input class="form-control mb-2" type="text" placeholder="Escribe tu nombre..." required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-2 text-white">Correo</label>
                                    <input class="form-control mb-2" type="email" placeholder="Correo electrónico..." required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="mb-2 text-white">Mensaje</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                                </div>
                                <hr>
                                <div class="d-grip gap-2">
                                    <button class="btn btn-light"  style="width: 100%;" type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div> <!-- Espacio a la derecha -->
            </div>
        </div>
    </section>
    <section class="map mt-2 mb-1">
        <br>
        <center>
            <h1>Encuentranos <span class="text-primary">Aquí</span></h1>
        </center>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!4v1701846676888!6m8!1m7!1srXzwvM2MhgDgz4-HIhlXzg!2m2!1d-12.05765891883217!2d-75.20831458877494!3f297.00053573501293!4f-11.126712929002949!5f0.4000000000000002" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>

    </section>

<?php

include('layout/parte2.php');

?>
