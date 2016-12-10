<!DOCTYPE HTML>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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

        var markerCustom = WE.marker([40, -90]).addTo(earth);

        var markerHanoi = WE.marker([21.0277644, 105.834159]).addTo(earth);
        markerHanoi.bindPopup("<b>Hello world!</b><br>Ha Noi<br /><span style='font-size:10px;color:#999'>Tip: Another popup is hidden in Cairo..</span><button id='clickMe'>Click me</button>",{maxWidth: 120, closeButton: true});

      }

    </script>
    <style>
      html, body{padding: 0; margin: 0; background-color: black;}
      #earth_div{top: 0; right: 0; bottom: 0; left: 0; position: absolute !important;}
      
      #information{
        overflow:hidden;
        background-color: blue;
        top: 100px;
        right: 100px;
        height: auto;
      }

      #right-part {
        background-color: transparent;
        width : 32%;
        right: 0px;
        height: 100%;
        position: absolute;
      }

      #right-part .content {
        padding : 10px;
      }

      #right-part .content img{
        width : 100%;
      }

      #left-part {
        background-color: transparent;
        width : 25%;
        left: 0px;
        height: 100%;
        position: absolute; 
      }

    </style>
    <style type="text/css">
      html, body{padding: 0; margin: 0;}
      #earth_div{top: 0px;
                right: 0px;
                left: 0px;
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
  <div>
    <div id="earth_div">
      <div id="left-part">
      </div>
      <div id="right-part">
        <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div id="card" class="weater">
          <div class="city-selected">
            <article>

              <div class="info">
                <div class="city"><span>City:</span>Ha Noi </div>
                <div class="night">Night - 22:07 PM</div>
              </div>

            </article>
            
            <figure style="background-image: url(http://136.243.1.253/~creolitic/bootsnipp/home.jpg)"></figure>
          </div>

          <div class="days">
            <div class="row row-no-gutter">
              <div class="col-md-12">
                <div class="day">
                  <h1>Christmas in Ha Noi</h1>
                </div>
                <div class="content">
                  <p>In South Africa, people celebrate Christmas Day with the family often with a ‘braai’, similar to a BBQ, as it is summer season there as well. Many people visit Christmas mass on Christmas as well.</p>
                  <img src="http://www.kids-world-travel-guide.com/images/500xNxSA_christmas_waterfrontown.jpg.pagespeed.ic.29v0YuY_Dm.jpg" alt="Christmas in Cape Town/South Africa" title="Christmas in Cape Town/South Africa" data-pin-media="http://www.kids-world-travel-guide.com/images/SA_christmas_waterfrontown.jpg">
                  <p>Above you can see the modern Christmas tree in front of the V&A Waterfront Shopping Centre in Cape Town. At the Waterfront there are many Christmas concerts during the weeks leading up to Christmas Day.</p>
                </div>
              </div>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>
    
  </body>
  <style>
  .row-no-gutter {
  margin-right: 0;
  margin-left: 0;
}

.row-no-gutter [class*="col-"] {
  padding-right: 0;
  padding-left: 0;
}


#card {
  background: #fff;
  position: relative;
  margin-top: 50px;
  -webkit-box-shadow: 0px 1px 10px 0px rgba(207,207,207,1);
  -moz-box-shadow: 0px 1px 10px 0px rgba(207,207,207,1);
  box-shadow: 0px 1px 10px 0px rgba(207,207,207,1);

  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -ms-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;  

}

.city-selected {
  position: relative;
  overflow: hidden;
  min-height: 150px;
  background: #3D6AA2;
}

article {
  position: relative;
  z-index: 2;
  color: #fff;
  padding: 20px;

  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: row;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-align-content: flex-start;
  -ms-flex-line-pack: start;
  align-content: flex-start;
  -webkit-align-items: flex-start;
  -ms-flex-align: start;
  align-items: flex-start;
}

.info .city,
.night {
  font-size: 24px;
  font-weight: 200;
  position: relative;


  -webkit-order: 0;
  -ms-flex-order: 0;
  order: 0;
  -webkit-flex: 0 1 auto;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  -webkit-align-self: auto;
  -ms-flex-item-align: auto;
  align-self: auto;
}

.info .city:after {
  content: '';
  width: 15px;
  height: 2px;
  background: #fff;
  position: relative;
  display: inline-block;
  vertical-align: middle;
  margin-left: 10px;
}

.city span {
  color: #fff;
  font-size: 13px;
  font-weight: bold;

  text-transform: lowercase;
  text-align: left;
}

.night {
  font-size: 15px;
  text-transform: uppercase;
}

.icon {
  width: 84px;
  height: 84px;
  -webkit-order: 0;
  -ms-flex-order: 0;
  order: 0;
  -webkit-flex: 0 0 auto;
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  -webkit-align-self: center;
  -ms-flex-item-align: center;
  align-self: center;

  overflow: visible;

}


.temp {
  font-size: 73px;
  display: block;
  position: relative;
  font-weight: bold;
}

svg {
  color: #fff;
  fill: currentColor;
}


.wind svg {
  width: 18px;
  height: 18px;
  margin-top: 20px;
  margin-right: 10px;
  vertical-align: bottom;
}

.wind span {
  font-size: 13px;
  text-transform: uppercase;
}

.city-selected:hover figure {
  opacity: 0.4;
}


figure {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    background-position: center;
    background-size: cover;
    opacity: 0.1;
    z-index: 1;

    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

.days .row [class*="col-"]:nth-child(2) .day  {
    border-width: 0 1px 0 1px;
    border-style: solid;
    border-color: #eaeaea;
}

.days .row [class*="col-"] {
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -ms-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;  
}

.days .row [class*="col-"]:hover{
  background: #eaeaea;
}

.day {
  padding: 10px 0px;
  text-align: center;

}

.day h1 {
  font-size: 14px;
  text-transform: uppercase;
  margin-top: 10px;
}

.day svg {
  color: #000;
  width: 32px;
  height: 32px;
}
  </style>

</html>