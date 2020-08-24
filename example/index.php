<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" href="Favicon.png" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <title>Posta Kodu Öğrenici</title>

        <script>
            var il = "";
            var ilce = "";
            var semt = "";
            var koy = "";

            $(document).ready(function() {
                $.getJSON("api.php", function(data) {
                    $("#il").html("<option>Lütfen İl Seçiniz</option>")
                    $("#adres").html("İl Seçiniz");
                    $.each( data, function(key, val) {
                        $("#il").append("<option id='" + key + "'>" + val + "</option>" );
                    });
                });
            });

            function ilcegetir () {
                $("#ilce").prop("disabled", false);
                $("#semt").prop("disabled", true);
                $("#koy").prop("disabled", true);

                $("#semt").html("");
                $("#koy").html("");

                il = $("#il option:selected").text();
                $.getJSON("api.php?il=" + il, function(data) {
                    $("#adres").html(data[0]);
                    $("#ilce").html("<option>Lütfen İlçe Seçiniz</option>")
                    $.each( data[1], function(key, val) {
                        $("#ilce").append("<option id='" + key + "'>" + val + "</option>" );
                    });
                });
            }

            function semtgetir () {
                $("#semt").prop("disabled", false);
                il = $("#il option:selected").text();
                ilce = $("#ilce option:selected").text();

                $.getJSON("api.php?il=" + il + "&ilce=" + ilce, function(data) {
                    $("#semt").html("<option>Lütfen Semt Seçiniz</option>")
                    $("#adres").html(data[0]);

                    $.each(data[1], function(key, val) {
                        $("#semt").append("<option id='" + key + "'>" + val + "</option>" );
                    });
                });
            }

            function koygetir () {
                $("#koy").prop("disabled", false);
                il = $("#il option:selected").text();
                ilce = $("#ilce option:selected").text();
                semt = $("#semt option:selected").text();

                $.getJSON("api.php?il=" + il + "&ilce=" + ilce + "&semt=" + semt, function(data) {
                    $("#koy").html("");
                    $("#adres").html(data[1]);

                    $.each(data[2], function(key, val) {
                        $("#koy").append("<option id='" + key + "'>" + val + "</option>");
                    });

                    $("#zip").html(data[0]);
                });
            }

            function zip () {
                il = $("#il option:selected").text();
                ilce = $("#ilce option:selected").text();
                semt = $("#semt option:selected").text();
                koy = $("#koy option:selected").attr("id");

                $.getJSON("api.php?il=" + il + "&ilce=" + ilce + "&semt=" + semt + "&koy=" + koy, function(data) {
                    $("#adres").html(data[0]);
                    $("#zip").html(data[1]);
                });
            }
        </script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">Posta Kodunuzu Öğrenin</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/quiec/trzone">Github</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <form action="" method="">
                                    <div class="form-group row">
                                        <label for="il" class="col-md-4 col-form-label text-md-right">İl</label>
                                        <div class="col-md-6">
                                            <select onchange="ilcegetir()" class="form-control" id="il">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ilce" class="col-md-4 col-form-label text-md-right">İlçe</label>
                                        <div class="col-md-6">
                                            <select onchange="semtgetir()" disabled="true" class="form-control" id="ilce">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="semt" class="col-md-4 col-form-label text-md-right">Semt</label>
                                        <div class="col-md-6">
                                            <select onchange="koygetir()" disabled="true" class="form-control" id="semt">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="koy" class="col-md-4 col-form-label text-md-right">Köy</label>
                                        <div class="col-md-6">
                                            <select onchange="zip()" disabled="true" class="form-control" id="koy">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                        <p id="adres"></p>
                                        Sonuç: <p id="zip"></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
