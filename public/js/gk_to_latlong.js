function GetFloatFromString(SingleValue) {
    if (isNaN(SingleValue) == 0)
    {
        return(parseFloat(SingleValue));
    }
    else
    {
        var StrSplitted;
        StrSplitted = SingleValue.split(",");
        return(parseFloat(StrSplitted[0] + "." + StrSplitted[1]));
    }
}

function CalcStart_onclick() {

//Falls nicht alle GK-Werte eingegeben wurden -> Meldung, Verlassen
    if (!((GKRight > 1000000) && (GKHeight > 1000000)))
    {
        window.alert("Es wurde kein gültiger Gauß-Krüger-Code eingegeben. Bitte überprüfen Sie Ihre Eingaben!");
        return;
    }
    var bII, bf, co, g2, g1, t, fa, dl, min, sek, rho, e2 = 0.0067192188, c = 6398786.849;
    rho = 180 / Math.PI;

    bII = (GKHeight / 10000855.7646) * (GKHeight / 10000855.7646);

    bf = 325632.08677 * (GKHeight / 10000855.7646) * ((((((0.00000562025 * bII + 0.00022976983) * bII - 0.00113566119) * bII + 0.00424914906) * bII - 0.00831729565) * bII + 1));

    bf /= 3600 * rho;

    co = Math.cos(bf);

    g2 = e2 * (co * co);

    g1 = c / Math.sqrt(1 + g2);

    t = Math.tan(bf);

    fa = (GKRight - Math.floor(GKRight / 1000000) * 1000000 - 500000) / g1;

    document.getElementbyId("GeoDezRight").value = ((bf - fa * fa * t * (1 + g2) / 2 + fa * fa * fa * fa * t * (5 + 3 * t * t + 6 * g2 - 6 * g2 * t * t) / 24) * rho);

    dl = fa - fa * fa * fa * (1 + 2 * t * t + g2) / 6 + fa * fa * fa * fa * fa * (1 + 28 * t * t + 24 * t * t * t * t) / 120;

    document.CalcForm.GeoDezHeight_TXT.value = dl * rho / co + Math.floor(document.getElementbyId("GeoDezRight").value / 1000000) * 3;

    if (document.CalcForm.GeoSystemEll.value == "WGS84")
    {
        var CartesianXMeters, CartesianYMeters, CartesianZMeters, n, aBessel = 6377397.155, eeBessel = 0.0066743722296294277832, CartOutputXMeters, CartOutputYMeters, CartOutputZMeters, ScaleFactor = 0.00000982, RotXRad = -7.16069806998785E-06, RotYRad = 3.56822869296619E-07, RotZRad = 7.06858347057704E-06, ShiftXMeters = 591.28, ShiftYMeters = 81.35, ShiftZMeters = 396.39, aWGS84 = 6378137, eeWGS84 = 0.0066943799;
        var Latitude, LatitudeIt;

        document.getElementbyId("GeoDezRight").value = (parseFloat(document.getElementbyId("GeoDezRight").value) / 180) * Math.PI;
        document.CalcForm.GeoDezHeight_TXT.value = (parseFloat(document.CalcForm.GeoDezHeight_TXT.value) / 180) * Math.PI;

        n = eeBessel * Math.sin(parseFloat(document.getElementbyId("GeoDezRight").value)) * Math.sin(parseFloat(document.getElementbyId("GeoDezRight").value));
        n = 1 - n;
        n = Math.sqrt(n)
        n = aBessel / n
        //window.alert(n);
        CartesianXMeters = n * Math.cos(parseFloat(document.getElementbyId("GeoDezRight").value)) * Math.cos(parseFloat(document.CalcForm.GeoDezHeight_TXT.value));
        CartesianYMeters = n * Math.cos(parseFloat(document.getElementbyId("GeoDezRight").value)) * Math.sin(parseFloat(document.CalcForm.GeoDezHeight_TXT.value));
        CartesianZMeters = n * (1 - eeBessel) * Math.sin(parseFloat(document.getElementbyId("GeoDezRight").value));
        //window.alert(CartesianXMeters);
        //window.alert(CartesianYMeters);
        //window.alert(CartesianZMeters);

        CartOutputXMeters = (1 + ScaleFactor) * CartesianXMeters + RotZRad * CartesianYMeters - RotYRad * CartesianZMeters + ShiftXMeters;
        CartOutputYMeters = -RotZRad * CartesianXMeters + (1 + ScaleFactor) * CartesianYMeters + RotXRad * CartesianZMeters + ShiftYMeters;
        CartOutputZMeters = RotYRad * CartesianXMeters - RotXRad * CartesianYMeters + (1 + ScaleFactor) * CartesianZMeters + ShiftZMeters;
        //window.alert("Transformed:");
        //window.alert(CartOutputXMeters);
        //window.alert(CartOutputYMeters);
        //window.alert(CartOutputZMeters);

        document.CalcForm.GeoDezHeight_TXT.value = Math.atan((CartOutputYMeters / CartOutputXMeters));

        Latitude = (CartOutputXMeters * CartOutputXMeters) + (CartOutputYMeters * CartOutputYMeters);
        Latitude = Math.sqrt(Latitude);
        Latitude = CartOutputZMeters / Latitude;
        //window.alert("First");
        Latitude =  Math.atan(Latitude);
        //window.alert(Latitude);
        LatitudeIt = 99999999;
        do
        {
            LatitudeIt = Latitude;

            n = 1 - eeWGS84 * Math.sin(Latitude) * Math.sin(Latitude);
            n = Math.sqrt(n);
            n = aWGS84 / n;
            Latitude = CartOutputXMeters * CartOutputXMeters + CartOutputYMeters * CartOutputYMeters;
            Latitude = Math.sqrt(Latitude);
            Latitude = (CartOutputZMeters + eeWGS84 * n * Math.sin(LatitudeIt)) / Latitude;
            //window.alert("Atan-Test");
            //window.alert(Latitude);
            Latitude = Math.atan(Latitude);
            //window.alert(Latitude);
        }
        while (Math.abs(Latitude - LatitudeIt) >= 0.000000000000001);

        document.getElementbyId("GeoDezRight").value = (Latitude / Math.PI) * 180;
        document.CalcForm.GeoDezHeight_TXT.value = (parseFloat(document.CalcForm.GeoDezHeight_TXT.value) / Math.PI) * 180;
    }

    if (document.CalcForm.GeoSystemEll.value == "GRS80")
    {
        var CartesianXMeters, CartesianYMeters, CartesianZMeters, n, aBessel = 6377397.155, eeBessel = 0.0066743722296294277832, CartOutputXMeters, CartOutputYMeters, CartOutputZMeters, ScaleFactor = 0.00000982, RotXRad = -7.16069806998785E-06, RotYRad = 3.56822869296619E-07, RotZRad = 7.06858347057704E-06, ShiftXMeters = 591.28, ShiftYMeters = 81.35, ShiftZMeters = 396.39, aGRS80 = 6378137, eeGRS80 = 0.00669438002290;
        var Latitude, LatitudeIt;

        document.getElementbyId("GeoDezRight").value = (parseFloat(document.getElementbyId("GeoDezRight").value) / 180) * Math.PI;
        document.CalcForm.GeoDezHeight_TXT.value = (parseFloat(document.CalcForm.GeoDezHeight_TXT.value) / 180) * Math.PI;

        n = eeBessel * Math.sin(parseFloat(document.getElementbyId("GeoDezRight").value)) * Math.sin(parseFloat(document.getElementbyId("GeoDezRight").value));
        n = 1 - n;
        n = Math.sqrt(n)
        n = aBessel / n
        //window.alert(n);
        CartesianXMeters = n * Math.cos(parseFloat(document.getElementbyId("GeoDezRight").value)) * Math.cos(parseFloat(document.CalcForm.GeoDezHeight_TXT.value));
        CartesianYMeters = n * Math.cos(parseFloat(document.getElementbyId("GeoDezRight").value)) * Math.sin(parseFloat(document.CalcForm.GeoDezHeight_TXT.value));
        CartesianZMeters = n * (1 - eeBessel) * Math.sin(parseFloat(document.getElementbyId("GeoDezRight").value));
        //window.alert(CartesianXMeters);
        //window.alert(CartesianYMeters);
        //window.alert(CartesianZMeters);

        CartOutputXMeters = (1 + ScaleFactor) * CartesianXMeters + RotZRad * CartesianYMeters - RotYRad * CartesianZMeters + ShiftXMeters;
        CartOutputYMeters = -RotZRad * CartesianXMeters + (1 + ScaleFactor) * CartesianYMeters + RotXRad * CartesianZMeters + ShiftYMeters;
        CartOutputZMeters = RotYRad * CartesianXMeters - RotXRad * CartesianYMeters + (1 + ScaleFactor) * CartesianZMeters + ShiftZMeters;
        //window.alert("Transformed:");
        //window.alert(CartOutputXMeters);
        //window.alert(CartOutputYMeters);
        //window.alert(CartOutputZMeters);

        document.CalcForm.GeoDezHeight_TXT.value = Math.atan((CartOutputYMeters / CartOutputXMeters));

        Latitude = (CartOutputXMeters * CartOutputXMeters) + (CartOutputYMeters * CartOutputYMeters);
        Latitude = Math.sqrt(Latitude);
        Latitude = CartOutputZMeters / Latitude;
        //window.alert("First");
        Latitude =  Math.atan(Latitude);
        //window.alert(Latitude);
        LatitudeIt = 99999999;
        do
        {
            LatitudeIt = Latitude;

            n = 1 - eeGRS80 * Math.sin(Latitude) * Math.sin(Latitude);
            n = Math.sqrt(n);
            n = aGRS80 / n;
            Latitude = CartOutputXMeters * CartOutputXMeters + CartOutputYMeters * CartOutputYMeters;
            Latitude = Math.sqrt(Latitude);
            Latitude = (CartOutputZMeters + eeGRS80 * n * Math.sin(LatitudeIt)) / Latitude;
            //window.alert("Atan-Test");
            //window.alert(Latitude);
            Latitude = Math.atan(Latitude);
            //window.alert(Latitude);
        }
        while (Math.abs(Latitude - LatitudeIt) >= 0.000000000000001);

        document.getElementbyId("GeoDezRight").value = (Latitude / Math.PI) * 180;
        document.CalcForm.GeoDezHeight_TXT.value = (parseFloat(document.CalcForm.GeoDezHeight_TXT.value) / Math.PI) * 180;
    }
    document.CalcForm.GeoDezRightStr_TXT.value = GetGeoStringFromGeoDez(parseFloat(document.getElementbyId("GeoDezRight").value));
    document.CalcForm.GeoDezHeightStr_TXT.value = GetGeoStringFromGeoDez(parseFloat(document.CalcForm.GeoDezHeight_TXT.value));
}

