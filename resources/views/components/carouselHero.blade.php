<section class="awtad-hero">

  <!-- Animated Water Background -->
  <div class="water-bg">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>

  <!-- Glow Effects -->
  <div class="hero-glow glow-1"></div>
  <div class="hero-glow glow-2"></div>

  <div class="container">

    <div class="row align-items-center gy-5">

      <!-- Content -->
      <div class="col-lg-6 order-2 order-lg-1">

        <div class="hero-content">

          <div class="hero-badge">
            <span class="pulse-dot"></span>
            <span>متخصصون في الأدوات الصحية والسباكة</span>
          </div>

          <h1>
            كل ما تحتاجه
            <span>لسباكتك</span>
            في مكان واحد
          </h1>

          <p class="hero-description">
            اكتشف تشكيلة مميزة من الأدوات الصحية ومستلزمات السباكة
            بجودة عالية وأسعار تنافسية تناسب احتياجات منزلك ومشروعك.
          </p>

          <div class="hero-buttons">

            <a href="{{ route('services.index') }}" class="hero-btn primary-btn">
              <i class="bi bi-cart3"></i>
              تصفح المنتجات
            </a>

            <a href="https://wa.me/201111402160"
               target="_blank"
               class="hero-btn whatsapp-btn">
              <i class="bi bi-whatsapp"></i>
              تواصل معنا
            </a>

          </div>

          <div class="hero-features">

            <div class="hero-feature">
              <i class="bi bi-patch-check-fill"></i>
              <span>جودة مضمونة</span>
            </div>

            <div class="hero-feature">
              <i class="bi bi-tags-fill"></i>
              <span>أفضل الأسعار</span>
            </div>

            <div class="hero-feature">
              <i class="bi bi-truck"></i>
              <span>توصيل سريع</span>
            </div>

          </div>

        </div>

      </div>


      <!-- Animated Plumbing Scene -->
      <div class="col-lg-6 order-1 order-lg-2">

        <div class="plumbing-scene">

          <!-- Orbit -->
          <div class="orbit orbit-one"></div>
          <div class="orbit orbit-two"></div>

          <!-- Main Faucet -->
          <div class="faucet">

            <div class="faucet-top"></div>

            <div class="faucet-body">

              <div class="faucet-highlight"></div>

            </div>

            <div class="faucet-neck"></div>

            <div class="faucet-head">
              <div class="head-light"></div>
            </div>

            <div class="faucet-water">

              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>

            </div>

          </div>


          <!-- Sink -->
          <div class="sink">

            <div class="sink-rim"></div>

            <div class="sink-bowl">

              <div class="sink-reflection"></div>

              <div class="drain"></div>

            </div>

          </div>


          <!-- Pipes -->
          <div class="pipe pipe-one"></div>
          <div class="pipe pipe-two"></div>
          <div class="pipe pipe-three"></div>


          <!-- Floating Plumbing Icons -->

          <div class="floating-tool tool-one">
            <i class="bi bi-droplet-fill"></i>
          </div>

          <div class="floating-tool tool-two">
            <i class="bi bi-wrench-adjustable"></i>
          </div>

          <div class="floating-tool tool-three">
            <i class="bi bi-moisture"></i>
          </div>

          <div class="floating-tool tool-four">
            <i class="bi bi-water"></i>
          </div>


          <!-- Water Drops -->
          <div class="water-drop drop-one"></div>
          <div class="water-drop drop-two"></div>
          <div class="water-drop drop-three"></div>
          <div class="water-drop drop-four"></div>


          <!-- Logo Card -->
          <div class="hero-logo-card">

            <div class="logo-circle">
              <i class="bi bi-droplet-fill"></i>
            </div>

            <div>
              <strong>أوتاد مصر</strong>
              <small>للأدوات الصحية والسباكة</small>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Bottom Scroll -->
  <div class="hero-scroll">
    <span>اكتشف منتجاتنا</span>
    <i class="bi bi-chevron-down"></i>
  </div>

