$("#owl-demo").owlCarousel({
    pagination : false,
});
var form = $("#contactForm");
if(form.length>=1){
    form.formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        locale: 'es_ES',
        excluded: ':disabled',
        fields: {
            contactName: {
                validators: {
                    notEmpty: {
                        message: 'Es necesario un nombre y este no puede estar vacío'
                    }
                }
            },
            contactEmail: {
                validators: {
                    notEmpty: {
                        message: 'Es necesaria la dirección de correo electrónico y esta no puede estar vacía'
                    },
                    emailAddress: {
                        message: 'Este campo no contiene una dirección de correo electrónico válida.'
                    }
                }
            },
            contactSubject: {
                validators: {
                    notEmpty: {
                        message: 'El asunto es necesario y no puede estar vacío.'
                    }
                }
            },
            contactMessage: {
                validators: {
                    notEmpty: {
                        message: 'El mensaje es necesario y no puede estar vacío.'
                    }
                }
            }
        }
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        var send = $("#sendM");
        var message = send.attr("data-loading-text");
        send.text(message).attr("disabled",true);
        $.ajax({
            type : "POST",
            url : "/index/sendmessagecontact",
            data : $(this).serialize(),
            dataType : "json",
            success : function(response){
                if(response.code==200){
                    send.text("Enviar mensaje").attr("disabled",false);
                    resetForm(form);
                    form.formValidation('resetForm', true);
                    $("#form-success").removeClass("hidden");
                }else{
                    $("#form-warning").removeClass("hidden");
                    send.text("Intentar nuevamente").attr("disabled",false);
                }
            },
            error : function(){

            },complete:function(){
                setTimeout(function(){
                    $("#form-success").addClass("hidden");
                    $("#form-warning").addClass("hidden");
                },2000);
            }
        });
    });
}
$('#gallery').imagesGrid({
            images: [
                { src: '/front/img/certificates/1.jpg'},
                { src: '/front/img/certificates/2.jpg', alt: 'Nature', title: 'Nature' },
                '/front/img/certificates/3.png',
                { src: '/front/img/certificates/4.png', caption: 'The long way' },
                '/front/img/certificates/5.png',
                '/front/img/certificates/6.jpg',
                '/front/img/certificates/7.jpg'
            ],
            align: true,
            cells: 6
        });

     $(".owl-one").owlCarousel({
        center: true,
        items:6,
        loop:true,
        margin:10,
        dots:true,
        autoplay: true,
        autoplaySpeed:800,
        smartSpeed: 1200,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:6
        }
     }
 });



jQuery(function($) {
    // Asynchronously Load the map API
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyDQQB-H9zsgFQKylpD8DQHWR4foBItOrdQ&sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        scrollwheel: false,
        mapTypeId: 'roadmap'
    };

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);

    // Multiple Markers
    var markers = [
        ['Cd. del Carmen, Campeche', 18.645534,-91.830029],
        ['Cancun, Quintana Roo', 21.1569043,-86.9025108],
        ['Playa del Carmen, Quintana Roo', 20.6711417,-87.1159385]
    ];

    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>Cd. del Carmen</h3>' +
        '<p>Calle 48 num 6B entre 31A y 31B Col. Aviación.</p>' +        '</div>'],
        ['<div class="info_content">' +
        '<h3>Cancun</h3>' +
        '<p> Calle Atlixco #11 Fracc. Costa Azul II M-55 L3 C.P. 77539.</p>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Playa del Carmen</h3>' +
        '<p> Av. Gorriones #83 Reg. 043 Smz 001 M-1 L-5 Fracc. Villas del Sol I </p>' +
        '</div>']
    ];

    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Loop through our array of markers & place each one on the map
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });

        // Allow each marker to have an info window
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(7);
        google.maps.event.removeListener(boundsListener);
    });

}
