<footer>
    <div class="centrer">
        <div class="contenu ">

            <div class="Apropos cadres">
                <h2>{{ __('message.footer-Apropos') }}</h2>
                <p>{{ __('message.footer-para1') }}<br><br>
                    {{ __('message.footer-para2') }}
                </p>
            </div>
            <!-- <div class="Support cadres">
                <h2><a href="">Support</a></h2>
                <div class="formElement">
                    <input type="text" placeholder="mot"> <span><i class="fas fa-search"></i></span>
                </div>
            </div> -->
            <div class="terme cadres">
                <h2> {{ __('message.footer-partenaire') }}</h2>
                <div class="flex-row">
                    <img src="{{ asset('image/part5.png') }}" alt="partenaire1 ">
                    <img src="{{ asset('image/police.png') }}" alt="partenaire2 ">
                    <img src="{{ asset('image/part2.png') }}" alt="partenaire2 ">
                </div>
                <!-- <div class="flex-row">
                <img src="{{ asset('image/velo-piste.jpg') }}" alt="partenaire1 ">
                <img src="{{ asset('image/velo-piste.jpg') }}" alt="partenaire2 ">
                <img src="{{ asset('image/logo-velo.png') }}" alt="partenaire2 ">
            </div> -->
            </div>
            <div class="Contact cadres">
                <h2> {{ __('message.footer-contacter') }} </h2>
                <p>JEAN-FRANÇOIS DESMARAIS
                <div>Director-Réalisateur</div>
                <div> Producer-Producteur</div>
                <div> Pulsion-design</div>
                <div class="box">
                    <div class="icon"> <i class='fa fa-phone' style="font-size: 1em; color:  #E74C3C ;"></i>
                    </div>
                    <div class="text">
                        <h3>Telephone</h3>
                        <p>+1 438-874-0323</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"> <i class='fa fa-envelope' style="font-size: 1em; color:  #E74C3C ;"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>jeanreneyapo@yahoo.com</p>
                    </div>
                </div>
                </p>
            </div>
            <div class="suivre cadres">
                <h2> {{ __('message.footer-suivre') }}</h2>
                <p>{{ __('message.footer-suivre-p') }}</p>
                <div class="social">
                    <a href=""><i class="fab fa-facebook-square" style="font-size: 2em; color:  #3b5998 ;"></i></a>
                    <a href=""> <i class="fab fa-twitter-square" style="font-size: 2em; color: #00acee;"></i></a>
                    <a href=""> <i class="fab fa-youtube-square" style="font-size: 2em; color: #c4302b ;"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="rights flex-row">
        <h4 class="text-gray">© 2020-2021 {{ __('message.footer-droit') }}</h4>
    </div>
    <div class="up">
        <span><i class="fas fa-arrow-circle-up fa-2x"></i></span>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/carrouselAnimate.js') }}"></script>
    <script src="{{ asset('js/uppy.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/smtp.js') }}"></script>
    <script src="{{ asset('js/appe.js') }}"></script>
    <script src="{{ asset('js/lang.js') }}"></script>
    <script src="{{ asset('js/langjq.js') }}"></script>
    
    <script>
    var mapOptions = {
        zoom: 12,
        minZoom: 6,
        maxZoom: 17,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.DEFAULT
        },
        center: new google.maps.LatLng(45.5016889, -73.567256),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        panControl: false,
        mapTypeControl: false,
        scaleControl: false,
        overviewMapControl: false,
        rotateControl: false
    }
    var canvas = document.getElementById('map-canvas');
    if (canvas) {
        var map = new google.maps.Map(canvas, {
            center: {
                lat: 45.5016889,
                lng: -73.567256
            },
            zoom: 12,
            minZoom: 6,
            maxZoom: 30,
        });
    }

    const marker = new google.maps.Marker({
        map: map,
        position: {
            lat: 45.5016889,
            lng: -73.567256
        },
        draggable: true
    });
    var searchbox = new google.maps.places.SearchBox(document.getElementById("address-input"));
    //event
    //console.log(searchbox);
    google.maps.event.addListener(searchbox, 'places_changed', function() {
        var places = searchbox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i, place;
        for (i = 0; place = places[i]; i++) {
            // console.log(place);
            bounds.extend(place.geometry.location);
            marker.setPosition(place.geometry.location); //modifier la position du marqueur
        }
        map.fitBounds(bounds);
        map.setZoom(15);
    });
    google.maps.event.addListener(marker, 'position_changed', function() {
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        // console.log(lat);
        $('#address-latitude').val(lat);
        $('#address-longitude').val(lng);
        // document.getElementById("address-latitude").value=lat;
        // document.getElementById("address-longitude").value=lng;
    });
    </script>


</footer>