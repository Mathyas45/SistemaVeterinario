<?php
include('app/config.php');
include('layout/parte1.php');

include('app/controlador/productos/listadoProductosControlador.php');
?>


<!--  CSS -->
<link rel="stylesheet" href="public/style/style1.css">
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
                    <img src="<?= $URL; ?>/public/img/Inkedrivas_dent-fondo_LI.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="<?php echo $URL . "/reservas.php"; ?>" class="btn btn-primary btn-lg d-sm-inline-block">Reservar Cita</a><br>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/336910848_1929509320734967_1451710792047092954_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeF_ARH8bkWbQ0nBrDPD2bMHZ9R2IM4C3Kln1HYgzgLcqfnK4mH9yTxaVvrKUtYXJQXSLjVPWygKdOsNZ5p44l5m&_nc_ohc=VV5PaLZrfV0AX8kxUFU&_nc_ht=scontent.fjau1-1.fna&oh=00_AfD2_NxogIjjA1o2ftLQWsRgFyDLXC7eWjF5kVDnaZ02MQ&oe=66103849" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/358117520_600039672311083_4375042145186645704_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEch6IMMboNwoq9TGtWSlwmQKyaZPj-mohArJpk-P6aiEbhHsk1Gy1OggNdXbWcIYLNc33fdGV3f37zrXYkJ42W&_nc_ohc=xYgBbWb6cfUAX8NINIj&_nc_ht=scontent.fjau1-1.fna&oh=00_AfBq2gnUhhEtEQ2uadwhNy9sWtYPZLHJPuAg7lDJHFRyjA&oe=66100B39" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
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
<section class='mb-5 mt-5  d-block d-sm-none'>
    <div style="text-align: center">
        <a href="<?php echo $URL . "/reservas.php"; ?>" class="btn btn-primary btn-lg d-sm-inline-block">Reservar Cita</a><br>

    </div>
</section>


<section id="our-services" class="our-services">
    <div class="container">
        <div class="row"></div>
        <div class="col-md-12 mb-5 mt-5">
            <center>
                <h1 style="color:#212A4B;">Nuestros <span class="text-primary">Servicios</span></h1>
            </center>
        </div>


        <div class="row">
            <div class="col-md-3  mx-auto">
                <div class="card">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/406494955_683803873934662_4182351338752615668_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHetRyhafrdNpuhfUKSVsZZ7GpAXTlalvHsakBdOVqW8f2PuCuhojZwEu1z_RDCaKAWV0QkUC6Nmz0Kl6pXqFjw&_nc_ohc=z_BOX9tvy_YAX_e-4ah&_nc_ht=scontent.fjau1-1.fna&oh=00_AfDF5rGRbMYM1tzm_McpMbPBoBiKt2KzS-tyKX-O8VcYLg&oe=6611158E" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Carillas dentales</h5>
                    <p class="card-text">La limpieza dental es un procedimiento que ayuda a mantener la salud bucal eliminando la placa y el sarro de los dientes, previniendo así enfermedades como la caries y la gingivitis.</p>

                    </div>

                </div>
            </div>

            <div class="col-md-3  mx-auto">
                <div class="card">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/357472492_600154322299618_4040627196387731625_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGauu6XNq_ECxh1OwOj7H9kx-WKs5EjqRPH5YqzkSOpEyDH0pVkyM2jVN2Cg_3pWyIPv_yjKViX2KERwcdeLltf&_nc_ohc=v0Sod53ud3gAX9GDd_P&_nc_ht=scontent.fjau1-1.fna&oh=00_AfDb0z8mm3wjJuXCz5xGfLHPjZbRiBqN8IFtsDOSm7tKpg&oe=66112726" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blanqueamiento Dental</h5>
                        <p class="card-text">El blanqueamiento dental es un tratamiento estético que consiste en aclarar el color de los dientes para mejorar su apariencia. Puede realizarse en el consultorio odontológico o en casa con un kit especial.</p>

                    </div>
                </div>
            </div>
