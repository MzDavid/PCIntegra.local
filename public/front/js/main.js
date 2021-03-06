/*

[Main Script]

Project: GREENSSD - Multipurpose Technology, Hosting Business with WHMCS Template
Version: 1.0
Author : themelooks.com

*/

(function(b) {
    var k = b(window),
        h = b("body"),
        l = b("#preloader");
    l.length && l.fakeLoader({
        spinner: "spinner2",
        bgColor: !1,
        zIndex: "9999999999"
    });
    "undefined" !== typeof Tawk_API && (Tawk_API = Tawk_API || {}, Tawk_API.onLoad = function() {
        b("#tawkchat-container").length && h.addClass("isTawkMobile")
    });
    var f = function(a, b) {
        return "undefined" === typeof a ? b : a
    };
    b(function() {
        b("[data-bg-img]").each(function() {
            var a = b(this);
            a.css("background-image", "url(" + a.data("bg-img") + ")").addClass("bg--img bg--overlay").attr("data-rjs", 2).removeAttr("data-bg-img")
        });
        retinajs();
        b("[data-sticky]").each(function() {
            b(this).sticky({
                zIndex: 999
            })
        });
        var a = b('[data-popup="video"]');
        a.length && a.magnificPopup({
            type: "iframe"
        });
        b("[data-form-validation] form").each(function() {
            b(this).validate({
                errorPlacement: function() {
                    return !0
                }
            })
        });
        a = b('[data-counter-up="numbers"]');
        a.length && a.counterUp({
            delay: 10,
            time: 1E3
        });
        b("[data-countdown]").each(function() {
            var a = b(this);
            a.countdown(a.data("countdown"), function(a) {
                b(this).html("<ul>" + a.strftime("<li><strong>%D</strong><span>Days</span></li><li><strong>%H</strong><span>Hours</span></li><li><strong>%M</strong><span>Minutes</span></li><li><strong>%S</strong><span>Seconds</span></li>") +
                    "</ul>")
            })
        });
        b(".owl-carousel").each(function() {
            var a = b(this);
            a.owlCarousel({
                items: f(a.data("owl-items"), 1),
                margin: f(a.data("owl-margin"), 0),
                loop: f(a.data("owl-loop"), !0),
                smartSpeed: 1200,
                autoplaySpeed: 800,
                autoplay: f(a.data("owl-autoplay"), !0),
                mouseDrag: f(a.data("owl-drag"), !0),
                nav: f(a.data("owl-nav"), !1),
                navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
                dots: f(a.data("owl-dots"), !1),
                responsive: f(a.data("owl-responsive"), {})
            })
        });
        var d = b("#header"),
            q = d.find(".header--topbar"),
            r = d.find(".header--topbar-logo"),
            a = d.find(".header--navbar-wrapper"),
            e = !1;
        q.length && q.css("height", r.outerHeight());
        a.length && (d.css("padding-bottom", a.outerHeight() / 2), e = !0);
        d = b("#pageHeader");
        e && d.css("padding-top", parseInt(d.css("padding-top"), 10) + a.outerHeight() / 2);
        d = b("#banner").find(".banner--item");
        e && d.css("padding-top", parseInt(d.css("padding-top"), 10) + a.outerHeight() / 2);
        var a = b(".pricing--nav-switch"),
            e = a.find("li"),
            d = a.find("li.active"),
            k = a.find(".item--bg");
        a.length && (k.css({
            left: d.position().left,
            width: d.outerWidth()
        }), e.on("click", function() {
            var a = b(this);
            k.css({
                left: a.position().left,
                width: a.outerWidth()
            })
        }));
        var a = b("#pricingDetails"),
            h = a.find(".pricing--header"),
            p = a.find(".pricing--price"),
            m = 0,
            n = 0;
        h.each(function(a) {
            var c = b(this);
            m = c.outerHeight() > m ? c.outerHeight() : m;
            h.length === a + 1 && h.css("height", m)
        });
        p.each(function(a) {
            var c = b(this);
            n = c.outerHeight() > n ? c.outerHeight() : n;
            p.length === a + 1 && p.css("min-height", n)
        });
        var a = b("#vpsPricing"),
            c = {};
        c.$slider = a.find(".vps-pricing--slider");
        c.$putValue =
            a.find("[data-put-value]");
        c.$putHref = a.find("[data-put-href]");
        c.slider = function(a) {
            c.slider.value = 1;
            c.slider.max = a.length - 1;
            c.slider.changeValue = function(e, d) {
                c.slider.value = b.isEmptyObject(d) ? c.slider.value : d.value;
                c.$putValue.each(function() {
                    var d = b(this);
                    d.text(a[c.slider.value][d.data("put-value")])
                });
                c.$putHref.each(function() {
                    b(this).attr("href", a[c.slider.value][c.$putHref.data("put-href")])
                });
                c.$plansListItem.eq("undefined" === typeof d.value ? c.slider.value : d.value).addClass("active").siblings("li").removeClass("active")
            };
            c.$slider.slider({
                animate: "fast",
                range: "min",
                min: 0,
                max: c.slider.max,
                value: c.slider.value,
                step: 1,
                create: function(d, e) {
                    c.$plansList = b('<ul class="vps-pricing--plans nav nav-justified"></ul>');
                    b(d.target).append(c.$plansList);
                    b.each(a, function(a, b) {
                        c.$plansList.append("<li>" + b.title + "</li>")
                    });
                    c.$plansListItem = c.$plansList.children("li");
                    c.slider.changeValue(d, e)
                },
                slide: c.slider.changeValue
            })
        };
        a.length && b.getJSON("json/vps-plans.json", c.slider);
        c.$pricingFeatureHeader = a.find(".vps-pricing--feature .pricing--price");
        c.$pricingFeatureHeaderH = 0;
        c.$pricingFeatureHeader.each(function(a) {
            var d = b(this);
            c.$pricingFeatureHeaderH = c.$pricingFeatureHeaderH > d.outerHeight() ? c.$pricingFeatureHeaderH : d.outerHeight();
            c.$pricingFeatureHeader.length === a + 1 && c.$pricingFeatureHeader.css("height", c.$pricingFeatureHeaderH)
        });
        a = b("#productRatingSelect");
        a.length && a.barrating({
            theme: "fontawesome-stars-o",
            hoverState: !1
        });
        b("#checkout").on("click", ".checkout--info-toggle", function(a) {
            a.preventDefault();
            b(this).parent("p").siblings(".checkout--info-form").slideToggle()
        });
        var g = b("#map"),
            a = function() {
                var a = new google.maps.Map(g[0], {
                    center: {
                        lat: g.data("map-latitude"),
                        lng: g.data("map-longitude")
                    },
                    zoom: g.data("map-zoom"),
                    scrollwheel: !1,
                    disableDefaultUI: !0,
                    zoomControl: !0,
                    styles: [{
                        featureType: "landscape",
                        stylers: [{
                            hue: "#FFBB00"
                        }, {
                            saturation: 43.400000000000006
                        }, {
                            lightness: 37.599999999999994
                        }, {
                            gamma: 1
                        }]
                    }, {
                        featureType: "road.highway",
                        stylers: [{
                            hue: "#FFC200"
                        }, {
                            saturation: -61.8
                        }, {
                            lightness: 45.599999999999994
                        }, {
                            gamma: 1
                        }]
                    }, {
                        featureType: "road.arterial",
                        stylers: [{
                            hue: "#FF0300"
                        }, {
                            saturation: -100
                        }, {
                            lightness: 51.19999999999999
                        }, {
                            gamma: 1
                        }]
                    }, {
                        featureType: "road.local",
                        stylers: [{
                            hue: "#FF0300"
                        }, {
                            saturation: -100
                        }, {
                            lightness: 52
                        }, {
                            gamma: 1
                        }]
                    }, {
                        featureType: "water",
                        stylers: [{
                            hue: "#0078FF"
                        }, {
                            saturation: -13.200000000000003
                        }, {
                            lightness: 2.4000000000000057
                        }, {
                            gamma: 1
                        }]
                    }, {
                        featureType: "poi",
                        stylers: [{
                            hue: "#00FF6A"
                        }, {
                            saturation: -1.0989010989011234
                        }, {
                            lightness: 11.200000000000017
                        }, {
                            gamma: 1
                        }]
                    }]
                });
                if ("undefined" !== typeof g.data("map-marker")) {
                    var b = g.data("map-marker"),
                        c = 0;
                    for (c; c < b.length; c++) new google.maps.Marker({
                        position: {
                            lat: b[c][0],
                            lng: b[c][1]
                        },
                        map: a,
                        animation: google.maps.Animation.DROP,
                        draggable: !0
                    })
                }
            };
        g.length && (g.css("height", 400), a());
        e = b("#contact");
        a = e.find(".contact--form");
        a.length && a.css("height", a.find("form").outerHeight() / 2);
        var l = e.find(".contact--form-status"),
            e = function(a) {
                var c = b(a);
                a = c.attr("action");
                c = c.serialize();
                b.post(a, c, function(a) {
                    l.show().html(a).delay(3E3).fadeOut("show")
                })
            };
        a.length && a.find("form").validate({
            errorPlacement: function() {
                return !0
            },
            submitHandler: e
        });
        a = b(".footer--title");
        e = a.children(".logo");
        e.length && a.css("height", e.outerHeight());
        b("#backToTop").on("click", "a", function(a) {
            a.preventDefault();
            b("html, body").animate({
                scrollTop: 0
            }, 800)
        });
        "undefined" !== typeof b.cColorSwitcher && b.cColorSwitcher({
            switcherTitle: "Main Colors:",
            switcherColors: [{
                bgColor: "#82b440",
                filepath: "css/colors/theme-color-1.css"
            }, {
                bgColor: "#ff5252",
                filepath: "css/colors/theme-color-2.css"
            }, {
                bgColor: "#ff9600",
                filepath: "css/colors/theme-color-3.css"
            }, {
                bgColor: "#e91e63",
                filepath: "css/colors/theme-color-4.css"
            }, {
                bgColor: "#00BCD4",
                filepath: "css/colors/theme-color-5.css"
            }, {
                bgColor: "#FC5143",
                filepath: "css/colors/theme-color-6.css"
            }, {
                bgColor: "#00B249",
                filepath: "css/colors/theme-color-7.css"
            }, {
                bgColor: "#D48B91",
                filepath: "css/colors/theme-color-8.css"
            }, {
                bgColor: "#8CBEB2",
                filepath: "css/colors/theme-color-9.css"
            }, {
                bgColor: "#119ee6",
                filepath: "css/colors/theme-color-10.css"
            }],
            switcherTarget: b("#changeColorScheme")
        })
    });
    k.on("load", function() {
        var a = function() {
            1 < k.scrollTop() ? h.addClass("isScrolling") : h.removeClass("isScrolling")
        };
        a();
        k.on("scroll", a);
        a = b(".AdjustRow");
        a.length && a.isotope({
            layoutMode: "fitRows"
        });
        a = b(".MasonryRow");
        a.length && a.isotope();
        a = b("#features").find(".feature--video");
        a.length && a.css("min-height", a.siblings(".feature--items").outerHeight());
        var a = b("#portfolio"),
            d = a.find(".portfolio--filter-nav"),
            f = a.find(".portfolio--items");
        f.length && f.isotope({
            animationEngine: "best-available",
            itemSelector: ".portfolio--item"
        });
        d.on("click", "a", function(a) {
            a.preventDefault();
            a = b(this);
            var d = a.attr("href");
            f.isotope({
                filter: "*" !==
                    d ? '[data-cat~="' + d + '"]' : d
            });
            a.parent("li").addClass("active").siblings().removeClass("active")
        })
    })
})(jQuery);