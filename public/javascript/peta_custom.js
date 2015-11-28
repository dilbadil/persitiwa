      $(document).ready(function() {
        //gambar peta
        $.getScript("javascript/petaindonesia.js");  
        //jika user mengklik propinsi event "petaklik" akan tertrigger
        //ambil idwilayahnya 
        $( "#map" ).on( "petaklik", function(event, idwilayah) {
          alert("Anda mengklik id: "+idwilayah);
        });       
      });