<br>

            <div class="col-md-3 mx-auto">
                <div class="card">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/409183797_685243393790710_2315095368627960587_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEKjLeiUjlt3dX_ZEpr34RmUW7hxLBBzhhRbuHEsEHOGJ1L3rlru7VyolW_T0MfjMH71K-kq9SUCsZjs_qVBeMO&_nc_ohc=iByfka7JN-cAX9joTIZ&_nc_ht=scontent.fjau1-1.fna&oh=00_AfClSzVcg4ifOj-FJ0Mq5xCeh244OqnzKuu9GdHZBTzTHw&oe=66110DC4" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Tratamiento de Caries</h5>
                    <p class="card-text">El tratamiento de caries consiste en eliminar la parte dañada del diente y rellenar el área afectada con un material restaurador, como amalgama o resina compuesta, para restaurar su función y estética.</p>

                    </div>
                </div>

            </div>
            
            <div class="imagen col-md-3 mx-auto">

                <img src="https://cdn.pixabay.com/photo/2015/10/31/12/06/tooth-1015409_1280.jpg" alt="" width="160%">
            </div>
            
            <br>
            <div class="imagen col-md-3">

                <img src="https://img.freepik.com/vector-gratis/establecer-tratamiento-dental-e-higiene-protesis_24877-55019.jpg?w=740&t=st=1701855400~exp=1701856000~hmac=513742a1b3679bc57256fb95729f50f5dd686b719047efe0ed6823738d9969a0" alt="" width="100%">

            </div>
            
            

            <div class="col-md-3  mx-auto  mt-4">
                <div class="card">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/409547269_683803863934663_4694136372217319060_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHPd5COj0ZX2K3WbdzaUe4eMyverDMmIngzK96sMyYieE7VbRcc-YtuoYDsmqTegErXhXOPYS0yOy3r_InjDcOl&_nc_ohc=q_A6kJs0ljMAX-eV5sj&_nc_ht=scontent.fjau1-1.fna&oh=00_AfD9pAE1PWWgMJ-iK1R9FadIIjQBHWoj9jk5z0toAlysRw&oe=6611071E" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Protesis Dental</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk
                            of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3  mx-auto mt-4">
                <div class="card">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/406500956_683803947267988_3523087909843796647_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGvoWR48c_VkYVtBnqWB1nfL7T0rsp7hVMvtPSuynuFUxWWyuuAbisVss8ThGsH-gWkoAwfL9dKU1aXKuXxDUQj&_nc_ohc=TrFajgGZMQcAX__peNB&_nc_ht=scontent.fjau1-1.fna&oh=00_AfAToz4EEzDEiuU4dENaElSDs8CS0KzuAqVrp47cybZ-XA&oe=661115BC" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Implantes Dentales</h5>
                    <p class="card-text">Los implantes dentales son una opción para reemplazar dientes perdidos. Consisten en colocar un tornillo de titanio en el hueso maxilar o mandibular y luego colocar una corona artificial sobre él para restaurar la función y estética dental.</p>

                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>

                </div>
            </div>
            <div class="col-md-3 mx-auto  mt-4">
                <div class="card">
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/417513713_698671172447932_2770702603989822482_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFUVeRhB4ROOgz61-McfUt1u0KyFsaYx-C7QrIWxpjH4MLcFDh7Up8j8T7d6hWTmbJoL33pJC3Ncy6rkA9GyGtQ&_nc_ohc=vJeh16oMSfoAX_1Jp4G&_nc_ht=scontent.fjau1-1.fna&oh=00_AfD7WHbBWBEyhyPeMJvw6U_HHTe36r1AdD7LFYsTpN_cEw&oe=6611152C" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Ortodoncia</h5>
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

