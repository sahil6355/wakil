!(function (a) {
  "use strict";
  var b = function (b) {
    this.element = a(b);
  };
  (b.prototype.show = function () {
    var b = this.element,
      c = b.closest("ul:not(.dropdown-menu)"),
      d = b.attr("data-target");
    if (
      (d || ((d = b.attr("href")), (d = d && d.replace(/.*(?=#[^\s]*$)/, ""))),
      !b.parent("li").hasClass("active"))
    ) {
      var e = c.find(".active:last a")[0],
        f = a.Event("show.bs.tab", { relatedTarget: e });
      if ((b.trigger(f), !f.isDefaultPrevented())) {
        var g = a(d);
        this.activate(b.parent("li"), c),
          this.activate(g, g.parent(), function () {
            b.trigger({ type: "shown.bs.tab", relatedTarget: e });
          });
      }
    }
  }),
    (b.prototype.activate = function (b, c, d) {
      function g() {
        e
          .removeClass("active")
          .find("> .dropdown-menu > .active")
          .removeClass("active"),
          b.addClass("active"),
          f ? (b[0].offsetWidth, b.addClass("in")) : b.removeClass("fade"),
          b.parent(".dropdown-menu") &&
            b.closest("li.dropdown").addClass("active"),
          d && d();
      }
      var e = c.find("> .active"),
        f = d && a.support.transition && e.hasClass("fade");
      f ? e.one(a.support.transition.end, g).emulateTransitionEnd(150) : g(),
        e.removeClass("in");
    });
  var c = a.fn.tab;
  (a.fn.tab = function (c) {
    return this.each(function () {
      var d = a(this),
        e = d.data("bs.tab");
      e || d.data("bs.tab", (e = new b(this))), "string" == typeof c && e[c]();
    });
  }),
    (a.fn.tab.Constructor = b),
    (a.fn.tab.noConflict = function () {
      return (a.fn.tab = c), this;
    }),
    a(document).on(
      "click.bs.tab.data-api",
      '[data-toggle="tab"], [data-toggle="pill"]',
      function (b) {
        b.preventDefault(), a(this).tab("show");
      }
    );
})(jQuery);