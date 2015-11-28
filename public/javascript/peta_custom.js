      $(document).ready(function() {
        //gambar peta
        $.getScript("javascript/petaindonesia.js");  
        //jika user mengklik propinsi event "petaklik" akan tertrigger
        //ambil idwilayahnya 
        $( "#map" ).on( "petaklik", function(event, idwilayah) {
          // alert("Anda mengklik id: "+idwilayah);
          $('.pop_up_background').fadeIn('fast', function() {
            $('.pop_up_tweet').fadeIn('slow');
          });  

        });       

        $('#close').click(function(e) {
          e.preventDefault();
          $('.pop_up_background').fadeOut('fast', function() {
            $('.pop_up_tweet').fadeOut('slow');
          });
        });



      });