<!-- <section class="our-services">
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
                        <img src="<?= $URL . "/public/img/productos/" . $producto['imagen']; ?>" height="350px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $producto['nombre_producto']; ?></h5>
                            <p class="card-text"><?= $producto['descripcion']; ?></p>
                            <p class="card-text">Precio: S/.<?= $producto['precio_venta']; ?></p>
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
</section> -->
<section class="info" id="info">
    <div class="container">
        <div class="row">
            <div class="mt-5 col-md-6 col-sm-12">
                <center>
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/428091838_722928500022199_2673806761799185521_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHV49fGatLWH7j7AWm0g95BYSwpAvwkU4NhLCkC_CRTg8-W_hlmoOIT1e7vQOVQe-DGf1a8sMnVLCKSLdIypBfz&_nc_ohc=re0eEL-ZSj4AX-Rt6H0&_nc_ht=scontent.fjau1-1.fna&oh=00_AfDr7GhLDgiZUKYlr1_4L2vx9qs3fcJN_h8cxuSp7wPNNw&oe=66101303" alt="200px" width="400px" class="img-fluid d-block">
                </center>
            </div>



            <div class="parte2 col-md-6 col-sm-12">

                <h1 style="color:#212A4B;">Acerca de nuestro <span class="text-primary">consultorio Odontólogico</span></h1>
                <br>
                <p class="" style="text-align: justify; color:#212A4B;">

                    ¡Bienvenido a Rivas Dent!

                    En Rivas Dent, nos dedicamos a ofrecerte la mejor atención odontológica para que puedas lucir una sonrisa radiante y saludable. Nuestro compromiso es proporcionarte un servicio de alta calidad, respaldado por años de experiencia y un equipo de profesionales apasionados por la odontología.

                    En nuestro solutorio odontológico, nos esforzamos por crear un ambiente cálido y acogedor donde te sientas cómodo desde el momento en que entras por la puerta. Nos preocupamos por cada uno de nuestros pacientes y nos comprometemos a brindarte un tratamiento personalizado que se adapte a tus necesidades y objetivos dentales.</p>
                <center>
                    <a href="" class="btn btn-outline-primary btn-lg">Más sobre nosotros</a>

                </center>

            </div>

        </div>
    </div>
    <br>
</section>
<section id='porque' class="mt-5">
    <div class="container">
        <div class="row ">
            <div class="col-md-4" style="text-align: center; margin-top: 85px;">
                <div>
                    <h1 class="text-primary">¿Por qué elegirnos?</h1>
                    <p style="color:#212A4B;">Estamos comprometidos en darle a cada paciente un servicio de calidad, con los mejores resultados a corto, mediano y largo plazo. En nuestra primera década, tenemos más de 5 mil pacientes satisfechos, lo que nos da la seguridad de ir por el camino correcto</p>
                </div>
            </div>

            <style>
                @media (max-width: 992px) {
                    #porque .col-md-4 {
                        margin-top: 0;
                        /* Remover el margen en pantallas más pequeñas */
                    }
                }
            </style>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="url_destino_para_seguridad_y_garantia" style="text-decoration: none; color: inherit;">
                            <div class="card" style="height: 200px;">
                                <div class="card-body d-flex align-items-center">
                                    <img decoding="async" loading="lazy" width="138" height="138" src="https://www.clinicaliandent.com/wp-content/uploads/2020/09/seguridad.png" class="aux-attachment aux-featured-image aux-attachment-id-2514 mr-3" alt="seguridad" data-ratio="1" data-original-w="138">
                                    <h5 class="card-title mb-0 text-primary">
                                        Seguridad y garantía</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="url_destino_para_pacientes_satisfechos" style="text-decoration: none; color: inherit;">
                            <div class="card" style="height: 200px;">
                                <div class="card-body d-flex align-items-center">
                                    <img decoding="async" loading="lazy" width="138" height="138" src="https://www.clinicaliandent.com/wp-content/uploads/2020/09/pacientes.png" class="aux-attachment aux-featured-image aux-attachment-id-2513" alt="pacientes" data-ratio="1" data-original-w="138">
                                    <h5 class="card-title text-primary">
                                        Pacientes satisfechos</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="url_destino_para_odontologos_y_especialistas" style="text-decoration: none; color: inherit;">
                            <div class="card" style="height: 200px;">
                                <div class="card-body d-flex align-items-center">
                                    <img decoding="async" loading="lazy" width="138" height="138" src="https://www.clinicaliandent.com/wp-content/uploads/2020/09/especialistas.png" class="aux-attachment aux-featured-image aux-attachment-id-2512" alt="especialistas" data-ratio="1" data-original-w="138">
                                    <h5 class="card-title text-primary">
                                        Odontólogos y especialistas</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="url_destino_para_convenios" style="text-decoration: none; color: inherit;">
                            <div class="card" style="height: 200px;">
                                <div class="card-body d-flex align-items-center">
                                    <img decoding="async" loading="lazy" width="138" height="138" src="https://www.clinicaliandent.com/wp-content/uploads/2020/09/urgencias.png" class="aux-attachment aux-featured-image aux-attachment-id-2515" alt="urgencias" data-ratio="1" data-original-w="138">
                                    <h5 class="card-title text-primary">
                                        Convenios</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</section>
