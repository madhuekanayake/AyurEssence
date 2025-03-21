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
                                    <h2 class="title">Herbal Gardens</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Herbal Gardens Map</span>
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
                    @foreach ($herbal_gardens as $garden)
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>
                                        <a href="{{ url('herbalGarden-details/' . $garden->id) }}">{{ $garden->gardenName }}</a>
                                    </h3>
                                    <p><strong>Location:</strong> {{ $garden->gardenLocation }}</p>
                                    <p><strong>Address:</strong> {{ $garden->gardenAddress }}</p>
                                    <p><strong>Phone:</strong> {{ $garden->gardenPhone }}
                                        <a href="{{ route('CustomerLocations.herbalGardensDetails', $garden->id) }}" class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline">
                                            Read More..
                                        </a>
                                    </p>
                                    {{-- <p><strong>Email:</strong> {{ $garden->gardenEmail }}</p>
                                    <p><strong>Open Time:</strong> {{ $garden->gardenOpenTime }}</p>
                                    <p><strong>Close Time:</strong> {{ $garden->gardenCloseTime }}</p>
                                    <p><strong>Local Tiket Price:</strong> {{ $garden->localTicketPrice }}</p>
                                    <p><strong>Foreign Tiket Price:</strong> {{ $garden->foreignTicketPrice }}</p>
                                    <p><strong>Open Days:</strong> {{ $garden->gardenOpenDays }}</p>
                                    <p><strong>Description:</strong> {{ $garden->gardenDescription }}</p> --}}
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
        var locations = @json($herbal_gardens);

        // Loop through locations and add markers
        locations.forEach(function(garden) {
            geocodeAddress(garden.gardenLocation, map, garden.gardenName);
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

        var locations = @json($herbal_gardens);

        locations.forEach(function(garden) {
            var marker = new google.maps.Marker({
                position: { lat: parseFloat(garden.latitude), lng: parseFloat(garden.longitude) },
                map: map,
                title: garden.gardenName
            });

            var infoWindow = new google.maps.InfoWindow({
                content: '<h5>' + garden.gardenName + '</h5><p>' + garden.gardenLocation + '</p>'
            });

            marker.addListener("click", function() {
                infoWindow.open(map, marker);
            });
        });
    }
    </script>



@endpush