function GetGeoStringFromGeoDez(GeoDez) {
    var SecondsAbs, ShortedSecondsRest;
    SecondsAbs = (GeoDez - Math.floor(GeoDez) - Math.floor((GeoDez - Math.floor(GeoDez)) * 60) / 60) * 60 * 60;
    ShortedSecondsRest = SecondsAbs - Math.floor(SecondsAbs)
    SecondsAbs = Math.floor(SecondsAbs)
    ShortedSecondsRest = Math.floor(ShortedSecondsRest * 100) // -> Zwei Stellen
    return(Math.floor(GeoDez) + "°" + Math.floor((GeoDez - Math.floor(GeoDez)) * 60) + "'" + SecondsAbs + "." + ShortedSecondsRest + '"');
}

function MapQuestShow_onclick() {
    document.CalcForm.GeoSystemEll.value = "WGS84";
    CalcStart_onclick();
    var URLtarget;
    if ((parseInt(document.getElementbyId("GeoDezRight").value) > 1000000) && (parseInt(document.getElementbyId("GeoDezHight").value) > 1000000))
    {
        URLtarget = "http://www.mapquest.com/maps/map.adp?latlongtype=decimal&latitude=" + GetFloatFromString(document.getElementbyId("GeoDezRight").value) + "&longitude=" + GetFloatFromString(document.CalcForm.GeoDezHeight_TXT.value) + "&zoom=8&size=big&style=RARE";
        if (msieversion() >= 3)
        {
            document.CalcForm.MapQuestShow.value = "(Wird geladen ...)";
            document.title = "Lade MapQuest-Karte...";
            window.url = URLtarget;
            window.navigate(URLtarget);
        }
        else
        {
            window.open(URLtarget);
        }
    }
}

