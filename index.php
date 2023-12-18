<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Weather App</title>
    <style>
        .col,
        .col-2,
        .col-1,
        .col-3 {
            background-color: #0802A3;
            border-radius: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .col-1 {
            text-align: center;
        }

        .btn {
            background-color: #D71313;
        }

        body {
            font-size: 20px;
            color: #FFFF00;
        }
    </style>
</head>

<!-- Main decoding -->
<div>

    <?php
    $city = "Dhaka";
    if (isset($_POST['city'])) {
        $city = $_POST['city'];
    }

    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&APPID=b600f96ed988432b7361ea6db0cbcd00";
    $location = file_get_contents($url);
    $location_data = json_decode($location);
    // getting the lat and long of searched city
    $lat = $location_data->coord->lat;
    $lon = $location_data->coord->lon;

    // using the lat and long in the 5day wather api link.
    $api = "https://api.openweathermap.org/data/2.5/forecast?lat=" . $lat . "&lon=" . $lon . "&units=metric&appid=b600f96ed988432b7361ea6db0cbcd00";
    $weather = file_get_contents($api);
    $data = json_decode($weather);

    $country = $data->city->country;
    ?>
</div>

<!-- 5 day decoding -->
<div>
    <?php

    $date1 = substr($data->list[4]->dt_txt, 0, 10);
    $date2 = substr($data->list[12]->dt_txt, 0, 10);
    $date3 = substr($data->list[20]->dt_txt, 0, 10);
    $date4 = substr($data->list[28]->dt_txt, 0, 10);
    $date5 = substr($data->list[36]->dt_txt, 0, 10);

    $temp1 = $data->list[4]->main->temp;
    $temp2 = $data->list[12]->main->temp;
    $temp3 = $data->list[20]->main->temp;
    $temp4 = $data->list[28]->main->temp;
    $temp5 = $data->list[36]->main->temp;

    $weather1 = $data->list[4]->weather[0]->description;
    $weather2 = $data->list[12]->weather[0]->description;
    $weather3 = $data->list[20]->weather[0]->description;
    $weather4 = $data->list[28]->weather[0]->description;
    $weather5 = $data->list[36]->weather[0]->description;

    $icon1 = $data->list[4]->weather[0]->icon;
    $icon2 = $data->list[12]->weather[0]->icon;
    $icon3 = $data->list[20]->weather[0]->icon;
    $icon4 = $data->list[28]->weather[0]->icon;
    $icon5 = $data->list[36]->weather[0]->icon;
    ?>
</div>

<!-- today decoding -->
<div>
    <?php
    $date0 = substr($data->list[1]->dt_txt, 0, 10);
    $temp0 = $data->list[1]->main->temp;
    $humid0 = $data->list[1]->main->humidity;
    $weather0 = $data->list[1]->weather[0]->description;
    $icon0 = $data->list[1]->weather[0]->icon;
    ?>
</div>

<!-- 3hr decoding -->
<div>
    <?php
    $time01 = substr($data->list[1]->dt_txt, 10);
    $time02 = substr($data->list[2]->dt_txt, 10);
    $time03 = substr($data->list[3]->dt_txt, 10);
    $time04 = substr($data->list[4]->dt_txt, 10);
    $time05 = substr($data->list[5]->dt_txt, 10);
    $time06 = substr($data->list[6]->dt_txt, 10);
    $time07 = substr($data->list[7]->dt_txt, 10);
    $time08 = substr($data->list[8]->dt_txt, 10);

    $temp01 = $data->list[1]->main->temp;
    $temp02 = $data->list[2]->main->temp;
    $temp03 = $data->list[3]->main->temp;
    $temp04 = $data->list[4]->main->temp;
    $temp05 = $data->list[5]->main->temp;
    $temp06 = $data->list[6]->main->temp;
    $temp07 = $data->list[7]->main->temp;
    $temp08 = $data->list[8]->main->temp;

    $icon01 = $data->list[1]->weather[0]->icon;
    $icon02 = $data->list[2]->weather[0]->icon;
    $icon03 = $data->list[3]->weather[0]->icon;
    $icon04 = $data->list[4]->weather[0]->icon;
    $icon05 = $data->list[5]->weather[0]->icon;
    $icon06 = $data->list[6]->weather[0]->icon;
    $icon07 = $data->list[7]->weather[0]->icon;
    $icon08 = $data->list[8]->weather[0]->icon;
    ?>
</div>

<body style="background-color: #FF7676;">
    <div class="m-3 px-3">
        <h1 class="h1 m-3 p-3 text-center">Weather Mania</h1>




        <!-- current forecast -->
        <div class="row g-3 m-3">
            <h2>Now Mania :</h2>
            <div class="col-3 container mx-2 py-3">
                <div>
                    Date:
                    <?php
                    echo $date0;
                    ?>
                </div>
                <div>
                    Temp:
                    <?php
                    echo $temp0 . "&deg C";
                    ?>
                </div>
                <div>
                    Humidity:
                    <?php
                    echo $humid0 . "%";
                    ?>
                </div>
                <div>
                    Weather:
                    <?php
                    echo $weather0 . ' ';
                    echo "<img src=http://openweathermap.org/img/w/" . $icon0 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time01;
                    ?>
                </div>
                <div>
                    <?php
                    echo $temp01 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon01 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time02;
                    ?>
                </div>
                <div>
                    <?php
                    echo $temp02 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon02 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time03;
                    ?>
                </div>
                <div>
                    <?php
                    echo $temp03 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon03 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time04;
                    ?>
                </div>
                <div>
                    <?php
                    echo $temp04 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon04 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time05;
                    ?>
                </div>
                <div>
                    <?php
                    echo $temp05 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon05 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time06;
                    ?>
                </div>
                <div>
                    <?php
                    echo $temp06 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon06 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time07;
                    ?>
                </div>
                <div>
                    <?php
                    echo $temp07 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon07 . ".png>";
                    ?>
                </div>
            </div>

            <div class="col-1 container mx-2 py-3">
                <div>
                    <?php
                    echo $time08;
                    ?>

                </div>
                <div>
                    <?php
                    echo $temp08 . "&deg C";
                    ?>
                </div>
                <div>
                    <?php
                    echo "<br><img src=http://openweathermap.org/img/w/" . $icon08 . ".png>";
                    ?>
                </div>
            </div>


        </div>



        <!-- 5 day forecast -->
        <div class="row g-3 m-3">
            <h2> Next Mania :</h2>
            <!-- Day 1 -->
            <div class="col container mx-2 py-3">
                <div>
                    Date:
                    <?php
                    echo $date1;
                    ?>
                </div>
                <div>
                    Temp:
                    <?php
                    echo $temp1 . "&deg C";
                    ?>
                </div>
                <div>
                    Weather:
                    <?php
                    echo $weather1 . ' ';
                    echo "<img src=http://openweathermap.org/img/w/" . $icon1 . ".png>";
                    ?>
                </div>
            </div>
            <!-- Day 2 -->
            <div class="col container mx-2 py-3">
                <div>
                    Date:
                    <?php
                    echo $date2;
                    ?>
                </div>
                <div>
                    Temp:
                    <?php
                    echo $temp2 . "&deg C";
                    ?>
                </div>
                <div>
                    Weather:
                    <?php
                    echo $weather2;
                    echo "<img src=http://openweathermap.org/img/w/" . $icon2 . ".png>";
                    ?>
                </div>
            </div>
            <!-- Day 3 -->
            <div class="col container mx-2 py-3">
                <div>
                    Date:
                    <?php
                    echo $date3;
                    ?>
                </div>
                <div>
                    Temp:
                    <?php
                    echo $temp3 . "&deg C";
                    ?>
                </div>
                <div>
                    Weather:
                    <?php
                    echo $weather3;
                    echo "<img src=http://openweathermap.org/img/w/" . $icon3 . ".png>";
                    ?>
                </div>
            </div>

            <!-- Day 4 -->
            <div class="col container mx-1 py-3">
                <div>
                    Date:
                    <?php
                    echo $date4;
                    ?>
                </div>
                <div>
                    Temp:
                    <?php
                    echo $temp4 . "&deg C";
                    ?>
                </div>
                <div>
                    Weather:
                    <?php
                    echo $weather4 . ' ';
                    echo "<img src=http://openweathermap.org/img/w/" . $icon4 . ".png>";
                    ?>
                </div>
            </div>

            <!-- Day 5 -->
            <div class="col container mx-2 py-3">
                <div>
                    Date:
                    <?php
                    echo $date5;
                    ?>
                </div>
                <div>
                    Temp:
                    <?php
                    echo $temp5 . "&deg C";
                    ?>
                </div>
                <div>
                    Weather:
                    <?php
                    echo $weather5 . ' ';
                    echo "<img src=http://openweathermap.org/img/w/" . $icon5 . ".png>";
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Search country -->
    <div class="row g-3 m-3">
        <div class="col-4">.</div>
        <div class="col-4 mx-2 py-3">
            <div class="form-floating mb-3 px-5">
                <form action="index.php" method="POST">
                    <div>
                        <label for="city" class="form-label mt-3">Search Country</label>
                        <input type="text" name="city" class="form-control">
                    </div>

                    <div class="row-cols-2 text-center mt-4">
                        <input class="btn" type="submit" value="Search">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>