<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant de l'Hôtel Sables d'Or</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;500;600&family=Tajawal:wght@300;400;700;900&family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="page-restaurant">

  <?php include("includes/header.php"); ?>

  <!-- Hero -->
  <section class="hero hero-page" style="background-image: linear-gradient(135deg, rgba(2, 15, 31, 0.7) 0%, rgba(5, 30, 52, 0.6) 100%), url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=1600');">
    <div class="hero-content">
      <h1>La saveur du luxe authentique</h1>
      <p>Un voyage culinaire exceptionnel qui marie traditions et créativité</p>
      <div style="margin-top: 2rem;">
        <a href="#menu" class="btn btn-primary">
          Découvrez la carte
        </a>
      </div>
    </div>
  </section>

  <!-- Menu Section -->
  <section id="menu" class="pad-section">
    <div class="container">
      <div class="section-title reveal-on-scroll">
        <h2>La carte gastronomique</h2>
        <p class="muted">
          Sélection préparée avec soin par nos chefs expérimentés
        </p>
      </div>

      <div class="menu-nav reveal-on-scroll">
        <button class="menu-btn active" data-category="breakfast">
          <span>Petit-déjeuner</span>
          <span class="btn-time">07:00 - 10:30</span>
        </button>
        <button class="menu-btn" data-category="lunch">
          <span>Déjeuner</span>
          <span class="btn-time">12:30 - 15:00</span>
        </button>
        <button class="menu-btn" data-category="dinner">
          <span>Dîner</span>
          <span class="btn-time">19:00 - 22:30</span>
        </button>
        <button class="menu-btn" data-category="desserts">
          <span>Desserts</span>
          <span class="btn-time">Toute la journée</span>
        </button>
      </div>

      <div id="breakfast" class="menu-section active">
        <div class="menu-grid">
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1533089860892-a7c6f0a88666?w=600"
              alt="Buffet"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Petit-déjeuner buffet</h3>

              </div>
              <p class="dish-desc">Buffet varié : viennoiseries, fruits et fromages.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="img/Pancakes aux fruits.jpg"
              alt="Pancakes"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Pancakes aux fruits</h3>

              </div>
              <p class="dish-desc">Pancakes moelleux et sauce fruits rouges.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="img/Plateau de fromages.jpg"
              alt="Fromages"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Plateau de fromages</h3>

              </div>
              <p class="dish-desc">Sélection de fromages locaux affinés.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1494859802809-d069c3b71a8a?w=600"
              alt="Fruits"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Bol de fruits frais</h3>

              </div>
              <p class="dish-desc">Fruits de saison coupés et granola bio.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="img/Boissons et Jus.jpg"
              alt="Boissons"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Boissons et Jus</h3>

              </div>
              <p class="dish-desc">Café, Thé à la menthe ou Jus d'orange pressé.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1525351484163-7529414344d8?w=600"
              alt="Oeufs"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Omelette aux fines herbes</h3>

              </div>
              <p class="dish-desc">Œufs fermiers préparés à la minute.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?w=600"
              alt="Toast"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Toast Avocat & Œuf</h3>

              </div>
              <p class="dish-desc">Pain complet grillé et œuf poché.</p>
            </div>
          </div>
        </div>
      </div>

      <div id="lunch" class="menu-section">
        <div class="menu-grid">
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1532550907401-a500c9a57435?w=600"
              alt="Poulet"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Poulet rôti aux herbes</h3>

              </div>
              <p class="dish-desc">Accompagné de légumes sautés croquants.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?w=600"
              alt="Entrecôte"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Entrecôte Grillée</h3>

              </div>
              <p class="dish-desc">Viande premium et sauce au poivre.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1541544741938-0af808871cc0?w=600"
              alt="Couscous"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Couscous Royal</h3>

              </div>
              <p class="dish-desc">Le classique aux sept légumes et agneau.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=600"
              alt="Salade"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Salade César Saumon</h3>

              </div>
              <p class="dish-desc">Laitue, saumon fumé et copeaux de parmesan.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
             src="img/Risotto aux Crevettes.jpg"
              alt="Risotto"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Risotto aux Crevettes</h3>

              </div>
              <p class="dish-desc">Riz italien crémeux et gambas grillées.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1551183053-bf91a1d81141?w=600"
              alt="Lasagne"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Lasagne Bolognaise</h3>

              </div>
              <p class="dish-desc">Pâtes fraîches et sauce viande maison.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1559847844-5315695dadae?w=600"
              alt="Poisson"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Dorade à la Plancha</h3>

              </div>
              <p class="dish-desc">Poisson frais d'Annaba et riz citronné.</p>
            </div>
          </div>
        </div>
      </div>

