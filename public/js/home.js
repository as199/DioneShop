$(document).ready(function () {
  $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
  $("#cacheMontant").hide("slow");
  $("#cacheChambre").hide("slow");
  $("#cacheAdresse").hide("slow");

  // $("#menu a").click(function () {
  //   page = $(this).attr("href");
  //   $.ajax({
  //     url: page,
  //     cache: false,
  //     success: function (html) {
  //       afficher(html);
  //     },
  //     error: function (XMLHttpRequest, textStatus, errorThrown) {
  //       alert("textStatus");
  //     }
  //   })
  //   return false;
  // });
});
$("#etudiant_type").change(function () {
  var type = $("#etudiant_type").val();
  if (type == "nonboursier") {
    $("#cacheAdresse").show("slow");
    $("#cacheMontant").hide("slow");
    $("#cacheChambre").hide("slow");
  }
  if (type == "boursierloger") {
    $("#cacheMontant").show("slow");
    $("#cacheChambre").show("slow");
    $("#cacheAdresse").hide("slow");
  }
  if (type == "boursiernonloger") {
    $("#cacheMontant").show("slow");
    $("#cacheChambre").hide("slow");
    $("#cacheAdresse").hide("slow");
  }
});

// function afficher(data) {
//   $('#bog').slideUp(500, function () {
//     $("#bog").empty();
//     $("#bog").append(data);
//     $('#bog').slideDown(1000);
//   })

// }