function msieversion()
// Return Microsoft Internet Explorer (major) version number, or 0 for others.
// This function works by finding the "MSIE " string and extracting the version number
// following the space, up to the decimal point for the minor version, which is ignored.
{
    var ua = window.navigator.userAgent
    var msie = ua.indexOf ( "MSIE " )
    if (msie >= 0)        // is Microsoft Internet Explorer; return version number
    {
        return parseInt(ua.substring(msie + 5, ua.indexOf (".", msie)));
    }
    else
    {
        return(0);    // is other browser
    }
}

function GKall_TXT_onchange() {
    var GKall;
    GKall = document.CalcForm.GKall_TXT.value;

    if (GKall.length > 6)
    {
        document.getElementbyId("GeoDezRight").value = GKall.slice(0, 6) + "0";
        document.getElementbyId("GeoDezHight").value = GKall.slice(6) + "0";
        document.CalcForm.GKRef_TXT.value = GKall.slice(0, 1) + ". - " + GKall.slice(0, 1) * 3 + "°"
        if (GKall.length == 12)
        {
            document.CalcForm.CalcStart.focus();
        }
    }
    else
    {
        if (GKall.length > 0)
        {
            document.getElementbyId("GeoDezRight").value = GKall + "0";
            document.getElementbyId("GeoDezHight").value = "0";
            document.CalcForm.GKRef_TXT.value = GKall.slice(0, 1) + ". - " + GKall.slice(0, 1) * 3 + "°"
        }
    }
}

function GeoSystemEll_onchange() {
    if (document.CalcForm.GeoDezHeight_TXT.value == "" || document.getElementbyId("GeoDezRight").value == "")
    {
        return;
    }
    CalcStart_onclick();
}

function GKRight_TXT_onchange() {
    var GKRight;
    GKRight = document.getElementbyId("GeoDezRight").value;

    if (GKRight.length >= 1)
    {
        document.CalcForm.GKRef_TXT.value = GKRight.slice(0, 1) + ". - " + GKRight.slice(0, 1) * 3 + "°"
    }
}