</section>


<style>

.awtad-hero {
  position: relative;
  min-height: 720px;
  overflow: hidden;
  background:
    radial-gradient(circle at 75% 45%, rgba(0, 140, 255, .18), transparent 32%),
    radial-gradient(circle at 15% 80%, rgba(0, 90, 200, .15), transparent 35%),
    linear-gradient(135deg, #031426 0%, #061f3d 45%, #020c19 100%);
  display: flex;
  align-items: center;
  direction: rtl;
  color: #fff;
}


/* ================================
   Background
================================ */

.awtad-hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
  background-size: 55px 55px;
  mask-image: linear-gradient(to bottom, transparent, black, transparent);
}


.hero-glow {
  position: absolute;
  width: 500px;
  height: 500px;
  border-radius: 50%;
  filter: blur(100px);
  pointer-events: none;
}

.glow-1 {
  background: rgba(0, 145, 255, .15);
  top: -180px;
  right: 20%;
}

.glow-2 {
  background: rgba(0, 80, 255, .12);
  bottom: -220px;
  left: 10%;
}


/* ================================
   Content
================================ */

.hero-content {
  position: relative;
  z-index: 10;
  padding: 40px 0;
}

.hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 10px 18px;
  border: 1px solid rgba(0, 170, 255, .3);
  background: rgba(0, 130, 255, .08);
  border-radius: 50px;
  color: #9bdcff;
  font-size: 14px;
  margin-bottom: 25px;
  backdrop-filter: blur(10px);
}

.pulse-dot {
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: #00b7ff;
  box-shadow: 0 0 15px #00b7ff;
  animation: pulseDot 1.5s infinite;
}

@keyframes pulseDot {
  0%,100% {
    transform: scale(1);
    opacity: 1;
  }

  50% {
    transform: scale(1.5);
    opacity: .5;
  }
}


.hero-content h1 {
  font-size: clamp(42px, 5vw, 72px);
  line-height: 1.15;
  font-weight: 900;
  margin: 0 0 25px;
  letter-spacing: -2px;
}

.hero-content h1 span {
  display: block;
  color: #16aaff;
  text-shadow:
    0 0 25px rgba(0, 160, 255, .35),
    0 0 60px rgba(0, 120, 255, .2);
}


.hero-description {
  max-width: 620px;
  color: rgba(255,255,255,.72);
  font-size: 18px;
  line-height: 2;
  margin-bottom: 30px;
}


/* ================================
   Buttons
================================ */

.hero-buttons {
  display: flex;
  gap: 14px;
  flex-wrap: wrap;
}

.hero-btn {
  min-width: 175px;
  padding: 15px 25px;
  border-radius: 14px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  text-decoration: none;
  font-weight: 700;
  transition: .35s ease;
}

