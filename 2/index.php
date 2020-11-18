<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>2</title>
</head>
<body>
    
<div id="main" class="container">
    <div class="row">
    <form action="index.php" method="POST">
        <label for="fname">data:</label>
    <input type="text" id="input" name="input"><br><br>
    <input type="submit" name="submit" value="submit">
    </form>
    </div>
    <div class="row">
        
        <?php
            if(isset($_POST['submit'])) {
                $input = $_POST['input'];
                echo '<p>'.$input.'</p>';
                $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
                $response = file_get_contents($url);
                $result = json_decode($response);
                $track = $result -> tracks;
                $items = $track -> items;
                foreach ($items as $info) {
                    $album = $info -> album;
                    $album_type = $album -> album_type;
    
                    $images = $album -> images[0] -> url;
                    $name = $album -> name;
                    $artist = $album -> artists[0] -> name;
                    $rele = $album -> release_date;
                    $market = $album -> available_markets;
                    $lenMarket = count($market);
                    $check = explode(" ", $artist);
                    echo $check[0];
                    if ($name == $input || $input == $artist) {
                        //echo '<img src="'.$images.'" alt="">';
                        echo '<div class="col-4" style="margin-bottom: 1%" >
                            <div class="card">
                            <img class="card-img-top" src="'.$images.'" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"><b>'.$name.'</b></p>
                                <p class="card-text">Artist: '.$artist.'</p>
                                <p class="card-text">Release date: '.$rele.'</p>
                                <p class="card-text">Avaliable: '.$lenMarket.' countries</p>
                            </div>
                        </div>
                      </div>';
                    }
                }
            
            } else {
            
            $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
            $response = file_get_contents($url);
            $result = json_decode($response);
            $track = $result -> tracks;
            $items = $track -> items;

            foreach ($items as $info) {
                $album = $info -> album;
                $album_type = $album -> album_type;

                $images = $album -> images[0] -> url;
                $name = $album -> name;
                $artist = $album -> artists[0] -> name;
                $rele = $album -> release_date;
                $market = $album -> available_markets;
                $lenMarket = count($market);
                //echo '<img src="'.$images.'" alt="">';
                echo '<div class="col-4" style="margin-bottom: 1%" >
                    <div class="card">
                    <img class="card-img-top" src="'.$images.'" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"><b>'.$name.'</b></p>
                        <p class="card-text">Artist: '.$artist.'</p>
                        <p class="card-text">Release date: '.$rele.'</p>
                        <p class="card-text">Avaliable: '.$lenMarket.' countries</p>
                    </div>
                </div>
              </div>';
            }
        }

        ?>
    </div>
        
    </div>
</body>
</html>