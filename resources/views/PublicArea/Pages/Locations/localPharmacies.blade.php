@extends('PublicArea.Layout.main')
@section('container')

        <!-- page-title -->
        <div class="prt-page-title-row">
            <div class="prt-page-title-row-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="prt-page-title-row-heading">
                                <div class="page-title-heading">
                                    <h2 class="title">Local Pharmacies</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Local Pharmacies Map</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end-->

        <!-- site-main start -->
        <div class="site-main">

            <!--blog-section-->
            <div class="container">
                <h2 class="text-center"></h2>
                <div id="map" style="width: 100%; height: 500px;"></div>

                <div class="row mt-4">
                    @foreach ($local_pharmacies as $pharmacy)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>
                                        <a href="{{ url('localPharmacies-details/' . $pharmacy->id) }}">{{ $pharmacy->name }}</a>
                                    </h3>
                                    <p><strong>Location:</strong> {{ $pharmacy->location }}</p>
                                    <p><strong>Address:</strong> {{ $pharmacy->address }}</p>
                                    <p><strong>Phone:</strong> {{ $pharmacy->phoneNo }}</p>
                                    <p><strong>Email:</strong> {{ $pharmacy->email }}</p>
                                    <p><strong>Open Time:</strong> {{ $pharmacy->openTime }}</p>
                                    <p><strong>Close Time:</strong> {{ $pharmacy->closeTime }}</p>
                                    <p><strong>Open Days:</strong> {{ $pharmacy->openDays }}</p>
                                    <p><strong>Description:</strong> {{ $pharmacy->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!--blog-section end-->


        </div><!-- site-main end-->

@endsection

@push('js')

<script>
    function initMap() {
        // Set default center location (Example: Colombo, Sri Lanka)
        var mapCenter = { lat: 6.9271, lng: 79.8612 };

        // Create the map
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: mapCenter
        });

        // Locations array from Laravel data
        var locations = @json($local_pharmacies);

        // Loop through locations and add markers
        locations.forEach(function(pharmacy) {
            geocodeAddress(pharmacy.location, map, pharmacy.name);
        });
    }

    function geocodeAddress(address, map, title) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function(results, status) {
            if (status === 'OK') {
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    title: title
                });

                var infowindow = new google.maps.InfoWindow({
                    content: '<strong>' + title + '</strong><br>' + address
                });

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            } else {
                console.error('Geocode failed: ' + status);
            }
        });
    }
</script>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: { lat: 7.8731, lng: 80.7718 } // Default to Sri Lanka
        });

        var locations = @json($local_pharmacies);

        locations.forEach(function(pharmacy) {
            var marker = new google.maps.Marker({
                position: { lat: parseFloat(pharmacy.latitude), lng: parseFloat(pharmacy.longitude) },
                map: map,
                title: pharmacy.name
            });

            var infoWindow = new google.maps.InfoWindow({
                content: '<h5>' + pharmacy.name + '</h5><p>' + pharmacy.location + '</p>'
            });

            marker.addListener("click", function() {
                infoWindow.open(map, marker);
            });
        });
    }
    </script>



@endpush
