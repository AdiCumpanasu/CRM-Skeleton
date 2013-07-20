<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'stats.php';
?>
  
   <!-- FUNCTION READ -->
<script>
function getvariableValue(variableName)
{
    var url = location.search.replace('?', '');
    if (url.indexOf('&') >  -1 )
    {
        variabileGET = url.split('&');
    }
    else 
    {
        variabileGET = [url];
    }
    
    for (i=0; i<variabileGET.length; i++)
    {
        if (variabileGET[i].indexOf('=') >  -1 )
        {
            var parametruValoare = variabileGET[i].split('=');
        }
        else
        {
            var parametruValoare = variabileGET[i];
        }
        
        if (parametruValoare[0] == variableName)
        {
            if(parametruValoare.length >1 )
            {
                return parametruValoare[1];
            }
            else
            {
                return null;
            }
        }
    }    
}
</script>
<script>

var utilizator_id = getvariableValue("utilizator_id")
    var dataForServer = {
                "user" : { 
                    "ID" : 22, 
                    "token": "hY3j" 
                }, 
                "data" : 
                {
                    "columns": [ "id", "nume", "localitate", "judet", "email", "telefon", "utilizator_id" ], 
                    "filters" : {  }, 
                    "limit" : 10,
                    "skip" : 0} 
                }


    function readTable(numeleTabeluluiDeInterogat)
    {
    
    if (utilizator_id > 0)
    {
        dataForServer.data.filters = { "utilizator_id" : utilizator_id }
    }
    
    $.ajax({
    data: dataForServer,
    type: "POST",
    url: "../Controller/Controller.php?&read="+numeleTabeluluiDeInterogat,
    dataType: "json"
    })
   .done(function(rezultat) { 
        $.each(rezultat, function(i) {
            tRow = $('<tr>');
            $.each(rezultat[i], function(j) {
                tCell = $('<td>').html(rezultat[i][j]);
                tCell.click(function(){ getElement(i) });
                tRow.append(tCell);
            });
            $('#myTable').append(tRow);
        });
   });
   }
   </script>
   
   
   
   
<!-- MAIN CONTENT  -->
        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='editare-client.php'"><i class="icon-plus"></i> Adauga Client</button>
	       <button class="btn">Exporta</button>
	 <form style="display: inline;" >
     <input type="text" placeholder="cauta in coloanele tabelului" class="cauta">
    <button class="btn" type="button"><i class="icon-search"></i> Cauta</button>
	 </form>
	 
	 	 <form style="display: inline;" >
     <input type="text" placeholder="cauta oriunde in fisele clientilor" class="cauta">
    <button class="btn" type="button"><i class="icon-search"></i> Cauta</button>
	 </form>
	
  <div class="btn-group">

  </div>
</div>
<div class="well">
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
<div class="pagination">
    <ul>
        <li><a href="#">Precedenta</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Urmatoarea</a></li>
    </ul>
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


   <script>
   readTable("firma");
   </script>
                    
<?php 
include 'footer.php';
?>



