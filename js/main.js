document.addEventListener("DOMContentLoaded", function () {
  const yearSpan = document.getElementById("year");
  if (yearSpan) yearSpan.textContent = new Date().getFullYear();

  const navbar = document.querySelector(".site-header");
  const handleScroll = () => {
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  };
  window.addEventListener("scroll", handleScroll);
  handleScroll();

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href");
      if (targetId === "#") return;

      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        const headerOffset = 80;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition =
          elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: "smooth",
        });
      }
    });
  });

  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("active");
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll(".reveal-on-scroll").forEach((el) => {
    observer.observe(el);
  });

  const menuBtns = document.querySelectorAll(".menu-btn");
  if (menuBtns.length > 0) {
    menuBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        menuBtns.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");

        const category = btn.getAttribute("data-category");

        const sections = document.querySelectorAll(".menu-section");
        sections.forEach((sec) => {
          sec.classList.remove("active");
          if (sec.id === category) {
            sec.classList.add("active");

            sec.querySelectorAll(".reveal-on-scroll").forEach((el) => {
              el.classList.remove("active");

              setTimeout(() => el.classList.add("active"), 50);
            });
          }
        });
      });
    });
  }

  const bookingForm = document.getElementById("booking-form");
  if (bookingForm) {
    let currentRoomPrice = 25000;
    let servicesPrice = 0;
    let guestCount = 2;
    let roomCount = 1;

    const urlParams = new URLSearchParams(window.location.search);
    const roomFromUrl = urlParams.get("room");
    const roomDisplay = document.getElementById("sum-room");

    function updateTotal() {
      const totalAmount = document.getElementById("sum-total");
      if (totalAmount) {
        const total = currentRoomPrice * roomCount + servicesPrice;
        totalAmount.textContent = total.toLocaleString() + " DZD";
      }
    }

    if (roomFromUrl && roomDisplay) {
      roomDisplay.parentElement.style.display = "flex";
      roomDisplay.textContent = roomFromUrl;

      if (roomFromUrl.toLowerCase().includes("présidentielle"))
        currentRoomPrice = 220000;
      else if (roomFromUrl.toLowerCase().includes("deluxe"))
        currentRoomPrice = 85000;
      else if (roomFromUrl.toLowerCase().includes("suite"))
        currentRoomPrice = 45000;
      else currentRoomPrice = 25000;
    }

    updateTotal();

    const updateRooms = function (change) {
      roomCount += change;
      if (roomCount < 1) roomCount = 1;

      const display = document.getElementById("room-count-display");
      const summaryDisplay = document.getElementById("sum-room-count");

      if (display) display.textContent = roomCount;
      if (summaryDisplay)
        summaryDisplay.textContent =
          roomCount + (roomCount > 1 ? " chambres" : " chambre");

      updateTotal();
    };

    const btnRoomDec = document.getElementById("btn-room-dec");
    const btnRoomInc = document.getElementById("btn-room-inc");
    if (btnRoomDec) btnRoomDec.addEventListener("click", () => updateRooms(-1));
    if (btnRoomInc) btnRoomInc.addEventListener("click", () => updateRooms(1));

    window.updateGuests = function (change) {
      guestCount += change;
      if (guestCount < 1) guestCount = 1;

      const display = document.getElementById("guest-display");
      const summaryDisplay = document.getElementById("sum-guests");

      if (display) display.textContent = guestCount;
      if (summaryDisplay)
        summaryDisplay.textContent = guestCount + " personnes";
    };

    window.toggleService = function (element, price) {
      element.classList.toggle("active");

      if (element.classList.contains("active")) {
        servicesPrice += price;
      } else {
        servicesPrice -= price;
      }

      const serviceSum = document.getElementById("sum-services");
      if (serviceSum)
        serviceSum.textContent = servicesPrice.toLocaleString() + " DZD";
      updateTotal();
    };

    const checkin = document.getElementById("checkin");
    const checkout = document.getElementById("checkout");
    if (checkin && checkout) {
      const handleDateChange = () => {
        if (document.getElementById("sum-checkin"))
          document.getElementById("sum-checkin").textContent =
            checkin.value || "-";
        if (document.getElementById("sum-checkout"))
          document.getElementById("sum-checkout").textContent =
            checkout.value || "-";
      };
      checkin.addEventListener("change", handleDateChange);
      checkout.addEventListener("change", handleDateChange);
    }
  }

  const forms = document.querySelectorAll("form");
  forms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      if (
        form.getAttribute("action") &&
        (form.getAttribute("action").includes("process_login.php") ||
          form.getAttribute("action").includes("process_register.php") ||
          form.getAttribute("action").includes("process_booking.php"))
      ) {
        if (form.id === "booking-form") {
          const totalText = document
            .getElementById("sum-total")
            .textContent.replace(" DZD", "")
            .replace(/,/g, "")
            .replace(/\s/g, "");
          const totalPrice = parseInt(totalText) || 0;
          document.getElementById("input-total-price").value = totalPrice;

          const activeServices = [];
          document
            .querySelectorAll(".service-item.active .service-name")
            .forEach((el) => activeServices.push(el.textContent.trim()));
          document.getElementById("input-services-list").value =
            activeServices.join(", ");

          const guests = document.getElementById("guest-display").textContent;
          const rooms =
            document.getElementById("room-count-display").textContent;
          document.getElementById("input-guests").value = guests;
          document.getElementById("input-room-count").value = rooms;
          document.getElementById("input-room-type").value =
            document.getElementById("sum-room").textContent;
        }

        return;
      }

      e.preventDefault();

      const btn = form.querySelector('button[type="submit"]');
      if (!btn) return;

      const originalText = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
      btn.disabled = true;

      setTimeout(() => {
        btn.style.backgroundColor = "#4ade80";
        btn.style.borderColor = "#4ade80";
        btn.innerHTML = '<i class="fas fa-check"></i> Envoyé !';

        setTimeout(() => {
          btn.innerHTML = originalText;
          btn.disabled = false;
          btn.style.backgroundColor = "";
          btn.style.borderColor = "";
          form.reset();
        }, 3000);
      }, 1500);
    });
  });
});
