@extends ('front.layout')

@section('style')
@endsection


@section('content')
    <main>
        <div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">

            <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
            <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
                <div class="row d-flex align-items-center justify-content-center py-vh-5">
                    <div class="col-12 col-xl-10">
                        <span class="h5 text-secondary fw-lighter">Découvrez l'expérience Ebony</span>
                        <h1 class="display-huge mt-3 mb-3 lh-1"> Des préservatifs aromatisés qui réveillent vos sens.</h1>
                    </div>

                    <!-- <div class="videoWrapper">
                <video autoplay="" loop="" muted="" class="custom-video" poster="">
                  <source src="/video/video.mp4" type="video/mp4">
                  La video n'est pas suportté par votre navigateur
                </video>
              </div> -->

                    <div class="col-12 col-xl-8">
                        <p class="lead text-secondary">Profitez des délices et de la sécurité des préservatifs Ebony.
                            Saveurs
                            exquises, fiabilité inégalée. Commandez pour des moments intimes inoubliables. Livraison rapide
                            et
                            discrète.</p>
                    </div>
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-xl btn-light">Faire une commande
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-100 position-relative bg-black text-white bg-cover d-flex align-items-center">
            <div class="container-fluid px-vw-5">
                <div class="position-absolute w-100 h-50 bg-dark bottom-0 start-0"></div>
                <div class="row d-flex align-items-center position-relative justify-content-center px-0 g-5">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('front/img/webp/abstract18.webp') }}" width="2280" height="1732" alt="abstract image"
                            class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{ asset('front/img/webp/abstract6.webp') }}" width="1116" height="1578" alt="abstract image"
                            class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                            data-aos-duration="2000">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{ asset('front/img/webp/abstract9.webp') }}" width="1116" height="848" alt="abstract image"
                            class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                            data-aos-duration="3000">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark">
            <div class="container px-vw-5 py-vh-5">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-7 text-lg-end" data-aos="fade-right">
                        <span class="h5 text-secondary fw-lighter">La différence Ebony en bref</span>
                        <h2 class="display-4">Vivez une explosion de plaisir et de protection avec les préservatifs Ebony :
                            Réveillez vos sens et embrasez l'intimité ardente</h2>
                    </div>
                    <div class="col-12 col-lg-5" data-aos="fade-left">
                        <h3 class="pt-5">Sensation exquise</h3>
                        <p class="text-secondary">Explorez des saveurs exquises et des textures sensuelles pour une
                            expérience
                            intime inoubliable.<br>
                            <a href="#" class="link-fancy link-fancy-light me-2">Je ne peux plus attendre ! </a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                            </svg>
                        </p>
                        <h3 class="border-top border-secondary pt-5 mt-5">Confiance totale</h3>
                        <p class="text-secondary">Protégez-vous avec fiabilité grâce à des préservatifs de qualité
                            supérieure qui
                            répondent aux normes internationales les plus strictes.<br>
                            <a href="#" class="link-fancy link-fancy-light me-2">Osez Ebony dès maintenant !</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                            </svg>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-black py-vh-3">
            <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow">

                <div class="row gx-5">
                    <div class="col-12 col-md-6">
                        <div class="card bg-transparent mb-5" data-aos="zoom-in-up">
                            <div class="bg-dark shadow rounded-5 p-0">
                                <img src="{{ asset('front/img/webp/abstract3.webp') }}" width="582" height="327" alt="abstract image"
                                    class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                                <div class="p-5">
                                    <h2 class="fw-lighter">Ipsum dolor est</h2>
                                    <p class="pb-4 text-secondary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam
                                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
                                    <a href="#" class="link-fancy link-fancy-light">Read more</a>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-transparent" data-aos="zoom-in-up">
                            <div class="bg-dark shadow rounded-5 p-0">
                                <img src="{{ asset('front/img/webp/abstract2.webp') }}" width="582" height="442" alt="abstract image"
                                    class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                                <div class="p-5">
                                    <h2 class="fw-lighter">Ipsum dolor est</h2>
                                    <p class="pb-4 text-secondary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam
                                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
                                    <a href="#" class="link-fancy link-fancy-light">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="p-5 pt-0 mt-5" data-aos="fade">
                            <span class="h5 text-secondary fw-lighter">Saveurs Ebony irrésistibles</span>
                            <h2 class="display-4">Découvrez notre sélection de préservatifs Ebony : Plaisir aromatisé et
                                protection
                                suprême</h2>
                        </div>
                        <div class="card bg-transparent mb-5 mt-5" data-aos="zoom-in-up">
                            <div class="bg-dark shadow rounded-5 p-0">
                                <img src="{{ asset('front/img/webp/abstract17.webp') }}" width="582" height="390" alt="abstract image"
                                    class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                                <div class="p-5">
                                    <h2 class="fw-lighter">Ipsum dolor est</h2>
                                    <p class="pb-4 text-secondary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam
                                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
                                    <a href="#" class="link-fancy link-fancy-light">Read more</a>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-transparent" data-aos="zoom-in-up">
                            <div class="bg-dark shadow rounded-5 p-0">
                                <img src="{{ asset('front/img/webp/abstract4.webp') }}" width="582" height="327" alt="abstract image"
                                    class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                                <div class="p-5">
                                    <h2 class="fw-lighter">Ipsum dolor est</h2>
                                    <p class="pb-4 text-secondary">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam
                                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
                                    <a href="#" class="link-fancy link-fancy-light">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- </div>
        <div class="bg-dark position-relative">
          <div class="container px-vw-5 py-vh-5">
            <div class="row d-flex align-items-center">

              <div class="col-12 col-lg-7">
                <img class="img-fluid rounded-5 mb-n5 shadow" src="img/webp/person9.webp" width="512" height="512"
                  alt="a nice person" loading="lazy" data-aos="zoom-in-right">
                <img class="img-fluid rounded-5 ms-5 mb-n5 shadow" src="img/webp/person11.webp" width="512" height="512"
                  alt="another nice person" loading="lazy" data-aos="zoom-in-up">
              </div>
              <div class="col-12 col-lg-5 bg-dark rounded-5 py-5" data-aos="fade">
                <span class="h5 text-secondary fw-lighter">Do you like faces?</span>
                <h2 class="display-4">We constantly adding new images to our website. Does it make sense? No!</h2>
              </div>
            </div>
          </div>
        </div> -->

            <!-- <div class="bg-black">
          <div class="container px-vw-5 py-vh-5">
            <div class="row d-flex align-items-center">
              <div class="col-12 col-lg-5 text-center text-lg-end" data-aos="zoom-in-right">
                <span class="h5 text-secondary fw-lighter">What we charge</span>
                <h2 class="display-4">You get all our knowledge for one simple price</h2>
              </div>
              <div class="col-12 col-lg-7 bg-dark rounded-5 py-vh-3 text-center my-5" data-aos="zoom-in-up">
                <h2 class="display-huge mb-5">
                  <span class="fs-4 me-2 fw-light">$</span><span class="border-bottom border-5">499</span><span
                    class="fs-6 fw-light">/day</span>
                </h2>
                <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                  ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#" class="btn btn-xl btn-light">Sign up
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

        </div> -->


            <div class="container-fluid px-vw-5 position-relative" data-aos="fade">
                <div class="position-absolute w-100 h-50 bg-black top-0 start-0"></div>
                <div class="position-relative py-vh-5 bg-cover bg-center rounded-5"
                    style="background-image: url({{ asset('/front/img/webp/abstract12.webp') }});">
                    
                    <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow">
                        <div class="row d-flex align-items-center">

                            <div class="col-6 d-flex align-items-center bg-dark shadow rounded-5 p-0"
                                data-aos="zoom-in-up">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12">
                                        <img src="{{ asset('front/img/webp/person103.webp') }}" width="684" height="457"
                                            alt="our CEO with some nice numbers" class="img-fluid rounded-5"
                                            loading="lazy">
                                    </div>
                                    <div class="col-12 col-lg-10 col-xl-8 text-center my-5">
                                        <p class="lead border-bottom pb-4 border-secondary">"Chez CumX, notre mission est
                                            de promouvoir une
                                            sexualité épanouissante et sûre. Nous sommes fiers d'offrir les préservatifs
                                            Ebony, une fusion
                                            parfaite entre plaisir et protection. Notre engagement envers l'excellence et
                                            notre passion pour
                                            le
                                            bien-être de nos clients guident chaque aspect de notre entreprise."</p>
                                        <p class="text-secondary text-center">L'équipe CumX</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 offset-1">
                                <span class="h5 text-secondary fw-lighter">Plus de </span>
                                <h2 class="display-huge fw-bolder" data-aos="zoom-in-left"> 95 % </h2>
                                <p class="h4 fw-lighter text-secondary">
                                    clients satisfaits:Ebony ,une expérience inoubliable.
                                </p>

                                <h2 class="display-huge fw-bolder border-top border-secondary pt-5 mt-5"
                                    data-aos="zoom-in-left"> 863
                                    <span class="h5 text-secondary fw-lighter">Ebony livrés</span>
                                </h2>
                                <p class="h4 fw-lighter text-secondary">
                                    Une protection fiable pour nos clients.
                                </p>
                                <h2 class="display-huge fw-bolder border-top border-secondary pt-5 mt-5"
                                    data-aos="zoom-in-left">150 %
                                    <span class="h5 text-secondary fw-lighter">des commandes </span>
                                </h2>

                                <p class="h4 fw-lighter text-secondary">
                                    Une confiance grandissante envers les préservatifs Ebony.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="bg-dark py-vh-5">
                <div class="container px-vw-5">
                    <div class="row d-flex gx-5 align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="rounded-5 bg-black p-5 shadow" data-aos="zoom-in-right">
                                <div class="fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                </div>
                                <p class="text-secondary lead">"Les préservatifs Ebony ont transformé mes expériences
                                    intimes. Les
                                    saveurs
                                    délicieuses ajoutent une nouvelle dimension de plaisir. Je me sens en sécurité et
                                    épanouie. Merci,
                                    CumX
                                    !"</p>
                                <div
                                    class="d-flex justify-content-start align-items-center border-top border-secondary pt-3">
                                    <div>
                                        <span class="h6 fw-5">Laura</span><br>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-5 bg-black p-5 shadow mt-5" data-aos="zoom-in-right">
                                <div class="fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                        <path
                                            d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                                    </svg>

                                </div>
                                <p class="text-secondary lead">"En tant que jeune adulte, je recherche une protection
                                    fiable sans
                                    compromettre le plaisir. Les préservatifs Ebony m'offrent exactement cela. Je suis
                                    impressionné par
                                    leur
                                    qualité et leurs arômes exquis."</p>
                                <div
                                    class="d-flex justify-content-start align-items-center border-top border-secondary pt-3">
                                    <div>
                                        <span class="h6 fw-5">Alex</span><br>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="p-5 pt-0" data-aos="fade">
                                <span class="h5 text-secondary fw-lighter"> Voix de satisfaction des clients</span>
                                <h2 class="display-4">Ils ont découvert le plaisir avec les préservatifs Ebony</h2>
                            </div>
                            <div class="rounded-5 bg-black p-5 shadow mt-5 gradient" data-aos="zoom-in-left">
                                <div class="fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>


                                </div>
                                <p class="lead">"J'ai essayé plusieurs marques de préservatifs, mais Ebony est de loin ma
                                    préférée. Ils
                                    allient confort, fiabilité et saveurs captivantes. Je ne pourrais plus m'en passer.
                                    Merci CumX !"</p>
                                <div class="d-flex justify-content-start align-items-center border-top pt-3">
                                    <div>
                                        <span class="h6 fw-5">Sarah</span><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </main>
@if ($posts->count() > 0)
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4>Dernières nouvelles</h4>
            <ul class="timeline">
                @foreach ($posts as $post)
                <li>
                    <img class="img-fluid" src="{{ asset('/storage/'.$post->image) }}" alt="">
                    <p>catégorie :
                        <a href="{{ route('category.detail', $post->category->slug)}}">{{ $post->category->name }}</a>
                        <span class=" float-right">{{ $post->created_at->format('d M Y') }}</span>
                    </p>
                    <p>publié par : {{ $post->user->name }}</p>
                    <p class="h5">Titre : {{ $post->title }}</p>
                    <p>{!! Str::limit($post->content, 95, '...') !!} </p>
                    <a target="" href="{{ route('post.detail', $post->slug) }}">lire plus</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endif 
@endsection


@section('script')
@endsection
