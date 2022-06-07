<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--Custom CSS-->
    <link rel="stylesheet" href="{% static 'css/stylesheet.css'%}" type="text/css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            padding: 50px;
        }

        .card {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            padding: 14px 80px 18px 36px;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .card h3 {
            font-weight: 600;
        }

        .card img {
            position: absolute;
            top: 20px;
            right: 15px;
            max-height: 120px;
        }

        .card-1 {
            background-image: url(https://ionicframework.com/img/getting-started/ionic-native-card.png);
            background-repeat: no-repeat;
            background-position: right;
            background-size: 80px;
        }

        .card-2 {
            background-image: url(https://ionicframework.com/img/getting-started/components-card.png);
            background-repeat: no-repeat;
            background-position: right;
            background-size: 80px;
        }

        .card-3 {
            background-image: url(https://ionicframework.com/img/getting-started/theming-card.png);
            background-repeat: no-repeat;
            background-position: right;
            background-size: 80px;
        }

        @media(max-width: 990px) {
            .card {
                margin: 20px;
            }
        }

    </style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-1">
                    <button class="btn btn-success" type="button">
                        <h3>Start Track </h3>
                    </button>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-2">
                    <button class="btn btn-warning" type="button">
                        <h3>Stop Track </h3>
                    </button>

                </div>
            </div>
            <div class="col-md-4" id="send">
                <div class="card card-3">
                        <button class="btn btn-danger" type="submit" id="click_btn">
                            <h3>Send Alert</h3>
                        </button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-3" id="cardd">

                    <form action="cordinate" method="post">
                        @csrf
                        <input type="text" name="longitude" id="long" value="" hidden>
                        <input type="text" name="latitude" id="lat" value="" hidden>
                        <button class="btn btn-danger" type="submit" id="find_btn">
                            <h3>Send Alert</h3>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        $("#cardd").hide();
        $("#click_btn").click(function() { //user clicks button
            if ("geolocation" in navigator) { //check geolocation available
                //try to get user current location using getCurrentPosition() method
                navigator.geolocation.getCurrentPosition(function(position) {

                    var longituted = position.coords.longitude;
                    var latitude = position.coords.latitude;

                    $("#long").val(longituted);
                    $("#lat").val(latitude);

                    $("#cardd").show();
                    $("#send").hide();


                    // $("#result").html("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                });
            } else {
                console.log("Browser doesn't support geolocation!");
            }
        });

    </script>
</body>
</html>
