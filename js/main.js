/**
 * Hôtel Sables d'Or - Main JavaScript
 * Handles: Navigation, Mobile Menu, Scroll Animations, Restaurant Tabs, Booking Logic
 */

document.addEventListener("DOMContentLoaded", function () {
  // =========================================
  // 1. Global: Header & Navigation
  // =========================================
  
  // Year Update
  const yearSpan = document.getElementById("year");
  if (yearSpan) yearSpan.textContent = new Date().getFullYear();

  // Sticky Header Effect
  const navbar = document.querySelector(".site-header");
  const handleScroll = () => {
    if (window.scrollY > 50) {
      navbar.classList.add("scrolled");
    } else {
      navbar.classList.remove("scrolled");
    }
  };
  window.addEventListener("scroll", handleScroll);
  handleScroll(); // Trigger once on load



  // Smooth Scroll for Anchors
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        const headerOffset = 80;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: "smooth"
        });
      }
    });
  });

  // =========================================
  // 2. Global: Scroll Animations
  // =========================================
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px"
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("active");
        observer.unobserve(entry.target); // Only animate once
      }
    });
  }, observerOptions);

  document.querySelectorAll(".reveal-on-scroll").forEach(el => {
    observer.observe(el);
  });

  // =========================================
  // 3. Page: Restaurant (Menu Tabs)
  // =========================================
  const menuBtns = document.querySelectorAll(".menu-btn");
  if (menuBtns.length > 0) {
    menuBtns.forEach(btn => {
      btn.addEventListener("click", () => {
        // 1. Toggle Buttons
        menuBtns.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        // 2. Get category
        const category = btn.getAttribute("data-category");

        // 3. Toggle Sections
        const sections = document.querySelectorAll(".menu-section");
        sections.forEach((sec) => {
          sec.classList.remove("active");
          if (sec.id === category) {
            sec.classList.add("active");
            // Trigger animation for new items
            sec.querySelectorAll(".reveal-on-scroll").forEach(el => {
                el.classList.remove("active");
                // Small delay to allow display:block to apply before opacity transition
                setTimeout(() => el.classList.add("active"), 50);
            });
          }
        });
      });
    });
  }

  // =========================================
  // 4. Page: Reservation (Logic)
  // =========================================
  const bookingForm = document.getElementById("booking-form");
  if (bookingForm) {
    let currentRoomPrice = 25000; // Default to Standard Room price
    let servicesPrice = 0;
    let guestCount = 2;
    let roomCount = 1; // Default room count

    // Initialize from URL
    const urlParams = new URLSearchParams(window.location.search);
    const roomFromUrl = urlParams.get("room");
    const roomDisplay = document.getElementById("sum-room");

    // Function definitions
    function updateTotal() {
      const totalAmount = document.getElementById("sum-total");
      if (totalAmount) {
        const total = (currentRoomPrice * roomCount) + servicesPrice;
        totalAmount.textContent = total.toLocaleString() + " DZD";
      }
    }

    // Initialize logic
    if (roomFromUrl && roomDisplay) {
      roomDisplay.parentElement.style.display = "flex";
      roomDisplay.textContent = roomFromUrl;
      // Set default prices based on room name
      if (roomFromUrl.toLowerCase().includes("présidentielle")) currentRoomPrice = 220000;
      else if (roomFromUrl.toLowerCase().includes("deluxe")) currentRoomPrice = 85000;
      else if (roomFromUrl.toLowerCase().includes("suite")) currentRoomPrice = 45000;
      else currentRoomPrice = 25000; // Standard
    }
    
    // Always update total on load
    updateTotal();

    // Expose functions to global scope for HTML onclick attributes
    // Room Update Logic
    const updateRooms = function (change) {
      roomCount += change;
      if (roomCount < 1) roomCount = 1;
      
      const display = document.getElementById("room-count-display");
      const summaryDisplay = document.getElementById("sum-room-count");
      
      if (display) display.textContent = roomCount;
      if (summaryDisplay) summaryDisplay.textContent = roomCount + (roomCount > 1 ? " chambres" : " chambre");
      
      updateTotal();
    };

    // Attach Event Listeners
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
      if (summaryDisplay) summaryDisplay.textContent = guestCount + " personnes";
    };

    window.toggleService = function (element, price) {
      element.classList.toggle("active");
      
      if (element.classList.contains("active")) {
        servicesPrice += price;
      } else {
        servicesPrice -= price;
      }
      
      const serviceSum = document.getElementById("sum-services");
      if (serviceSum) serviceSum.textContent = servicesPrice.toLocaleString() + " DZD";
      updateTotal();
    };

    // Date inputs
    const checkin = document.getElementById("checkin");
    const checkout = document.getElementById("checkout");
    if (checkin && checkout) {
        const handleDateChange = () => {
            if(document.getElementById("sum-checkin")) 
                document.getElementById("sum-checkin").textContent = checkin.value || "-";
            if(document.getElementById("sum-checkout"))
                document.getElementById("sum-checkout").textContent = checkout.value || "-";
        }
        checkin.addEventListener("change", handleDateChange);
        checkout.addEventListener("change", handleDateChange);
    }
  }

  // =========================================
  // 5. Global: Form Validation / Submission Mock
  // =========================================
  const forms = document.querySelectorAll("form");
  forms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      // Allow default submission for auth forms
      if (form.getAttribute("action") && (form.getAttribute("action").includes("process_login.php") || form.getAttribute("action").includes("process_register.php") || form.getAttribute("action").includes("process_booking.php"))) {
          
          if (form.id === "booking-form") {
              const totalText = document.getElementById("sum-total").textContent.replace(" DZD", "").replace(/,/g, "").replace(/\s/g, "");
              const totalPrice = parseInt(totalText) || 0;
              document.getElementById("input-total-price").value = totalPrice;

              // Collect services
              const activeServices = [];
              document.querySelectorAll(".service-item.active .service-name").forEach(el => activeServices.push(el.textContent.trim()));
              document.getElementById("input-services-list").value = activeServices.join(", ");
              
              // Guests and Rooms are already in inputs or mapped? 
              // We need to ensure the hidden inputs for them are updated if they changed
              const guests = document.getElementById("guest-display").textContent;
              const rooms = document.getElementById("room-count-display").textContent;
              document.getElementById("input-guests").value = guests;
              document.getElementById("input-room-count").value = rooms;
              document.getElementById("input-room-type").value = document.getElementById("sum-room").textContent;
          }
          
          return; 
      }

      e.preventDefault();
      
      // Register Form Validation (Simulated/Client-side checks could still run, but we want the backend to handle it now)
      // Actually, let's just let the backend handle everything for auth forms.
      
      const btn = form.querySelector('button[type="submit"]');
      if (!btn) return;

      const originalText = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi...';
      btn.disabled = true;

      // Simulate API call
      setTimeout(() => {
        // Success feedback
        btn.style.backgroundColor = "#4ade80"; // Green
        btn.style.borderColor = "#4ade80";
        btn.innerHTML = '<i class="fas fa-check"></i> Envoyé !';
        
        setTimeout(() => {
            // Reset
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