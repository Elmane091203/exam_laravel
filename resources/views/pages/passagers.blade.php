<x-app-layout>
    <div class="hero_area"
        style="background-repeat: no-repeat;background-size: cover; background-image: linear-gradient( rgba(255, 255, 0, 0.5),rgba(0, 0, 255, 0.5)),url({{ asset('images/b.jpg') }});">
        <section class=" slider_section position-relative" style="height: auto;">
            <div class="box">
                <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="mb-6">PASSAGERS</h1>
                                <div class="detail-box">
                                    <h1 class="h2 text-warning">
                                        FASTER prend soin de ses passagers
                                    </h1>
                                    <p class="col-lg-11 px-0">
                                        <span class="h3">
                                            Faster est le service VTC à la demande qui
                                            vous accompagnera en toute sécurité dans
                                            tous vos déplacements locaux.
                                        </span>
                                    </p>
                                </div>
                                <button class="mt-5 btn btn-warning">
                                    <span class="h3">
                                        <span>
                                            Inscription
                                        </span>
                                    </span>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="why_section layout_padding-bottom pt-2">
        <div class="container">
            <div class="heading_container heading_center">
                <h2><span class="h2 underline"> Comment ça marche?</span></h2>
            </div>
            <div class="why_container">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="box">
                            <div class="img-box">
                                <img src="images/tel.png" alt="" class="" />
                            </div>
                            <div class="detail-box pb-4">
                                <p>
                                    Activez l’application Faster,
                                    saisissez votre destination
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
                                <img src="images/v.jpg" alt="" class="" />
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
                                    Vous recevez votre facture et pourrez
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

</x-app-layout>
