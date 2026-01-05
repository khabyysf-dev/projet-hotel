<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Réservation - Hôtel Sables d'Or</title>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="page-reservation">
  <?php include("includes/header.php"); ?>

    <div
      class="hero hero-page"
      style="
        background-image: url('img/reisetopia-Vl5DAQxNBbM-unsplash.jpg');
      "
    >
      <div class="hero-content reveal-on-scroll">
        <h1>Confirmez votre réservation</h1>
        <p>Une étape de plus vers le séjour de vos rêves</p>
      </div>
    </div>

    <!-- Wrap content in a form for validation handling in main.js -->
    <form id="booking-form" class="booking-container fade-in" action="process_booking.php" method="POST">
      <input type="hidden" name="total_price" id="input-total-price">
      <input type="hidden" name="services_list" id="input-services-list">
      <input type="hidden" name="room_count" id="input-room-count" value="1">
      <input type="hidden" name="guests" id="input-guests" value="2">
      <input type="hidden" name="room_type" id="input-room-type">
      <!-- Right Column: Details -->
      <div class="details-column">
        <!-- Step 1: Dates & Guests -->
        <div class="section-card reveal-on-scroll">
          <div class="summary-header">
            <h3><i class="far fa-calendar-alt"></i> Détails de la réservation</h3>
          </div>
          <div class="search-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="input-group">
              <label>Date d'arrivée</label>
              <input type="date" name="checkin" class="custom-input" id="checkin" required />
            </div>
            <div class="input-group">
              <label>Date de départ</label>
              <input type="date" name="checkout" class="custom-input" id="checkout" required />
            </div>
            <div class="input-group">
              <label>Invités</label>
              <div class="guest-control" style="display: flex; gap: 10px; align-items: center;">
                <button type="button" class="btn btn-outline btn-sm" onclick="updateGuests(-1)">
                  <i class="fas fa-minus"></i>
                </button>
                <span class="guest-count" id="guest-display" style="font-weight: 700; font-size: 1.1rem; width: 30px; text-align: center;">2</span>
                <button type="button" class="btn btn-outline btn-sm" onclick="updateGuests(1)">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
            
            <div class="input-group">
                <label>Chambres</label>
                <div class="guest-control" style="display: flex; gap: 10px; align-items: center;">
                  <button type="button" class="btn btn-outline btn-sm" id="btn-room-dec">
                    <i class="fas fa-minus"></i>
                  </button>
                  <span class="guest-count" id="room-count-display" style="font-weight: 700; font-size: 1.1rem; width: 30px; text-align: center;">1</span>
                  <button type="button" class="btn btn-outline btn-sm" id="btn-room-inc">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
            </div>
          </div>
        </div>

        <!-- Step 3: Services -->
        <div class="section-card reveal-on-scroll reveal-delay-1">
          <div class="summary-header">
            <h3><i class="fas fa-concierge-bell"></i> Services supplémentaires</h3>
          </div>

          <div class="service-item" onclick="toggleService(this, 1000)">
            <div class="service-checkbox"><i class="fas fa-check"></i></div>
            <div class="service-info">
              <span class="service-name">Transfert depuis l'aéroport</span>
              <span class="service-cost">Voiture privée de luxe</span>
            </div>
            <div class="service-price">1000 DZD</div>
          </div>

          <div class="service-item" onclick="toggleService(this, 5000)">
            <div class="service-checkbox"><i class="fas fa-check"></i></div>
            <div class="service-info">
              <span class="service-name">Forfait lune de miel</span>
              <span class="service-cost"
                >Fleurs, gâteau et dîner romantique</span
              >
            </div>
            <div class="service-price">5000 DZD</div>
          </div>

          <div class="service-item" onclick="toggleService(this, 1500)">
            <div class="service-checkbox"><i class="fas fa-check"></i></div>
            <div class="service-info">
              <span class="service-name">Petit-déjeuner en chambre</span>
              <span class="service-cost">Service quotidien</span>
            </div>
            <div class="service-price">1500 DZD</div>
          </div>
        </div>
      </div>

      <!-- Left Column: Summary (Sticky) -->
      <div class="summary-column summary-sticky">
        <div class="booking-summary reveal-on-scroll">
          <div class="summary-header">
            <h3>Résumé de la réservation</h3>
          </div>
          <div class="summary-body">
            <div class="summary-row">
              <span>Arrivée :</span>
              <span id="sum-checkin">--/--/----</span>
            </div>
            <div class="summary-row">
              <span>Départ :</span>
              <span id="sum-checkout">--/--/----</span>
            </div>
            <div class="summary-row">
              <span>Invités :</span>
              <span id="sum-guests">2 personnes</span>
            </div>
            <div class="summary-row">
              <span>Chambres :</span>
              <span id="sum-room-count">1 chambre</span>
            </div>
             <div class="summary-row" style="display: none"> <!-- Hidden room selection name if needed, or keep logic -->
              <span>Type :</span>
              <span id="sum-room">--</span>
            </div>
            <div class="summary-row">
              <span>Services :</span>
              <span id="sum-services">0 DZD</span>
            </div>

            <div class="total-row">
              <span class="total-label">Total</span>
              <span class="total-amount" id="sum-total">0 DZD</span>
            </div>

            <button type="submit" class="btn-confirm">
              Confirmer la réservation
              <i class="fas fa-arrow-right" style="margin-left: 10px"></i>
            </button>
            <p
              style="
                text-align: center;
                font-size: 0.8rem;
                color: rgba(255,255,255,0.6);
                margin-top: 15px;
              "
            >
              Aucun montant ne sera prélevé aujourd'hui
            </p>
          </div>
        </div>
      </div>
    </form>

    <?php include("includes/footer.php"); ?>

    <!-- Script -->
    <script src="js/main.js"></script>
  </body>
</html>
