@include('includes/header')
@include('includes/top-nav')
@include('includes/left-nav')


<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">FisherMen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">FisherMen</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                FisherMen Information
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Next of Kin Number</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Next of Kin Number</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($fisherManData as $key => $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->p_number }}</td>
                            <td>{{ $value->next_of_kin }}</td>
                            <td>
                                <input type="text" id="longit" value="{{ $value->longit }}">
                                <input type="text" id="latit" value="{{ $value->latit }}">
                            </td>
                            <td>
                                <button class="btn btn-warning" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                <button class="btn btn-dark" type="button"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <button class="btn btn-primary my_location" type="button" data-toggle="modal" data-target="#maps{{$value->fisher_id}}"><i class="fa fa-globe" aria-hidden="true"></i></button>
                            </td>
                        </tr>

                        <div id="maps{{ $value->fisher_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="my-modal-title">Location</h5>
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="map"></div>
                                    </div>
                                    <div class="modal-footer">
                                        Footer
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    var map;
    function initMap() {
        map = new google.maps.Map($("#map")[0], {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
          });
    }

    $(".my_location").click(function (){ //user click on button
        if ("geolocation" in navigator){
                navigator.geolocation.getCurrentPosition(show_location, show_error, {timeout:1000, enableHighAccuracy: true}); //position request
            }else{
                console.log("Browser doesn't support geolocation!");
        }
    });

    //Success Callback
    function show_location(position){
        var langit = ("#langit").value()
        var latit = ("#latit").value()
        console.log("cool")
        infoWindow = new google.maps.InfoWindow({map: map});
        var pos = {lat: position.coords.latit, lng: position.coords.langit};
        infoWindow.setPosition(pos);
        infoWindow.setContent('User Location found.');
        map.setCenter(pos);
    }

    //Error Callback
    function show_error(error){
       switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("Permission denied by user.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location position unavailable.");
                break;
            case error.TIMEOUT:
                alert("Request timeout.");
                break;
            case error.UNKNOWN_ERROR:
                alert("Unknown error.");
                break;
        }
    }
    </script>
   <script
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly"
   defer
 ></script>



@include('includes/footer')
