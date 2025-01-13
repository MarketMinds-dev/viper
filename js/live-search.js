jQuery(document).ready(function ($) {
  // Helper function to slice text
  function sliceText(text, maxLength) {
    if (text.length > maxLength) {
      return text.substring(0, maxLength) + "...";
    }
    return text;
  }

  function fetchProducts(searchQuery) {
    $.ajax({
      url: ajaxurl,
      type: "POST",
      data: {
        action: "live_search",
        search_query: searchQuery,
      },
      success: function (response) {
        if (response.success) {
          var productHTML = "";

          // Display Coatings first
          response.data.coatings.forEach(function (coating) {
            productHTML +=
              '<article id="post-' + coating.id + '" class="product-card">';
            productHTML +=
              '<div class="product-image"><a href="' +
              coating.url +
              '"><img src="' +
              coating.thumbnail +
              '" alt="' +
              coating.title +
              '"></a></div>';
            productHTML +=
              '<div class="product-content"><a href="' +
              coating.url +
              '"><h2 class="product-title">' +
              coating.title +
              "</h2></a>";
            productHTML += "<p>" + sliceText(coating.excerpt, 60) + "</p>"; // Slice text here
            productHTML +=
              '<a href="' + coating.url + '" class="btn">Learn more</a></div>';
            productHTML += "</article>";
          });

          // Then display Primers
          response.data.primers.forEach(function (primer) {
            productHTML +=
              '<article id="post-' + primer.id + '" class="product-card">';
            productHTML +=
              '<div class="product-image"><a href="' +
              primer.url +
              '"><img src="' +
              primer.thumbnail +
              '" alt="' +
              primer.title +
              '"></a></div>';
            productHTML +=
              '<div class="product-content"><a href="' +
              primer.url +
              '"><h2 class="product-title">' +
              primer.title +
              "</h2></a>";
            productHTML += "<p>" + sliceText(primer.excerpt, 60) + "</p>"; // Slice text here
            productHTML +=
              '<a href="' + primer.url + '" class="btn">Learn more</a></div>';
            productHTML += "</article>";
          });

          // Inject the HTML into the #product-results div
          $("#product-results").html(productHTML);
        } else {
          $("#product-results").html("<p>" + response.data.message + "</p>");
        }

        // Handle pagination visibility
        if (searchQuery === "") {
          $("#pagination").show(); // Show pagination when all products are displayed
        } else {
          $("#pagination").hide(); // Hide pagination when live search is active
        }
      },
    });
  }

  // Fetch all products on page load
  fetchProducts("");

  // Fetch products on input
  $("#product-search").on("input", function () {
    var searchQuery = $(this).val();
    fetchProducts(searchQuery);
  });
});