<br>
<section class="gallery" id="gallery">
    <div class="container">
        <br>
        <h1 style="text-align: center;color:#212A4B;" class="text-black mb-3">Nuestras <span class="text-primary">Fotos</span></h1>
        <div class="row">
            <div class="col-md-5 zoomP">
                <center>
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/338158786_1359858147891769_5132046198257141645_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEWF98J7KPfHP9ATzbW89Fa3ogc5xZFSo3eiBznFkVKjdLVrHhVQEYdohdDKklmFwj4rI3Pyza_vFQ6Xa3hmndL&_nc_ohc=tlnqd5mrwKoAX8zv9vY&_nc_oc=AdiDKbHB94TMIbb9UNDwRNUeyg9MkDRevztzViFUoi6376G0Q9AMDPJfKkxbJShSgk8&_nc_ht=scontent.fjau1-1.fna&oh=00_AfD977TMdJVxswJgSczvM0YuZ1qm2DgXBxWAxh114evKYQ&oe=66102A66" width="100%" height="300" alt="">
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
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/337545611_1153221802023600_5117824338805381034_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHFdtz7X-utZXJ75fGuBPqNKtKPADdfJA8q0o8AN18kD4_37y575Q4CytPFA4oSbfIKgByuWM425B_bbhao7Sys&_nc_ohc=S9tMGbYB4dsAX9P9e9o&_nc_ht=scontent.fjau1-1.fna&oh=00_AfCdZbkOPSMRQd6f2HEg5C-aJxGa8HAgCwbMLKxMRCg9jA&oe=66102717" alt="" width="100%" height="300px">
                </center>
                <br>
            </div>
            <div class="col-md-4 zoomP">
                <center>
                    <img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/329422510_910048883669020_6794726361375385862_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFkruUhfyYCp6lejPMBYyMn6Itzul_lZ8_oi3O6X-Vnz4oUAKhPraS-trrCukNXmkn9UX4kj_JmZIrgw0VuHLlP&_nc_ohc=im1V7PFhyR0AX_5Wt1c&_nc_oc=AdguFoHPLB1QEXllt0PklO3Llfk_g9zngbab1msb7CVOm144U1Vb3NeEZzw-u-Stp0w&_nc_ht=scontent.fjau1-1.fna&oh=00_AfCbQOTzFmMEtqRlN8Wp_98YbC6qo2MjCoj8NvPgfzeD-A&oe=66101612" alt="" width="100%" height="300px">
                </center>
                <br>
            </div>
            <div class="col-md-4  zoomP">
                <center><img src="https://scontent.fjau1-1.fna.fbcdn.net/v/t39.30808-6/357450545_596664195981964_3450426919523306718_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHZZzZ8QFnF3TdDjKFJNYM68sKA4LgjG3XywoDguCMbdStUUIbh9l6kWgkWHV7ZO4jNwAB02cC9_nCng5kNetA2&_nc_ohc=xwa-sxx0oawAX-1ZKkX&_nc_ht=scontent.fjau1-1.fna&oh=00_AfCssrudSYPsml1rfCJTQ291o3L5Isg_OEWVNDXg6dLjwQ&oe=66102C93" alt="" width="100%" height="300px">
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
<br>

