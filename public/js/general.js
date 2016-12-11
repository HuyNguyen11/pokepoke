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
      