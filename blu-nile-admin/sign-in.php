<?php 
include 'header.php';
include 'navbar.php';
?>
    


    

    
        <div class="row-fluid">
		
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Formular login</p>
            <div class="block-body">
                <form>
                    <label>Username</label>
                    <input type="text" class="span12" id="_username">
                    <label>Parola</label>
                    <input type="password" class="span12" id="_password">
                    <a href="index.html" class="btn btn-primary pull-right">Login</a>
                    <div class="clearfix"></div>
                </form>
            </div>

        </div>
			<br>
			<div style="display: inline-block;">
			<!-- INCEPUT SCRIPT PRELUARE METEO -->
<iframe src="http://meteo.ournet.ro/vremea/widget/widgetframe?days=5&amp;bcolor=ffffff&amp;bkcolor=FFF&amp;htcolor=505050&amp;hbkcolor=ffffff&amp;cn=ro&amp;id=3950616&amp;w=200&amp;lcolor=DDD&amp;ul=ro" scrolling="no" frameborder="0" style="border:none;overflow:hidden;height:243px;width:180px;" allowTransparency="true"></iframe>

<!-- SFARSIT SCRIPT PRELUARE METEO -->
</div>
<div style="display: inline-block; text-align: right; float: right;">
<!-- INCEPUT SCRIPT PRELUARE CURS VALUTAR -->
<script type="text/javascript" language="javascript" src="http://www.curs-valutar-bnr.ro/preluare_curs.php?lw=160&cft=fafaf7&ctt=505050&ttb=0&cc=ffffff&cfb=ffffff&ct=505050&val[]=8&val[]=19&mf=12&avc=1&ac=1&aod=0"></script><noscript><strong><a href="http://cursvalutar.dailybusiness.ro" title="Curs BNR">cvbnr.ro</a></strong></noscript>
<!-- SFARSIT SCRIPT PRELUARE CURS VALUTAR -->
</div>
    </div>
	
</div>


    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>


