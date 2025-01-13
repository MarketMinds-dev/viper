document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menu-toggle");
  const navMenu = document.getElementById("nav-menu");
  const navLinks = document.querySelectorAll(".nav-menu li a");

  menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("show");
  });

  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      // Check if the link has a dropdown
      const dropdown = link.nextElementSibling;

      // Toggle active class for the link
      navLinks.forEach((link) => link.classList.remove("active"));
      link.classList.add("active");

      // If there is a dropdown, prevent hiding navMenu
      if (dropdown && dropdown.classList.contains("dropdown")) {
        e.preventDefault(); // Prevent link from navigating (if needed)
        e.stopPropagation(); // Stop event from bubbling up to document
        dropdown.classList.toggle("show"); // Toggle the dropdown
        return; // Exit function to keep dropdown open
      }

      // Hide navMenu after click if it's not a dropdown link
      navMenu.classList.remove("show");
    });
  });

  // Close navMenu when clicking outside on mobile
  document.addEventListener("click", (e) => {
    if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
      navMenu.classList.remove("show");
      navLinks.forEach(
        (link) =>
          link.nextElementSibling &&
          link.nextElementSibling.classList.remove("show")
      );
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const track = document.querySelector(".carousel-track");
  const slides = Array.from(track.children);
  const nextButton = document.querySelector("#nextBtn");
  const prevButton = document.querySelector("#prevBtn");

  let slideWidth = slides[0].getBoundingClientRect().width;

  // Arrange the slides next to one another
  const setSlidePosition = (slide, index) => {
    slide.style.left = slideWidth * index + "px";
  };
  slides.forEach(setSlidePosition);

  let currentIndex = 0; // Track the current slide index

  const moveToSlide = (currentSlideIndex, targetSlideIndex) => {
    const currentSlide = slides[currentSlideIndex];
    const targetSlide = slides[targetSlideIndex];

    track.style.transform = `translateX(-${targetSlide.style.left})`;

    currentSlide.classList.remove("current-slide");
    targetSlide.classList.add("current-slide");

    currentIndex = targetSlideIndex;
  };

  // When I click left, move slides to the left
  prevButton.addEventListener("click", (e) => {
    const nextIndex = currentIndex - 1;
    if (nextIndex >= 0) {
      moveToSlide(currentIndex, nextIndex);
    }
  });

  // When I click right, move slides to the right
  nextButton.addEventListener("click", (e) => {
    const nextIndex = currentIndex + 1;
    if (nextIndex < slides.length) {
      moveToSlide(currentIndex, nextIndex);
    }
  });

  // Adjust slide positions and width on window resize (optional)
  window.addEventListener("resize", () => {
    slideWidth = slides[0].getBoundingClientRect().width;
    slides.forEach(setSlidePosition);
    moveToSlide(currentIndex, currentIndex); // Re-align to current slide
  });
});
