var a = 0;
$(window).scroll(function () {
  var oTop = $(".numbers").offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $(".count").each(function () {
      var $this = $(this),
        countTo = $this.attr("data-count");
      $({
        countNum: $this.text(),
      }).animate(
        {
          countNum: countTo,
        },

        {
          duration: 2000,
          easing: "swing",
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum + "+");
            //alert('finished');
          },
        }
      );
    });
    a = 1;
  }
});
$(function () {
  $('input[type="radio"]').click(function () {
    var $radio = $(this);
    // console.log("hihihih");
    // if this was previously checked
    if ($radio.data("waschecked") == true) {
      $radio.prop("checked", false);
      $radio.data("waschecked", false);
    }
    else {
      $radio.prop("checked", true);
      $radio.data("waschecked", true);
    }
    // remove was checked from other radios
    // $radio.siblings('input[type="radio"]').data("waschecked", false);
  });
});
