<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'stats.php';
?>
  
   <!-- FUNCTION READ -->

<script>





    var dataForServer = {
                "user" : { 
                    "ID" : 22, 
                    "token": "hY3j" 
                }, 
                "data" : 
                {
                    "columns": [ "id", "nume", "localitate", "judet", "email", "telefon", "utilizator_id" ], 
                    "filters" : null, 
                    "searchString" : "",
                    "limit" : 10,
                    "skip" : 0} 
                }


                
                
        // cand apesi pe editare
    function editClient(clientId)
    {
        $('#elementId').val(clientId);
        $('#editForm').submit();
    }
    
    // cand apesi pe stergere
    function deleteClient(idRand, clientId)
    {
        //showModalDialog();
        $.ajax({
        type: "POST",
        url: "../Controller/Controller.php?arhivare="+clientId+"&entity=Firma",
        dataType: "json"
        })
        .done(function(rezultat) { 
           //window.alert("Delete client "+ clientId);
           $('#'+idRand).remove();
       }).fail(function(rezultat) { 
           window.alert("Error for clientId: "+ clientId);
       });
        
    }
    
    function showModalDialog()
    {
        var modalWindow = $('<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">');
        var modalHeader = $('<div class="modal-header">');
        var modalHeaderButton = $('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>');
        var modalHeaderTitle = $('<h3 id="myModalLabel">Confirmare stergere</h3>');
        var modalBody = $('<div class="modal-body">');
        var modalFooter = $('<div class="modal-footer">');
        var modalFooterClose = $('<button class="btn" data-dismiss="modal" aria-hidden="true">Anuleaza</button>');
        var modalFooterDelete = $('<button class="btn btn-danger" data-dismiss="modal">STERGE CLIENT</button>');
        var continutBody = '<p class="error-text"><i class="icon-warning-sign modal-icon"></i>Esti sigur ca vrei sa stergi definitiv acest client?</p>';
        
        modalFooterClose.click(function(){
            modalWindow.modal.toggle();
        });
        modalFooterDelete.click(function(){
            deleteclient(randCurentId, randDbId); 
        });
        
        modalHeader.append(modalHeaderButton);
        modalHeader.append(modalHeaderTitle);
        modalBody.append(continutBody);
        modalFooter.append(modalFooterClose);
        modalFooter.append(modalFooterDelete);
        
        modalWindow.append(modalHeader);
        modalWindow.append(modalBody);
        modalWindow.append(modalFooter);
        
        $('#confirmationDialog').append(modalWindow);
    }
                
                
                
    function readTable(numeleTabeluluiDeInterogat)
    { 
    
        var searchValue = $('#searchString').val();
		if (searchValue != "")
		{
			dataForServer.data.searchString = searchValue;
		}
	
        if (dataForServer.data.filters == null)
        {
            dataForServer.data.filters = getPostAsJson();
        }
    
    $.ajax({
    data: dataForServer,
    type: "POST",
    url: "../Controller/Controller.php?&read="+numeleTabeluluiDeInterogat,
    dataType: "json"
    })
   .done(function(rezultat) { 
        $('#myTable').empty();
        $('#myTable').append($('\
        <thead><tr>\
        <th></th>\
        <th></th>\
          <th>Nume Firma</th>\
          <th>Localitate</th>\
          <th>Judet</th>\
		  <th>Email</th>\
		  <th>Telefon</th>\
		  <th>client</th>\
		  <th></th>\
        </tr></thead>'));
        
        $.each(rezultat, function(i) {   // Pentru fiecare rand la pozitia i
                        var tRow = $('<tr>');
                        tRow.attr("id","rand"+i);
                        tRow.click(function(){ randCurentId = tRow.attr("id"); randDbId = rezultat[i][0];});
                        var pencilCell =  $('<td>');
                        var pencil =  $('<i class="icon-pencil">');
                        pencilCell.append(pencil);
                        pencilCell.click(function(){ 
                            editClient(rezultat[i][0]);
                        });
                        tRow.append(pencilCell);
                        
                        var myTd = $('<td>');
                        myTd.append($('<a href="#myModal" role="button" data-toggle="modal"><i class="icon-trash"></i></a>'));
                        myTd.click(function(){ showModalDialog();});
                        tRow.append(myTd);
                        
                        
                        
            $.each(rezultat[i], function(j) { // Pentru fiecare celula j din randul i
                var cell_ID = "cell_"+i+"_"+j;
                var continutCelulaTabel;
                switch (j)
                    {
                  
                    case 1:
                        var continut = '<a href="detalii-client.php?get='+rezultat[i][0]+'">'+rezultat[i][j]+'</a>';
                        continutCelulaTabel = $(continut);
                    break;
                    
                    case 3:
                        var continut = '<a href="#">'+rezultat[i][j]+'</a>';
                        continutCelulaTabel = $(continut);
                        continutCelulaTabel.click(function(){
                            var filters = { "judet" : rezultat[i][j] };
                            dataForServer.data.filters = filters;
                            readTable("firma");
                        });
                    break;
                    
                    case 4:
                    if (rezultat[i][j] != null){
                        var continutCelulaTabel = $('<a href="mailto:'+rezultat[i][j]+'">'+rezultat[i][j]+'</a>');
                        }
                        break;
                    
                    case 6:
                       getUtilizatorNume("Utilizator", rezultat[i][j], cell_ID);
                    break;
                    
                    default:
                        continutCelulaTabel = rezultat[i][j];
                    break;      
                    }
                tCell = $('<td id='+cell_ID+'>').html(continutCelulaTabel);

               if (j != 0){tRow.append(tCell);}
             
            });
            $('#myTable').append(tRow);
        });
   });
   }
   
   
   function getUtilizatorNume(numeTabel, id, destination)
   {
       $.ajax({
        type: "POST",
        url: "../Controller/Controller.php?&get="+id+"&entity="+numeTabel,
        dataType: "json"
        })
        .done(function(rezultat) { 
           $('#'+destination).html(rezultat.nume);
       }).fail(function(rezultat) { 
          // $('#'+destination).html(rezultat.nume);
       });
   }
   </script>
   
   
   
   
