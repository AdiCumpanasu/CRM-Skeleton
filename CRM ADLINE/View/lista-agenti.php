<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'stats.php';
?>


<!-- FUNCTION READ -->
<script>
    // read all elements

    var randCurentId = null;
    var randDbId = null;

    var dateDeTrimis = {
                "user" : { 
                    "ID" : 22, 
                    "token": "hY3j" 
                }, 
                "data" : 
                {
                    "columns": [ "id", "nume", "telefon", "email", "tip", "username" ], 
                    "filters" : {  }, 
                    "limit" : 10,
                    "skip" : 0} 
                }

    // cand apesi pe email
    function sendEmail(emailAddress)
    {
        window.alert("send email to "+emailAddress);
    }
    
    
    // cand apesi pe editare
    function editAgent(agentId)
    {
        $('#elementId').val(agentId);
        $('#editForm').submit();
    }
    
    // cand apesi pe stergere
    function deleteAgent(idRand, agentId)
    {
        //showModalDialog();
        $.ajax({
        type: "POST",
        url: "../Controller/Controller.php?arhivare="+agentId+"&entity=Utilizator",
        dataType: "json"
        })
        .done(function(rezultat) { 
           //window.alert("Delete agent "+ agentId);
           $('#'+idRand).remove();
       }).fail(function(rezultat) { 
           window.alert("Error for agentId: "+ agentId);
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
            deleteAgent(randCurentId, randDbId); 
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
        $.ajax({
        data: dateDeTrimis,
        type: "POST",
        url: "../Controller/Controller.php?read="+numeleTabeluluiDeInterogat,
        dataType: "json"
        })
    
       .done(
           function(rezultate) { 
                $.each(rezultate, //Pentru fiecare rand din table
                    function(i) {
                        var randTabel = $('<tr>');
                        randTabel.attr("id","rand"+i);
                        randTabel.click(function(){ randCurentId = randTabel.attr("id"); randDbId = rezultate[i][0];});
                        var pencilCell =  $('<td>');
                        var pencil =  $('<i class="icon-pencil">');
                        pencilCell.append(pencil);
                        pencilCell.click(function(){ 
                            editAgent(rezultate[i][0]);
                        });
                        randTabel.append(pencilCell);
                        
                        var myTd = $('<td>');
                        myTd.append($('<a href="#myModal" role="button" data-toggle="modal"><i class="icon-trash"></i></a>'));
                        myTd.click(function(){ showModalDialog();});
                        randTabel.append(myTd);
                        
                        //$.each(rezultate[i], // Pentru fiecare celula din randul curent
                        //    function(j) {
                        for (k = 0; k< rezultate[i].length; k++)
                        {
                                celulaTabel = $('<td>').html(rezultate[i][k]);
                                switch(k)
                                {
                                    case 1:
                                        var listaFirmeAgent = $('<a href="lista-clienti.php?utilizator_id='+rezultate[i][0]+'" >'+rezultate[i][k]+'</a>');
                                        celulaTabel.html(' ');
                                        celulaTabel.append(listaFirmeAgent);
                                        break;
                                        
                                    case 3:
                                        var emailAdressElement = $('<a href="mailto:'+rezultate[i][k]+'">'+rezultate[i][k]+'</a>');
                                        celulaTabel.html(' ');
                                        celulaTabel.append(emailAdressElement);
                                        break;
                                        
                                    default:
                                        break;
                                }
                                randTabel.append(celulaTabel);
                        }
                        //        });
                        $('#myTable').append(randTabel);
                    });
         });
   }
</script>
   
   



<!-- MAIN CONTENT  -->
        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='editare-agent.php'"><i class="icon-plus"></i> Adauga Agent</button>
	 <form id='editForm' action='editare-agent.php' method='get'><input type='hidden' name='id' id='elementId'/></form>

	
  <div class="btn-group">

  </div>
</div>
<div class="well">
    <table id="myTable" class="table ">
      <thead>
        <tr>
		  <th></th>
		  <th></th>
          <th></th>
          <th>Nume</th>
          <th>Telefon</th>
		  <th>Email</th>
		  <th>Permisiuni</th>
		  <th>Username</th>
		  
        </tr>
      </thead>
      <tbody>
<!--
        <tr>
          <td><a href=""><i class="icon-pencil"></i></a></td>
		  <td><a href="#myModal" role="button" data-toggle="modal"><i class="icon-trash"></i></a></td>
		  <td><a href="">Alina Dup</a></td>
          <td>0747 237 820</td>
          <td><a href="mailto: ">alina@adlinesolutions.ro</a></td>
		  <td>agent</td>
		  <td>alina</td>
        </tr>
-->

      </tbody>
    </table>
</div>
<br></br>
<p>
<i>
<span class="label label-info">In cazul repartizarii TUTUROR clientilor unui agent altui agent:</span>
<ol>
<li>unui agent nou angajat:</li>
	&nbsp; &nbsp; inlocuiti datele fostului agent cu cele ale noului agent;
<li>unui agent deja existent care are deja o lista proprie:</li>
	&nbsp; &nbsp; fostul agent va fi sters, sistemul solicitand specificarea unui agent caruia sa fie adaugati clientii orfani.
</ol>
</i>
</p>

<div id='confirmationDialog'></div>


<script>
   readTable("utilizator");
</script>
                    
<?php 
include 'footer.php';
?>

