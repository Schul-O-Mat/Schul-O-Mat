@extends("layouts.app")

@section("css")
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {

    function gk2geo(rw, hw, callback)
    {
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
       callback(bp, lp);
       return;
    }
    var GKRight = parseInt({{$rechtswert}});
    GKRight = GKRight/10
    var GKHeight = parseInt({{$hochwert}});
    GKHeight = GKHeight/10
    //Umrechnung
    gk2geo(GKRight, GKHeight, function(lat, long) {
      var map = L.map('map').setView(L.latLng(lat, long), 15);

      L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      //L.marker(newcoords).addTo(map);

    });


  }, false);
  </script>
@endsection

@section("main")
  <h1>Map-Test</h1>
  <div id="map" class="height: 600px; width: 800px;">
  </div>
@endsection
