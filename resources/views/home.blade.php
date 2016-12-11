<!DOCTYPE HTML>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css"  href="{{asset('css/styles.css')}}">

    <script src="http://www.webglearth.com/v2/api.js"></script>
    <link rel="stylesheet" type="text/css"  href="{{asset('css/general.css')}}">
    <script>
    
    var countries = <?php echo json_encode($countries); ?>;
    
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
    
    var marker = [];
    
    for (i = 0; i < countries.length; i++) {
    
      marker[i] = WE.marker([countries[i]['latitude'], countries[i]['longitude']]).addTo(earth);
      marker[i].bindPopup("<img class='countries-img' src= 'img/" + countries[i]['flag'] + "'<b>" + countries[i]['name'] + "</b><br><br/><button class='ctry-btn' id='"+ countries[i]['id'] + "'> Chrismast in " + countries[i]['name'] + "</button>", {maxWidth: 150, closeButton: true});
      }
    }


    $(document).ready(function () {
    
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    
      $("body").on('click','.ctry-btn', function () {
    
        var id = this.id;
        
        $.ajax({
          url: '/countries/' + id ,
          type: "post",
          headers: { "cache-control": "no-cache" },
          success: function(data){
          
          $('.ctry-name').text(data['name']);
          $('.ctry-heading').text(data['name']);
          
          $('.ctry-content').html(data['information']);
          $('#card').removeClass('hidden');   
          },
    
    
        });
      });
    });


    $(document).ready(function () {
        $('#save_message').click(function(){

            console.log("save image start"); 
            var data = new Object;
          data['comment'] = $("#comment").val();
          if($("#comment").val() == ""){
            alert("Please enter your message!");
            return 0;
          }
          $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
          $.ajax({
              url: "/save_message",
              type: "post",
              data: data,
              success: function(result){
                alert("Send message successed!");
              },
              error: function(errors){
                alert("Something errors!");
              }  
          });
        });   
    });    
    </script>

  <title>PokePoke</title>
  </head>
  <body onload="initialize()">
  <div>
    <div id="earth_div">
      <div id="left-part">

<div id="container">
    <div id="tree">
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="layer">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <span class="mess">text mess</span>
    </div>
</div>
<div class="text-box">
      <div class="row form-group">
        <div class="col-xs-11">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="5" height="100px" id="comment"></textarea>
          <button id="save_message" class="btn btn-default ">Submit1</button> 
        </div>
      </div>
</div>

      </div>

        <div id="right-part">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <div id="card" class="weater hidden">
                  <div class="city-selected">
                    <article>
                      <div class="info">
                        <div><h4 class="ctry-name"></h4> </div>
                        <div class="ctry-time">Night - 22:07 PM</div>
                      </div>
                    </article>
                  <figure class="ctry-img" style="background-image: url(http://136.243.1.253/~creolitic/bootsnipp/home.jpg)"></figure>
                </div>
                <div class="content-bounder" >
                  <div class="row row-no-gutter">
                    <div class="col-md-12">
                      <div class="title">
                        <h1>Christmas in <span class="ctry-heading"></span></h1>
                      </div>
                      <div class="content ctry-content">
                        
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
</html>