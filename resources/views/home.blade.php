<!DOCTYPE HTML>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="http://www.webglearth.com/v2/api.js"></script>
    <script>
      function initialize() {
        var earth = new WE.map('earth_div');
        earth.setView([46.8011, 8.2266], 2);
        WE.tileLayer('http://data.webglearth.com/natural-earth-color/{z}/{x}/{y}.jpg', {
          tileSize: 256,
          bounds: [[-85, -180], [85, 180]],
          minZoom: 0,
          maxZoom: 16,
          attribution: 'WebGLEarth example',
          tms: true
        }).addTo(earth);

        var marker = WE.marker([51.5, -0.09]).addTo(earth);
        marker.bindPopup("<b>Hello world!</b><br>I am a popup.<br /><span style='font-size:10px;color:#999'>Tip: Another popup is hidden in Cairo..</span><button id='clickMe'>Click me</button>", {maxWidth: 150, closeButton: true}).openPopup();

        var marker2 = WE.marker([30.058056, 31.228889]).addTo(earth);
        marker2.bindPopup("<b>Cairo</b><br>Yay, you found me!", {maxWidth: 120, closeButton: false});

        var markerCustom = WE.marker([50, -9], '/img/logo-webglearth-white-100.png', 100, 24).addTo(earth);

      }

    </script>
    <style>
      html, body{padding: 0; margin: 0; background-color: black;}
      #earth_div{top: 0; right: 0; bottom: 0; left: 0; position: absolute !important;}
    </style>
    <style type="text/css">
      html, body{padding: 0; margin: 0;}
      #earth_div{top: 0; right: 0; bottom: 0; left: 0;
                 position: absolute !important;
                 background-image: -webkit-gradient(
                   linear,
                   left bottom,
                   left top,
                   color-stop(0, rgb(253,253,253)),
                   color-stop(0.15, rgb(253,253,253)),
                   color-stop(0.53, rgb(223,223,223)),
                   color-stop(0.56, rgb(255,255,255)),
                   color-stop(1, rgb(253,253,253))
                   );
                 background-image: -moz-linear-gradient(
                   center bottom,
                   rgb(253,253,253) 0%,
                   rgb(253,253,253) 15%,
                   rgb(223,223,223) 53%,
                   rgb(255,255,255) 56%,
                   rgb(253,253,253) 100%
                   );
      }
    </style>
    <title>WebGL Earth API: Custom Tiles</title>
  </head>
  <body onload="initialize()">
    <div id="earth_div"></div>
  </body>


</html>