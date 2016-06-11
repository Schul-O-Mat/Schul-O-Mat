<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css"/>
    <link rel="stylesheet" href="/sass/app.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf8">
    <title>Schul-O-Mat | Details</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#!" class="brand-logo">Schul'O'Mat</a>
            <ul class="right hide-on-med-and-down">
                <li><a href=""><i class="material-icons">search</i></a></li>
                <li><a href=""><i class="material-icons dropdown-button" data-activates='dropdown'>more_vert</i></a></li>
            </ul>
            <ul id='dropdown' class='dropdown-content text-blue'>
                <li><a href="#!">Login</a></li>
                <li><a href="#!">Register</a></li>
                <li class="divider"></li>
                <li><a href="#!">Swag</a></li>
            </ul>
            <ul class="left hide-on-med-and-down">
                <li><a href="master.html"><i class="material-icons">arrow_back</i></a></li>
            </ul>

        </div>
    </nav>
    <header class="center-align">
        <h3>{{$schule->bezeichnung->schulbez1}}</h3>
        <h3>{{$schule->bezeichnung->schulbez2}}</h3>
        <h3>{{$schule->bezeichnung->schulbez3}}</h3>
        <h4>{{$schule->bezeichnung->kurzbez}}</h4>
    </header>
    <main>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3">
                        <a class="active" href="#facts">Facts</a>
                    </li>
                    <li class="tab col s3">
                        <a href="#questions">Fragebogen</a>
                    </li>
                    <li class="tab col s3">
                        <a href="#redaction">Redaktionell</a>
                    </li>

                </ul>
            </div>

            <div id="facts" class="col s12">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card">
                            <div class=" card-content">
                                <span class="card-title ">Kontakt</span>
                                <h6>Steinbart Gymnasium</h6>
                                <p>Realschulstraße 45</p>
                                <p>47051 Duisburg</p>
                                <br>
                                <p>Email: <a href="#">{{ $schule->kontakt->mail }}</a></p>
                                <p>Telefon: <a href="#">{{ $schule->kontakt->telefonnr }}</a></p>
                                <p>Telefax: <a href="#">{{ $schule->kontakt->faxnr }}</a></p>

                            </div>
                            <div class="card-action ">
                                <a href="# ">Öffne mit Maps</a>
                                <a href="# ">Irgendwas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 "></div>
                </div>
                <div id="map"></div>
<script type="text/javascript">
    var convertedValues = gk2geo({{$hochwert}}, {{$rechtswert}});
    function addMarker(lat, lng, description) {
        L.marker([lat, lng]).addTo(map)
        .bindPopup(description)
        .openPopup();
    };
    function openMap(lat, lng) {
        var map = L.map('map').setView([lat, lng], 13);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map); 
    };
    openMap(convertedValues[0], convertedValues[1]);
    addMarker(convertedValues[0], convertedValues[1], "Die Schule!")
    
    // COPY & PASTE
        