<section class="contactos mt-4">
    <div class="container ">
        <br>


        <div class="row">
            <div class="col-md-6">
                <h1 style="text-align: center;" class="text-primary">Solicita mayor información</h1>
                <hr>
                <div class="card  mb-5 bg-primary">
                    <div class="card-header">
                        <center><b style="color:#212A4B;" class="text-white">Estamos para atender todas tus consultas.

                            </b></center>
                    </div>
                    <div class="card-body " >
                        <form action="" method="post" >
                            <div class="form-group">
                                <label for="" class="mb-2 text-white">Nombres y Apellidos</label>
                                <input class="form-control mb-2" type="text" placeholder="Escribe tu nombre..." required>
                            </div>
                            <div class="form-group">
                                <label for="" class="mb-2 text-white">Correo</label>
                                <input class="form-control mb-2" type="email" placeholder="Correo electrónico..." required>
                            </div>
                            <div class="form-group
                            ">
                                <label for="" class="mb-2 text-white">Celular</label>
                                <input class="form-control mb-2" type="text" placeholder="Número de Celular..." required>
                            </div>

                            <div class="form-group">
                                <label for="" class="mb-2 text-white">Mensaje</label>
                                <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                            </div>
                            <hr>
                            <div class="d-grip gap-2 ">
                                <button class="btn btn-light" style="width: 100%;" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1 "></div>
            <div class="col-md-5 ">
                <div class="card" style="height: 300px;">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <i class="bi bi-geo-alt-fill bg-yellow" style="font-size: 5rem; color: #F3A806;"></i>
                        <div class="d-flex flex-column justify-content-center">
                            <h5 class="card-title text-primary" style="text-align: center;">Sede El Tambo</h5>
                            <div class="widget-content text-center">
                                <p><span class="address_wrapper" style="color:#212A4B;">Jr. Cuzco 687</span></p>
                                <h4 class="text-primary">Teléfonos</h4>
                                <p style="color:#212A4B;">966 290 700</p>
                                <p>064 226670</a></p>
                                <h4 class="text-primary">Horarios</h4>
                                <p style="color:#212A4B;">Lunes a Sábado: 8:30 am a 1:00 pm - 3:00 pm a 8:30 pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    
                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.0000000000005!2d-76.9760736851489!3d-12.1190001914181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8b1b1b1b1b1%3A0x7b1b1b1b1b1b1b1!2sAv.%20Los%20Incas%201234%2C%20Cercado%20de%20Lima%2015011!5e0!3m2!1ses-419!2spe!4v1634266820734!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div> <!-- Espacio a la derecha -->
        </div>
    </div>
</section>
<section class="map mt-2 mb-1">
    <br>
    <center>
        <h1 style="color:#212A4B;">Encuentranos <span class="text-primary">Aquí</span></h1>
    </center>
    <br>
    <iframe src="https://www.google.com/maps/embed?pb=!4v1701846676888!6m8!1m7!1srXzwvM2MhgDgz4-HIhlXzg!2m2!1d-12.05765891883217!2d-75.20831458877494!3f297.00053573501293!4f-11.126712929002949!5f0.4000000000000002" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


    </div>

</section>


<footer>
    <hr>
    <div class="container-fluid mt-4">

        <div class="row">
            <div class="col-md-4">
                <img src="<?= $URL; ?>/public/img/logo1.jpg" width="90%" alt="">
            </div>

            <div class="col-md-4">
                <br>
                <h1 style="color:#212A4B;"><b>Rivas Dent</b></h1>
                <br>
                <a href="" class="btn btn-outline-primary mb-3">
                    <h3>Inicio</h3>
                </a>
                <br>
                <a href="#our-services" class="btn btn-outline-primary mb-3">
                    <h3>Nuestros Servicios</h3>
                </a>
                <br>
                <a href="#info" class="btn btn-outline-primary mb-3">
                    <h3>Sobre Nosotros</h3>
                </a>
                <!-- <br> -->
                <!-- <a href="" class="btn btn-outline-primary mb-3">
                    <h3>Comentarios</h3>
                </a> -->
                <br>
                <a href="#gallery" class="btn btn-outline-primary mb-3">
                    <h3>Galeria</h3>
                </a>
                <br>
                <!-- <a href="" class="btn btn-outline-primary mb-3">
                    <h3>Tienda en linea</h3>
                </a> -->

            </div>
            <div class="col-md-4">
                <br>
                <h1><b>Redes Sociales</b></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                <a href="https://www.facebook.com/centroodontologicorivas" class="btn btn-outline-primary me-5"><i class="bi bi-facebook"></i> Facebook</a>

                <a href="" class="btn btn-outline-info" style="outline-color: #d63384
                    ;"><i class="bi bi-instagram"></i> Instagam</a>
                <br>
                <br>
                <a href="" class="btn btn-outline-danger ms-1 me-5"><i class="bi bi-youtube"></i> Youtube</a>

                <a href="" class="btn btn-outline-success me-5"><i class="bi bi-whatsapp"></i> Whatsapp</a>
                <br>
                <br>
                <br>
                <h1>Contáctanos</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                <p><i class="bi bi-geo-alt-fill"></i> Av. Los Incas 1234, Lima, Perú</p>
                <p><i class="bi bi-telephone-fill"></i> +51 123 456 789</p>
                <p><i class="bi bi-envelope-fill"> mathyascoronado@gmail.com</i>
            </div>

        </div>
    </div>
    <div class="container-fluid bg-primary text-light">
        <br>
        <center>
            <h5>© Todos los derechos reservados Coax.Inc - 2023</h5>
        </center>
        <br>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>