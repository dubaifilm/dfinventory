// function mjtoggleside(){
  $( "#mjtogglesidee" ).click(function() {
    $( "#mjtogglesideee" ).toggleClass( "mj-togglesideshow" );
    $( "#mjbodytoggle" ).toggleClass( "mj-bodytoggle" );
      });
  $( "#mjTogglenav" ).click(function() {
    $( "#links" ).toggleClass("mjTogglenav");
      });
      $(document).ready(function() {
    $( "#hometoggleside" ).toggleClass( "hometogglesideshow" );
      });

      // #myInput is a <input type="text"> element


      $(document).ready(function() {
        var table = $('#example').DataTable( {
            columnDefs: [
                { width: '15%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '15%', targets: 2 }
            ],
            fixedColumns: true

        } );
        $('#myTablecam').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecama').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecamb').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecamc').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecamd').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecame').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecamf').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecamg').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#myTablecamh').on( 'click', function () {
            table.search( this.value ).draw();
        } );
        $('#bookSearch').keyup(function(){
          table.search($(this).val()).draw() ;
        });
    } );

      $( "#mjmodalbtn" ).click(function() {
      $( "#mjmodal" ).toggleClass( "mj-show" );
        });

    $( "#mjmodalhide, #mjmodalcancel, #mjsidetogglehide" ).click(function() {
  $( ".mj-modal-md"  ).removeClass( "mj-show" );
  $( ".mj-toggleside" ).removeClass( "mj-togglesideshow" );
  $( ".mj-body" ).removeClass( "mj-bodytoggle" );
});
$(document).keyup(function(e) {
     if (e.key === "Escape") {
         $( ".mj-modal-md" ).removeClass( "mj-show" );
         $( ".mj-toggleside" ).removeClass( "mj-togglesideshow" );
         $( ".mj-body" ).removeClass( "mj-bodytoggle" );
         $( ".collapse" ).removeClass( "show" );
         $( ".links" ).addClass( "mjTogglenav" );
    }
});
//hide onclick outside the container
$(document).mouseup(function(e)
{
    const modalcontainer = $(".mj-modal-md");
    if (!modalcontainer.is(e.target) && modalcontainer.has(e.target).length === 0)
    {
       $( ".mj-modal-md").removeClass( "mj-show" );
    }
    const sidetogglecont = $(".mj-toggleside");
    if (!sidetogglecont.is(e.target) && sidetogglecont.has(e.target).length === 0)
    {
      $( ".mj-toggleside" ).removeClass( "mj-togglesideshow" );
      $( ".mj-body" ).removeClass( "mj-bodytoggle" );
    }
    const collapse1 = $(".collapse");
    if (!collapse1.is(e.target) && collapse1.has(e.target).length === 0)
    {
      $( ".collapse" ).removeClass( "show" );
    }
    const links1 = $(".links");
    if (!links1.is(e.target) && links1.has(e.target).length === 0)
    {
      $( ".links" ).addClass( "mjTogglenav" );
    }
});



//
//   if(addOrRemove){
//     $("#mjtogglesidee").addClass("mj-togglesideshow");
//   }
// else{
//   $("#mjtogglesidee").removeClass("mj-togglesideshow");
// }
//   if(document.getElementById("mjtogglesidee").className){
//       document.getElementById("mjtogglesidee").className = "mj-togglesideshow";
//   }
//   else{
//       document.getElementById("mjtogglesidee").className = "mj-toggleside";
//   }
// }
// $(document).ready(function(){
// $("#mjtogglesidee").toggleClass('gallery-scale');
// });