function gk2geo(rw, hw) {
/* Copyright (c) 2006, HELMUT H. HEIMEIER
   Permission is hereby granted, free of charge, to any person obtaining a
   copy of this software and associated documentation files (the "Software"),
   to deal in the Software without restriction, including without limitation
   the rights to use, copy, modify, merge, publish, distribute, sublicense,
   and/or sell copies of the Software, and to permit persons to whom the
   Software is furnished to do so, subject to the following conditions:
   The above copyright notice and this permission notice shall be included
   in all copies or substantial portions of the Software.*/

/* Die Funktion wandelt GK Koordinaten in geographische Koordinaten
   um. Rechtswert rw und Hochwert hw müssen gegeben sein.
   Berechnet werden geographische Länge lp und Breite bp
   im Potsdam Datum.*/

// Rechtswert rw und Hochwert hw im Potsdam Datum
   if (rw == "" || hw == "")
   {
   lp = "";
   bp = "";
   return;
   }
   rw = parseFloat(rw);
   hw = parseFloat(hw);

//  Potsdam Datum
// Große Halbachse a und Abplattung f
   a = 6377397.155;
   f = 3.34277321e-3;
   pi = Math.PI;

// Polkrümmungshalbmesser c
   c = a/(1-f);

// Quadrat der zweiten numerischen Exzentrizität
   ex2 = (2*f-f*f)/((1-f)*(1-f));
   ex4 = ex2*ex2;
   ex6 = ex4*ex2;
   ex8 = ex4*ex4;

// Koeffizienten zur Berechnung der geographischen Breite aus gegebener
// Meridianbogenlänge
   e0 = c*(pi/180)*(1 - 3*ex2/4 + 45*ex4/64 - 175*ex6/256 + 11025*ex8/16384);
   f2 =   (180/pi)*(    3*ex2/8 - 3*ex4/16  + 213*ex6/2048 -  255*ex8/4096);
   f4 =              (180/pi)*(  21*ex4/256 -  21*ex6/256  +  533*ex8/8192);
   f6 =                           (180/pi)*(  151*ex6/6144 -  453*ex8/12288);

// Geographische Breite bf zur Meridianbogenlänge gf = hw
   sigma = hw/e0;
   sigmr = sigma*pi/180;
   bf = sigma + f2*Math.sin(2*sigmr) + f4*Math.sin(4*sigmr)
      + f6*Math.sin(6*sigmr);

// Breite bf in Radianten
   br = bf * pi/180;
   tan1 = Math.tan(br);
   tan2 = tan1*tan1;
   tan4 = tan2*tan2;

   cos1 = Math.cos(br);
   cos2 = cos1*cos1;

   etasq = ex2*cos2;

// Querkrümmungshalbmesser nd
   nd = c/Math.sqrt(1 + etasq);
   nd2 = nd*nd;
   nd4 = nd2*nd2;
   nd6 = nd4*nd2;
   nd3 = nd2*nd;
   nd5 = nd4*nd;

//  Längendifferenz dl zum Bezugsmeridian lh
   kz = parseInt(rw/1e6);
   lh = kz*3
   dy = rw-(kz*1e6+500000);
   dy2 = dy*dy;
   dy4 = dy2*dy2;
   dy3 = dy2*dy;
   dy5 = dy4*dy;
   dy6 = dy3*dy3;

   b2 = - tan1*(1+etasq)/(2*nd2);
   b4 =   tan1*(5+3*tan2+6*etasq*(1-tan2))/(24*nd4);
   b6 = - tan1*(61+90*tan2+45*tan4)/(720*nd6);

   l1 =   1/(nd*cos1);
   l3 = - (1+2*tan2+etasq)/(6*nd3*cos1);
   l5 =   (5+28*tan2+24*tan4)/(120*nd5*cos1);

// Geographischer Breite bp und Länge lp als Funktion von Rechts- und Hochwert
   bp = bf + (180/pi) * (b2*dy2 + b4*dy4 + b6*dy6);
   lp = lh + (180/pi) * (l1*dy  + l3*dy3 + l5*dy5);

   if (lp < 5 || lp > 16 || bp < 46 || bp > 56)
   {
   alert("RW und/oder HW ungültig für das deutsche Gauss-Krüger-System");
   lp = "";
   bp = "";
   }
   return [lp, bp];
}
</script>
            </div>
            <div id="questions " class="col s12 ">
                <div class="collection">
                    <div class="collection-item">
                        <p>Wie findest du deine Schule?</p>
                        <div class="progress">
                            <div class="determinate" style="width: 70%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="redaction " class="col s12 ">Redaktionelle Inhalte...</div>

        </div>
    </main>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript " src="https://code.jquery.com/jquery-2.1.1.min.js "></script>
    <script type="text/javascript " src="/js/bin/materialize.js "></script>
    <script type="text/javascript" src="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js"></script>
    <script>
        $(document).ready(function () {
            $('ul.tabs').tabs();
        });
    </script>
</body>

</html>