.primary-btn {
  background: linear-gradient(135deg, #008cff, #005bea);
  color: #fff;
  box-shadow: 0 12px 35px rgba(0, 105, 255, .3);
}

.primary-btn:hover {
  transform: translateY(-4px);
  color: #fff;
  box-shadow: 0 18px 45px rgba(0, 140, 255, .45);
}

.whatsapp-btn {
  background: rgba(255,255,255,.07);
  border: 1px solid rgba(255,255,255,.15);
  color: #fff;
  backdrop-filter: blur(10px);
}

.whatsapp-btn:hover {
  transform: translateY(-4px);
  color: #fff;
  background: rgba(255,255,255,.12);
}


/* ================================
   Features
================================ */

.hero-features {
  display: flex;
  flex-wrap: wrap;
  gap: 25px;
  margin-top: 35px;
}

.hero-feature {
  display: flex;
  align-items: center;
  gap: 9px;
  color: rgba(255,255,255,.7);
  font-size: 14px;
}

.hero-feature i {
  color: #16aaff;
  font-size: 18px;
}


/* ================================
   Plumbing Scene
================================ */

.plumbing-scene {
  position: relative;
  height: 620px;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}


/* ================================
   Orbit
================================ */

.orbit {
  position: absolute;
  border: 1px solid rgba(0, 160, 255, .12);
  border-radius: 50%;
  animation: rotateOrbit 18s linear infinite;
}

.orbit-one {
  width: 570px;
  height: 570px;
}

.orbit-two {
  width: 440px;
  height: 440px;
  animation-duration: 13s;
  animation-direction: reverse;
}

@keyframes rotateOrbit {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}


/* ================================
   Faucet
================================ */

.faucet {
  position: absolute;
  width: 230px;
  height: 330px;
  top: 90px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 5;
}


.faucet-body {
  position: absolute;
  width: 110px;
  height: 190px;
  right: 55px;
  top: 65px;
  border-radius: 60px 60px 30px 30px;
  background:
    linear-gradient(
      90deg,
      #526475 0%,
      #e7f7ff 18%,
      #ffffff 35%,
      #7d95a8 52%,
      #dff5ff 72%,
      #435465 100%
    );
  box-shadow:
    inset 0 0 25px rgba(255,255,255,.4),
    0 25px 70px rgba(0,0,0,.4),
    0 0 35px rgba(0,160,255,.15);
}


.faucet-highlight {
  position: absolute;
  width: 12px;
  height: 130px;
  background: rgba(255,255,255,.8);
  border-radius: 20px;
  top: 25px;
  left: 22px;
  filter: blur(2px);
}


.faucet-neck {
  position: absolute;
  width: 150px;
  height: 115px;
  right: 15px;
  top: 20px;
  border: 28px solid #d9f3ff;
  border-left-color: #7e96a9;
  border-bottom-color: transparent;
  border-radius: 90px 90px 0 0;
  transform: rotate(-4deg);
  filter: drop-shadow(0 15px 20px rgba(0,0,0,.35));
}


.faucet-head {
  position: absolute;
  width: 75px;
  height: 28px;
  right: 0;
  top: 82px;
  border-radius: 8px;
  background: linear-gradient(180deg,#f7fdff,#7e9caf);
  box-shadow: 0 10px 20px rgba(0,0,0,.3);
}


.head-light {
  position: absolute;
  width: 30px;
  height: 5px;
  border-radius: 10px;
  background: #fff;
  left: 15px;
  top: 7px;
  box-shadow: 0 0 10px #fff;
}


/* ================================
   Water
================================ */

.faucet-water {
  position: absolute;
  right: 22px;
  top: 105px;
  width: 35px;
  height: 260px;
  overflow: visible;
}


.faucet-water span {
  position: absolute;
  width: 7px;
  height: 32px;
  border-radius: 50%;
  background: linear-gradient(#baf0ff,#008cff);
  box-shadow: 0 0 12px rgba(0,170,255,.8);
  animation: waterFall 1.1s infinite ease-in;
}


.faucet-water span:nth-child(1) {
  left: 0;
  animation-delay: 0s;
}

.faucet-water span:nth-child(2) {
  left: 7px;
  animation-delay: .15s;
}

.faucet-water span:nth-child(3) {
  left: 14px;
  animation-delay: .3s;
}

.faucet-water span:nth-child(4) {
  left: 21px;
  animation-delay: .45s;
}

.faucet-water span:nth-child(5) {
  left: 28px;
  animation-delay: .6s;
}

.faucet-water span:nth-child(6) {
  left: 35px;
  animation-delay: .75s;
}


@keyframes waterFall {
  0% {
    transform: translateY(0) scale(.8);
    opacity: 0;
  }

  15% {
    opacity: 1;
  }

  100% {
    transform: translateY(190px) scale(.5);
    opacity: 0;
  }
}


/* ================================
   Sink
================================ */

.sink {
  position: absolute;
  width: 390px;
  height: 145px;
  bottom: 95px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 4;
}


.sink-rim {
  position: absolute;
  width: 100%;
  height: 75px;
  top: 0;
  border-radius: 50%;
  background:
    linear-gradient(
      180deg,
      #f5fcff,
      #8fa9ba
    );
  box-shadow:
    0 25px 35px rgba(0,0,0,.4),
    0 0 30px rgba(0,145,255,.15);
}


.sink-bowl {
  position: absolute;
  width: 330px;
  height: 90px;
  top: 25px;
  left: 30px;
  border-radius: 50%;
  background:
    radial-gradient(
      ellipse at center,
      #063c70 0%,
      #041e39 50%,
      #9bb6c8 100%
    );
  overflow: hidden;
}


.sink-reflection {
  position: absolute;
  width: 150px;
  height: 20px;
  background: rgba(255,255,255,.25);
  border-radius: 50%;
  top: 15px;
  left: 90px;
  filter: blur(4px);
}


.drain {
  position: absolute;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background: #101b25;
  bottom: 18px;
  left: 50%;
  transform: translateX(-50%);
  box-shadow: inset 0 0 10px #000;
}


/* ================================
   Pipes
================================ */

.pipe {
  position: absolute;
  border: 10px solid #168bd0;
  filter: drop-shadow(0 0 12px rgba(0,150,255,.35));
  opacity: .8;
}


.pipe-one {
  width: 120px;
  height: 180px;
  border-right: 0;
  border-radius: 60px 0 0 60px;
  left: 35px;
  top: 150px;
}


.pipe-two {
  width: 100px;
  height: 170px;
  border-left: 0;
  border-radius: 0 60px 60px 0;
  right: 35px;
  bottom: 150px;
}


.pipe-three {
  width: 70px;
  height: 120px;
  border-top: 0;
  border-radius: 0 0 40px 40px;
  right: 80px;
  top: 50px;
}


/* ================================
   Floating Icons
================================ */

.floating-tool {
  position: absolute;
  width: 58px;
  height: 58px;
  border-radius: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(10, 70, 120, .35);
  border: 1px solid rgba(100,210,255,.25);
  backdrop-filter: blur(12px);
  color: #5bd4ff;
  font-size: 23px;
  box-shadow: 0 15px 35px rgba(0,0,0,.25);
  animation: floatingTool 4s ease-in-out infinite;
  z-index: 8;
}


.tool-one {
  top: 100px;
  right: 35px;
}

.tool-two {
  top: 270px;
  right: -10px;
  animation-delay: 1s;
}

.tool-three {
  bottom: 130px;
  left: 25px;
  animation-delay: 2s;
}

.tool-four {
  top: 50px;
  left: 70px;
  animation-delay: 1.5s;
}


@keyframes floatingTool {
  0%,100% {
    transform: translateY(0) rotate(0deg);
  }

  50% {
    transform: translateY(-18px) rotate(5deg);
  }
}


/* ================================
   Water Drops
================================ */

.water-drop {
  position: absolute;
  width: 13px;
  height: 18px;
  border-radius: 70% 30% 65% 35%;
  background: linear-gradient(135deg,#d9f8ff,#008cff);
  box-shadow: 0 0 20px rgba(0,160,255,.8);
  animation: dropFloat 3s infinite ease-in-out;
}


.drop-one {
  right: 110px;
  top: 100px;
}

.drop-two {
  left: 100px;
  top: 230px;
  animation-delay: .7s;
}

.drop-three {
  right: 70px;
  bottom: 190px;
  animation-delay: 1.4s;
}

.drop-four {
  left: 150px;
  bottom: 100px;
  animation-delay: 2s;
}


@keyframes dropFloat {
  0%,100% {
    transform: translateY(0) scale(1);
    opacity: .6;
  }

  50% {
    transform: translateY(-25px) scale(1.15);
    opacity: 1;
  }
}


/* ================================
   Logo Card
================================ */

.hero-logo-card {
  position: absolute;
  bottom: 25px;
  right: 15px;
  z-index: 10;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 18px;
  border-radius: 18px;
  background: rgba(3,25,48,.7);
  border: 1px solid rgba(255,255,255,.12);
  backdrop-filter: blur(18px);
  box-shadow: 0 20px 50px rgba(0,0,0,.35);
  animation: logoFloat 5s ease-in-out infinite;
}


.logo-circle {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg,#00aaff,#005bea);
  box-shadow: 0 0 20px rgba(0,150,255,.4);
}


.logo-circle i {
  font-size: 20px;
  color: #fff;
}


.hero-logo-card strong {
  display: block;
  font-size: 16px;
}


.hero-logo-card small {
  display: block;
  color: #82d9ff;
  font-size: 11px;
  margin-top: 3px;
}


@keyframes logoFloat {
  0%,100% {
    transform: translateY(0);
  }

  50% {
    transform: translateY(-10px);
  }
}


/* ================================
   Scroll
================================ */

.hero-scroll {
  position: absolute;
  bottom: 25px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 10;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  color: rgba(255,255,255,.5);
  font-size: 12px;
  animation: scrollDown 2s infinite;
}


.hero-scroll i {
  color: #16aaff;
}


@keyframes scrollDown {
  0%,100% {
    transform: translate(-50%,0);
  }

  50% {
    transform: translate(-50%,8px);
  }
}


/* ================================
   Background Water Particles
================================ */

.water-bg {
  position: absolute;
  inset: 0;
  overflow: hidden;
  pointer-events: none;
}


.water-bg span {
  position: absolute;
  width: 3px;
  height: 3px;
  border-radius: 50%;
  background: #43c9ff;
  box-shadow: 0 0 12px #00aaff;
  animation: particleMove linear infinite;
}


.water-bg span:nth-child(1) {
  left: 10%;
  animation-duration: 8s;
}

.water-bg span:nth-child(2) {
  left: 22%;
  animation-duration: 11s;
  animation-delay: 2s;
}

.water-bg span:nth-child(3) {
  left: 35%;
  animation-duration: 7s;
  animation-delay: 1s;
}

.water-bg span:nth-child(4) {
  left: 50%;
  animation-duration: 12s;
}

.water-bg span:nth-child(5) {
  left: 65%;
  animation-duration: 9s;
  animation-delay: 3s;
}

.water-bg span:nth-child(6) {
  left: 78%;
  animation-duration: 10s;
}

.water-bg span:nth-child(7) {
  left: 88%;
  animation-duration: 7s;
  animation-delay: 2s;
}

.water-bg span:nth-child(8) {
  left: 95%;
  animation-duration: 13s;
}


@keyframes particleMove {
  0% {
    transform: translateY(750px) scale(.4);
    opacity: 0;
  }

  20% {
    opacity: 1;
  }

  80% {
    opacity: .8;
  }

  100% {
    transform: translateY(-100px) scale(1.4);
    opacity: 0;
  }
}


/* ================================
   Responsive
================================ */

@media (max-width: 991px) {

  .awtad-hero {
    min-height: auto;
    padding: 80px 0 100px;
  }

  .hero-content {
    text-align: center;
  }

  .hero-badge {
    justify-content: center;
  }

  .hero-description {
    margin-left: auto;
    margin-right: auto;
  }

  .hero-buttons {
    justify-content: center;
  }

  .hero-features {
    justify-content: center;
  }

  .plumbing-scene {
    height: 500px;
    transform: scale(.9);
  }

}


@media (max-width: 576px) {

  .awtad-hero {
    padding: 55px 0 80px;
  }

  .hero-content h1 {
    font-size: 42px;
  }

  .hero-description {
    font-size: 15px;
  }

  .hero-buttons {
    flex-direction: column;
  }

  .hero-btn {
    width: 100%;
  }

  .plumbing-scene {
    height: 430px;
    transform: scale(.68);
    transform-origin: center top;
    margin-bottom: -70px;
  }

  .hero-scroll {
    display: none;
  }

}

</style>