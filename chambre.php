<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nos Chambres | Hôtel Sables d'Or</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <!-- Header -->
  <?php include("includes/header.php"); ?>

    <section
      class="hero hero-page"
      style="
        background-image: url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=1600');
      "
    >
      <div class="hero-content reveal-on-scroll">
        <h1>L'Élégance Absolue</h1>
        <p>
          Découvrez nos suites de luxe et chambres raffinées conçues pour votre
          confort ultime.
        </p>
        <div style="margin-top: 30px">
          <a class="btn btn-primary" href="#selection">Choisir votre chambre</a>
        </div>
      </div>
    </section>

    <section id="selection" class="pad-section">
      <div class="container">
        <div class="section-title reveal-on-scroll">
          <h2>Nos Chambres & Suites</h2>
          <p class="muted">
            Une collection exclusive d'hébergements alliant design moderne et
            hospitalité traditionnelle.
          </p>
        </div>

        <div class="rooms-grid">
          <article class="room reveal-on-scroll">
            <img
              src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=600"
              alt="Suite Présidentielle"
            />
            <div class="room-body">
              <h3 class="room-title">Suite Présidentielle</h3>
              <p class="room-desc">
                Le summum du luxe avec vue panoramique, salon privé et services
                de conciergerie dédiés.
              </p>
              <div class="room-footer">
                <div class="price">4000 DZD / nuit</div>
                <a class="btn btn-outline btn-sm" href="reservation.php?room=Suite+Présidentielle"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll reveal-delay-1">
            <img
              src="https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600"
              alt="Suite Lune de Miel"
            />
            <div class="room-body">
              <h3 class="room-title">Suite Lune de Miel</h3>
              <p class="room-desc">
                Un cadre idyllique et romantique pour des moments inoubliables à
                deux.
              </p>
              <div class="room-footer">
                <div class="price">45000 DZD / nuit</div>
                <a class="btn btn-outline btn-sm" href="reservation.php?room=Suite+Lune+de+Miel"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll reveal-delay-2">
            <img
              src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=600"
              alt="Chambre Deluxe Vue Mer"
            />
            <div class="room-body">
              <h3 class="room-title">Chambre Deluxe Vue Mer</h3>
              <p class="room-desc">
                Élégance moderne avec balcon privé surplombant l'océan pour une
                évasion totale.
              </p>
              <div class="room-footer">
                <div class="price">60000 DZD / nuit</div>
                <a
                  class="btn btn-outline btn-sm"
                  href="reservation.php?room=Chambre+Deluxe+Vue+Mer"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll">
            <img
              src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061?w=600"
              alt="Suite Junior Exécutive"
            />
            <div class="room-body">
              <h3 class="room-title">Suite Junior Exécutive</h3>
              <p class="room-desc">
                Espace de travail raffiné et confort absolu, parfait pour les
                professionnels.
              </p>
              <div class="room-footer">
                <div class="price">45000 DZD / nuit</div>
                <a
                  class="btn btn-outline btn-sm"
                  href="reservation.php?room=Suite+Junior+Exécutive"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll reveal-delay-1">
            <img
              src="https://images.unsplash.com/photo-1560624052-449f5ddf0c31?w=600"
              alt="Villa Royale Jardin"
            />
            <div class="room-body">
              <h3 class="room-title">Villa Royale Jardin</h3>
              <p class="room-desc">
                Une villa privée entourée de jardins luxuriants, offrant calme
                et sérénité.
              </p>
              <div class="room-footer">
                <div class="price">50000 DZD / nuit</div>
                <a class="btn btn-outline btn-sm" href="reservation.php?room=Villa+Royale+Jardin"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll reveal-delay-2">
            <img
              src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600"
              alt="Chambre Classique Chic"
            />
            <div class="room-body">
              <h3 class="room-title">Chambre Classique Chic</h3>
              <p class="room-desc">
                Le parfait équilibre entre simplicité et raffinement hôtelier de
                haut standing.
              </p>
              <div class="room-footer">
                <div class="price">55 000 DZD / nuit</div>
                <a
                  class="btn btn-outline btn-sm"
                  href="reservation.php?room=Chambre+Classique+Chic"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll">
            <img
              src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=600"
              alt="Chambre Familiale Premium"
            />
            <div class="room-body">
              <h3 class="room-title">Chambre Familiale Premium</h3>
              <p class="room-desc">
                Un espace spacieux conçu pour accueillir toute la famille avec
                confort et intimité.
              </p>
              <div class="room-footer">
                <div class="price">100000 DZD / nuit</div>
                <a
                  class="btn btn-outline btn-sm"
                  href="reservation.php?room=Chambre+Familiale+Premium"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll reveal-delay-1">
            <img
              src="img/Suite Ambassadeur.jpg"
              alt="Suite Ambassadeur"
            />
            <div class="room-body">
              <h3 class="room-title">Suite Ambassadeur</h3>
              <p class="room-desc">
                Luxe discret et élégance intemporelle pour un séjour d'exception
                au cœur d'Annaba.
              </p>
              <div class="room-footer">
                <div class="price">40000 DZD / nuit</div>
                <a class="btn btn-outline btn-sm" href="reservation.php?room=Suite+Ambassadeur"
                  >Réserver</a
                >
              </div>
            </div>
          </article>

          <article class="room reveal-on-scroll reveal-delay-2">
            <img
              src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=600"
              alt="Studio Panoramique"
            />
            <div class="room-body">
              <h3 class="room-title">Studio Panoramique</h3>
              <p class="room-desc">
                Design minimaliste avec une vue imprenable sur la plage Chapuis
                et la ville.
              </p>
              <div class="room-footer">
                <div class="price"> 55000 DZD / nuit</div>
                <a class="btn btn-outline btn-sm" href="reservation.php?room=Studio+Panoramique"
                  >Réserver</a
                >
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
<?php include("includes/footer.php"); ?>

    <script src="js/main.js"></script>
  </body>
</html>
