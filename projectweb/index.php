<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/style.css" />
  <link rel="stylesheet" href="./assets/queries.css" />
  <title>HomePage</title>
</head>

<body>
  <header class="header">
    <a href="#">
      <img class="logo" alt="Site logo" src="./assets/img/logo.jpg" />
    </a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a class="main-nav-link" href="#">Acceuil</a></li>

        <li>
          <a class="main-nav-link" href="./influenceur/register.php">Influenceur</a>
        </li>
        <li>
          <a class="main-nav-link" href="./brand/brand-register.php">Marque</a>
        </li>
        <li>
          <a class="main-nav-link" href="./admin/register-admin.php">Admin</a>
        </li>
        <li><a class="main-nav-link nav-cta" href="#cta">Contacter-nous</a></li>
      </ul>
    </nav>

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
  </header>

  <main>
    <section class="section-hero">
      <div class="hero">
        <div class="hero-text-box">
          <h1 class="heading-primary">
            Influenceurs et marques exchange plateforme!
          </h1>
          <p class="hero-description">
            Explorez la #1 plate-forme logicielle de marketing d'influence pour créer une relation authentique et
            directe avec les influenceurs.notre plateforme est votre chemin magique pour trouver votre meilleur
            partenaire!
          </p>
          <a href="#how" class="btn btn--full margin-right-sm">Influenceur</a>
          <a href="#inf" class="btn btn--full margin-right-sm">Marque</a>
        </div>
        <div class="hero-img-box">
          <img src="./assets/img/imgh.jpg" class="hero-img" alt="" />
        </div>
      </div>
    </section>
    <section class="section-how" id="how">
      <div class="container">
        <span class="subheading">Comment ca marche?</span>
      </div>

      <div class="container grid grid--2-cols grid--center-v">
        <div class="step-text-box">
          <p class="step-number">01</p>
          <h3 class="heading-tertiary">Influenceur</h3>
          <p class="step-description">
            CETTE PLATEFORME EST FAITE POUR VOUS OUI POUR ATTEINDRE VOTRE PARTENAIRE DE MARQUE ET FAIRE DU SUCCÈS A
            VOTRE ENTREPRISE
          </p>
        </div>

        <div class="step-img-box">
          <img src="./assets/img/app/imgi.jpg" class="step-img" alt="" />
        </div>

        <div class="step-img-box">
          <img src="./assets/img/app/imgii.jpg" class="step-img1" alt="" />
        </div>
        <div class="step-text-box" id="inf">
          <p class="step-number">02</p>
          <h3 class="heading-tertiary">Marques</h3>
          <p class="step-description">
            VVous pouvez utiliser notre plateforme pour découvrir des influenceurs, tout comme vous pouvez utiliser
            d'autres plateformes de marketing d'influence, vous pouvez également l'utiliser pour examiner vos clients
            existants afin de trouver ceux qui ont suffisamment d'influence en ligne pour faire de dignes défenseurs de
            la marque. Vous pouvez également ajouter vos employés au mélange si vous le souhaitez.
          </p>
        </div>
      </div>
    </section>

    <section class="section-cta" id="cta">
      <div class="container">
        <div class="cta">
          <div class="cta-text-box">
            <h2 class="heading-secondary">Contactez-Nous!</h2>
            <p class="cta-text">N'hésitez pas à nous contacter pour nous faire part de vos impressions sur nos services.
              Nous ferons tout ce qui est en notre pouvoir pour que vous soyez toujours satisfaits de nos services.
            </p>

            <form name="sign-up" netlify>
              <div class="cta-form">
                <div>
                  <label for="full-name">Nom Complet</label>
                  <input id="full-name" type="text" placeholder="Amine Abkadri" name="full-name" required />
                </div>

                <div>
                  <label for="email">Email address</label>
                  <input id="email" type="email" placeholder="Amine@example.com" name="email" required />
                </div>
              </div>
              <div class="cta-form1">
                <label for="full-name">Object</label>
                <input id="full-name" type="text" placeholder="object" name="full-name" required />
              </div>
              <div class="cta-form2">
                <label for="full-name">Message</label>
                <input id="full-name" type="text" placeholder="Message" name="full-name" required />
              </div>

              <button class="btn btn--form">Envoyer</button>
            </form>
          </div>
          <div id="skewed" class="cta-img-box" role="img" aria-label=""></div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container grid grid--footer">
      <div class="logo-col">
        <a href="#" class="footer-logo">
          <img class="logo" alt=" logo" src="./assets/img/logo.jpg" />
        </a>

        <ul class="social-links">
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
            </a>
          </li>
        </ul>

        <p class="copyright">
          Copyright &copy; <span class="year">2022</span> Site Officiel Company,
        </p>
      </div>

      <div class="address-col">
        <p class="footer-heading">Contacter-nous</p>
        <address class="contacts">
          <p class="address">Rue 17 N 13 Oulfa, Casablanca</p>
          <p>
            <a class="footer-link" href="tel:0637915184">0637915184</a><br />
            <a class="footer-link" href="mailto:Amine@Comapny.com">company@gmail.com</a>
          </p>
        </address>
      </div>

      <nav class="nav-col">
        <p class="footer-heading">Comptes</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Creer Un Compte</a></li>
          <li><a class="footer-link" href="#">Se Connecter</a></li>
        </ul>
      </nav>

      <nav class="nav-col">
        <p class="footer-heading">Company</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">A propos de company</a></li>
          <li><a class="footer-link" href="#">Marques</a></li>
          <li><a class="footer-link" href="#">Influencers</a></li>
          <li><a class="footer-link" href="#">Partenariat</a></li>
        </ul>
      </nav>

      <nav class="nav-col">
        <p class="footer-heading">Parametres</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Aide</a></li>
          <li><a class="footer-link" href="#">Privacy & terms</a></li>
        </ul>
      </nav>
    </div>
  </footer>
</body>

</html>