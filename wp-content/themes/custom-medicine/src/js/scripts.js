import $, { css, get } from "jquery";
$(function ($) {
  $(".filter-btn").on("click", function () {
    let positionsIds = $("input.checkbox-positions:checked")
      .map(function () {
        return this.value;
      })
      .get();
    let countriesIds = $("input.checkbox-countries:checked")
      .map(function () {
        return this.value;
      })
      .get();

    if (countriesIds.length == 0) {
      countriesIds = $(this).attr("data-countries").split(",");
    }
    if (positionsIds.length == 0) {
      positionsIds = $(this).attr("data-positions").split(",");
    }

    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "filter_speakers",
        positionsIds,
        countriesIds,
      },
      success: function (res) {
        $(".speakers-row").html(res);
      },
      error: function (err) {
        console.error(err);
      },
    });
  });

  $(".load-more").on("click", function () {
    let _this = $(this);
    _this.html("Loading...");
    let data = {
      action: "speakers_loadmore",
      query: _this.attr("data-param-posts"),
      page: this_page,
    };
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      data: data,
      type: "POST",
      success: function (data) {
        if (data) {
          _this.html("Load More");
          _this.prev().before(data);
          this_page++;
          if (this_page == _this.attr("data-max-pages")) {
            _this.remove();
          }
        } else {
          _this.remove();
        }
      },
    });
  });

  $(".hamburger").on("click", () => {
    $(".hamburger").toggleClass("is-active");
    $(".menu-wrapper").toggleClass("active");
    if ($(".hamburger").hasClass("is-active")) {
        $("body").css({ overflow: "hidden" });
    } else {
        $("body").css({ overflow: "auto" });
    }
  });

  let sticky = $(".header");
  stickyHeader();
  $(window).on("scroll", function () {
    stickyHeader();
  });
  
  function stickyHeader() {
    let scroll = $(window).scrollTop();
    if (scroll >= 100) sticky.addClass("sticky");
    else sticky.removeClass("sticky");
  }




});