<!-- MAIN CONTENT  -->
        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
<form id='editForm' action='editare-client.php' method='get'><input type='hidden' name='id' id='elementId'/></form>
    <button class="btn btn-primary" onclick="window.location.href='editare-client.php'"><i class="icon-plus"></i> Adauga Client</button>
	       <button class="btn">Exporta</button>
	 <form style="display: inline;" >
     <input type="text" id="searchString" placeholder="cauta in coloanele tabelului" class="cauta">
    <button class="btn" id="searchStringCommand" type="button"><i class="icon-search"></i> Cauta</button>
	 </form>
	 
	 	 <form style="display: inline;" >
     <input type="text" placeholder="cauta oriunde in fisele clientilor" class="cauta">
    <button class="btn" type="button"><i class="icon-search"></i> Cauta</button>
	 </form>
	
  <div class="btn-group">

  </div>
</div>
<div class="well"  style="border: 0px solid white;">
    <table id="myTable" class="table table-striped ">
        <tr>
          <th>Crt.</th>
          <th>Nume Firma</th>
          <th>Localitate</th>
          <th>Judet</th>
		  <th>Email</th>
		  <th>Telefon</th>
		  <th>Agent</th>
		  <th></th>
        </tr>
      </thead>
      <!--thead>
      <tbody>

        <tr>
          <td><a href="">MCA PRESS ADVERTISING DISTRIBUITION SRL</a></td>
          <td><a href="">Sangiorgiu de Vale</a></td>
          <td><a href="">Bucuresti-Ilfov</a></td>
		  <td><a href="mailto: ">mihaela@fabricadeavertising.ro</a></td>
		  <td>0723465123</td>
          <td><a href="">ADRIAN CUMPANASU</a></td>
		  <td><a href="#myModal" role="button" data-toggle="modal"><i class="icon-trash"></i></a></td>
        </tr>

		
      </tbody-->
    </table>
</div>


<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Confirmare stergere</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Esti sigur ca vrei sa stergi definitiv acest client?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Anuleaza</button>
        <button class="btn btn-danger" data-dismiss="modal">STERGE CLIENT</button>
    </div>
</div>

<div id='confirmationDialog'></div>

   <script>
   $('#searchStringCommand').click(function(){
        readTable("firma");
   });
      $('#searchString').keypress(function(e) {
      
    if(e.which == 13) {
    e.preventDefault();
        readTable("firma");
    }
});
   readTable("firma");
   </script>
                    
<?php 
include 'footer.php';
?>