<div id="dinner" class="menu-section">
        <div class="menu-grid">
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1544025162-d76694265947?w=600"
              alt="Agneau"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Jarret d'agneau braisé</h3>

              </div>
              <p class="dish-desc">Agneau fondant et riz safrané aux épices.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=600"
              alt="Saumon"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Filet de saumon grillé</h3>

              </div>
              <p class="dish-desc">Sauce aneth et purée de pommes de terre.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1550547660-d9450f859349?w=600"
              alt="Burger"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Burger Gourmet Luxe</h3>

              </div>
              <p class="dish-desc">Bœuf angus, fromage de chèvre et frites.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="img/Tajine aux Pruneaux.jpg"
              alt="Tajine"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Tajine aux Pruneaux</h3>

              </div>
              <p class="dish-desc">Mijoté de bœuf traditionnel aux amandes.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="img/Pâtes aux Truffes.jpg"
              alt="Pasta"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Pâtes aux Truffes</h3>

              </div>
              <p class="dish-desc">Crème de truffe et parmesan 24 mois.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1543339308-43e59d6b73a6?w=600"
              alt="Soupe"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Chorba Frik Authentique</h3>

              </div>
              <p class="dish-desc">Soupe algérienne riche et parfumée.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="img/Mix Grill Sables d'Or.jpg"
              alt="Grillade"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Mix Grill Sables d'Or</h3>

              </div>
              <p class="dish-desc">Assortiment de viandes à la braise.</p>
            </div>
          </div>
        </div>
      </div>

<div id="desserts" class="menu-section">
        <div class="menu-grid">
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600"
              alt="Fondant"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Fondant au Chocolat</h3>

              </div>
              <p class="dish-desc">Cœur coulant et glace vanille.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1512152272829-e3139592d56f?w=600"
              alt="Tiramisu"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Tiramisu Maison</h3>

              </div>
              <p class="dish-desc">Recette italienne authentique.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="img/Cheesecake Framboise.jpg"
              alt="Cheesecake"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Cheesecake Framboise</h3>

              </div>
              <p class="dish-desc">Base biscuitée et coulis frais.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1551024709-8f23befc6f87?w=600"
              alt="Crème brûlée"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Crème Brûlée Vanille</h3>

              </div>
              <p class="dish-desc">Cassonade craquante caramélisée.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1587314168485-3236d6710814?w=600"
              alt="Baklawa"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Baklawa aux Amandes</h3>

              </div>
              <p class="dish-desc">Feuilleté traditionnel au miel.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1488477181946-6428a0291777?w=600"
              alt="Panna Cotta"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Panna Cotta Exotique</h3>

              </div>
              <p class="dish-desc">Coulis mangue et passion.</p>
            </div>
          </div>
          <div class="dish-card">
            <img
              src="https://images.unsplash.com/photo-1541783245831-57d6fb0926d3?w=600"
              alt="Mousse"
              class="dish-img"
            />
            <div class="dish-content">
              <div class="dish-header">
                <h3 class="dish-title">Mousse au Chocolat</h3>

              </div>
              <p class="dish-desc">Chocolat noir 70% aérien.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Page CTA -->
      <div class="reveal-on-scroll" style="text-align: center; margin-top: 80px; padding-top: 60px; border-top: 2px solid rgba(212, 175, 55, 0.2);">
        <p class="muted" style="margin-bottom: 25px; font-size: 1.1rem;">Envie de vivre cette expérience ?</p>
        <a href="reservation.php" class="btn btn-primary">
          Réserver maintenant
        </a>
      </div>
    </div>
  </section>

  <?php include("includes/footer.php"); ?>

  <script src="js/main.js"></script>
</body>
</html>
