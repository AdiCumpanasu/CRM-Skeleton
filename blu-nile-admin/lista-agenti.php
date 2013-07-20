<?php 
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'stats.php';
?>


        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onclick="window.location.href='/editare-agent.php'"><i class="icon-plus"></i> Adauga Agent</button>
	 </form>

	
  <div class="btn-group">

  </div>
</div>
<div class="well">
    <table class="table table-striped ">
      <thead>
        <tr>
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

        <tr>
          <td><a href=""><i class="icon-pencil"></i></a></td>
		  <td><a href="#myModal" role="button" data-toggle="modal"><i class="icon-trash"></i></a></td>
		  <td><a href="">Alina Dup</a></td>
          <td>0747 237 820</td>
          <td><a href="mailto: ">alina@adlinesolutions.ro</a></td>
		  <td>agent</td>
		  <td>alina</td>
        </tr>


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
	&nbsp; &nbsp; fostul agent va fi sters, sistemul solicitand specificarea unui agent in lista caruia sa fie adaugati clientii orfani.
</ol>
</i>
</p>

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


                    
<?php 
include 'footer.php';
?>



