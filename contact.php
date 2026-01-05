<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - Hôtel Sables d'Or</title>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
   <?php include("includes/header.php"); ?>

    <!-- Hero -->
    <section class="hero hero-page" style="background-image: url('img/contact\ us.jpg');">
      <div class="hero-content reveal-on-scroll">
        <h1>Contactez-nous</h1>
        <p>
          Une question ? Une demande particulière ? Notre équipe conciergerie est à votre entière disposition.
        </p>
      </div>
    </section>

    <!-- Contact Content -->
    <section class="pad-section">
      <div class="container">
        <div class="contact-grid">
          <!-- Information Column -->
          <div class="contact-info-card reveal-on-scroll">
            <h2 style="font-size: 2rem; margin-bottom: 2rem; color: var(--brand-dark);">Nos Coordonnées</h2>
            <div style="width: 60px; height: 3px; background: var(--brand-accent); margin-bottom: 40px;"></div>
            
            <div class="contact-item">
              <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
              <div class="contact-text">
                <h4>Téléphone</h4>
                <p class="muted">Disponible 24h/7j pour vos réservations</p>
                <a href="tel:+213775593671" style="font-weight: 700; color: var(--brand-accent);">+213 775 593 671</a>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon"><i class="fas fa-envelope-open-text"></i></div>
              <div class="contact-text">
                <h4>Email</h4>
                <p class="muted">Pour toute information générale</p>
                <a href="mailto:aymenyah269@gmail.com" style="font-weight: 700;">aymenyah269@gmail.com</a>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon"><i class="fas fa-map-marked-alt"></i></div>
              <div class="contact-text">
                <h4>Adresse</h4>
                <p class="muted">Plage Chapuis, Annaba, Algérie</p>
                <p class="muted" style="font-size: 0.9rem; margin-top: 5px;">Au cœur de la zone touristique</p>
              </div>
            </div>

            <div class="map-container">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102080.76882001024!2d7.744464949999999!3d36.91368995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f007f6f897f897%3A0xadf4db4c9a930977!2sPLAGE%20CHAPUIS!5e0!3m2!1sfr!2sdz!4v1766572589233!5m2!1sfr!2sdz"
                width="100%"
                height="100%"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>

          <!-- Form Column -->
          <div class="contact-form-card reveal-on-scroll">
            <h2 style="font-size: 2rem; margin-bottom: 1rem; color: var(--brand-dark);">Envoyez-nous un message</h2>
            <p class="muted" style="margin-bottom: 40px;">Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
            
            <form id="contact-form">
              <div class="input-group" style="margin-bottom: 20px;">
                <label>Nom complet</label>
                <input type="text" class="custom-input" placeholder="Ex: Jean Dupont" required>
              </div>
              <div class="input-group" style="margin-bottom: 20px;">
                <label>Email</label>
                <input type="email" class="custom-input" placeholder="Ex: jean@exemple.com" required>
              </div>
              <div class="input-group" style="margin-bottom: 20px;">
                <label>Sujet</label>
                <input type="text" class="custom-input" placeholder="Ex: Demande de réservation pour un groupe">
              </div>
              <div class="input-group" style="margin-bottom: 30px;">
                <label>Message</label>
                <textarea class="custom-input" rows="5" placeholder="Votre message..." required></textarea>
              </div>
              <button type="submit" class="btn-confirm" style="margin-top: 0;">Envoyer le message</button>
            </form>
          </div>
        </div>
      </div>
    </section>

 <?php include("includes/footer.php"); ?>
    <script src="js/main.js"></script>
  </body>
</html>
