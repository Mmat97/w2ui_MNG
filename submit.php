<?php
if (!empty($_GET['location'])) {
    /**
     * Here we build the url we'll be using to access the google maps api
     */
    $users_url = 'http://127.0.0.1:5000/user/=' . $_GET['location'];
       
    $maps_json = file_get_contents($users_url);
    #need to convert to php array
    $users_array=json_decode($maps_json,true);

/* 

    $maps_array = json_decode($maps_json, true);
    $lat = $maps_array['results'][0]['geometry']['location']['lat'];
    $lng = $maps_array['results'][0]['geometry']['location']['lng'];
   
    $url = 'https://' .
        'api.instagram.com/v1/media/search' .
        '?lat=' . $lat .
        '&lng=' . $lng .
        '&client_id=CLIENT-ID'; //replace "CLIENT-ID"
    $json = file_get_contents($url);
    $array = json_decode($json, true);

*/
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>geogram</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="get">
    <input type="text" name="location"/>
    <button type="submit">Submit</button>
</form>
<br/>
<div id="results" data-url="<?php if (!empty($url)) echo $url ?>">
    <?php
    if (!empty($array)) {
        foreach ($array['data'] as $key => $item) {
            echo '<img id="' . $item['id'] . '" src="' . $item['images']['low_resolution']['url'] . '" alt=""/><br/>';
        }
    }
    ?>
</div>
</body>
</html>
