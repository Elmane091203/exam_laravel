<x-app-layout>
    <div class="hero_area" style="background-repeat: no-repeat;background-size: cover; background-image: linear-gradient( rgba(255, 255, 0, 0.5),rgba(0, 0, 255, 0.5)),url({{asset('images/image.jpg')}});">
        <section class=" slider_section position-relative" style="height: auto;">
            <div class="box">
                <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Bienvenue chez Faster,
                                    </h1>
                                    <p class="col-lg-11 px-0">
                                        Le vtc local qui vous accompagne en toute sécurité
                                        dans tous vos trajets.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('images/slider-img.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>

    <!-- comment ça marche section -->

    <section class="why_section layout_padding-bottom pt-2">
        <div class="container">
            <div class="heading_container heading_center">
                <h2><span class="h2 underline"> Comment ça marche?</span></h2>
            </div>
            <div class="why_container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="images/w1.png" alt="" class="" />
                            </div>
                            <div class="detail-box">
                                <p>
                                    Activez l’application Faster.
                                    Saisissez votre destination
                                    via géolocalisation puis
                                    validez le montant estimé
                                    de votre trajet.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="images/w2.png" alt="" class="" />
                            </div>
                            <div class="mb-4 detail-box">
                                <p>
                                    Votre chauffeur Faster,
                                    vous récupère et vous
                                    dépose en toute sécurité à
                                    la destination indiquée.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="images/w3.png" alt="" class="" />
                            </div>
                            <div class="mb-5 detail-box">
                                <p>
                                    Recevez votre facture et
                                    noter votre trajet ainsi que
                                    votre chauffeur.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end why section -->

    <!-- A propos section -->

    <section style="background-color: #1b1f71;" class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white">
                    <div class="detail-box">
                        <div class="heading_container mb-5">
                            <h2>
                                <span class="h2">
                                    A propos de Faster.
                                </span>
                            </h2>
                        </div>
                        <div class="heading_container">
                            <h3>
                                Le meilleur choix de transport
                                pour une agréable journée.
                            </h3>
                        </div>
                        <p>
                            Faster est le service VTC à la demande qui
                            vous accompagnera en toute sécurité dans
                            tous vos déplacements.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->



</x-app-layout>
