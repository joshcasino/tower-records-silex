<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/CD.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        $cd1 = new CD("Fugazi","Repeater","img/repeater.jpg",10.99);
        $cd2 = new CD("Fugazi","End Hits","img/endhits.jpg",10.99);
        $cd3 = new CD("Fugazi","Instrument","img/instrument.jpg",10.99);
        $cd4 = new CD("Minor Threat","Complete Discography","img/completediscography.jpg",10.99);
        $cd5 = new CD("Fugazi","13 Songs","img/13songs.jpg",10.99);

        $cds = array($cd1, $cd2, $cd3, $cd4, $cd5);

        $output = "";

        foreach ($cds as $cd) {
            $output = $output . "<div class='row'>
                <div class='col-md-6'>
                    <img src=" . $cd->getCoverArt() . ">
                </div>
                <div class='col-md-6'>
                    <p>" . $cd->getTitle() . "</p>
                    <p>By " . $cd->getArtist() . "</p>
                    <p>$" . $cd->getPrice() . "</p>
                </div>
            </div>
            ";
        }

        return $output;
    });

    return $app;
?>
