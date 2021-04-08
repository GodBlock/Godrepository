 


<?php

chdir ("../../../");

header('Content-Type: text/html; charset=UTF-8');
include('live_check.php');
   if(!isset($_SESSION['UID'])){
	header('location:../../../login.php?return=+dashboard');
	die(); 

       }

    if (isset($_SESSION['email'])) {
        //asignar a variable
        $usernameSesion = $_SESSION['email']; 
		//asegurar que no tenga "", <, > o &
        $username = htmlspecialchars($usernameSesion);
 
        
    }
$UID= $_SESSION['UID'];
        
        
include "php/connect.php";
include "php/var_indexes.php";
 include("php/conexion.php");
$conexion=connect();
$conec_balanc=conec_balanc();
        
 
        try {

  $pdo = new PDO("mysql:host=$servername;dbname=$database", "$username", "$password");
}
catch(PDOException $e) {
    echo $e->getMessage();
}       
   

$query = $pdo->query("SELECT TimeZone FROM `users` WHERE id = '$UID'")->fetchall();

foreach($query as $row){
    
     $tzone = $row['TimeZone']; 
}
 
date_default_timezone_set($tzone);
 
 $script_tz = date_default_timezone_get();
      
        
        
        
 ?>
 
 
 
<!DOCTYPE html>
<html>
<head> 
<meta name="google" content="notranslate" />
 <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $users ?>-Localbitcoins-Plus </title>
<link rel="apple-touch-icon" sizes="180x180" href="../../../img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../../img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../../img/favicon-16x16.png">
<link rel="manifest" href="img/site.webmanifest">
 
    <!-- Custom styles for this template-->

    <script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
    
     <link rel="stylesheet" href="css/jquery-ui.min.css" />
 
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script src="https://unpkg.com/bootstrap-select@1.12.4/dist/js/bootstrap-select.min.js"></script>
  <script src="https://unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script>      
    
<link rel="stylesheet" type="text/css" href="../../../librerias/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="../../../librerias/alertifyjs/css/themes/default.css">
<script src="../../../librerias/alertifyjs/alertify.js"></script>
 <script src="../../../js/function_tables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/0d5c3772fc.js"></script>
 
<!------ Include the above in your HEAD tag ---------->
  
  <!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    					<!-- Custom CSS -->
<link href="../../../css/hover-min.css" rel="stylesheet">
<link href="../../../css/hover.css" rel="stylesheet">
    <!-- Tt -->
 
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;500&display=swap" rel="stylesheet"> 
    <!--sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <link href="../../../css/bootstrap-select-country.min.css" rel="stylesheet">
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
 
<link rel="stylesheet" href="../../../css/style+dash.css">    
<link rel="stylesheet" href="../../../css/buttoms.css">  
<link rel="stylesheet" href="../../../css/fontss.css"> 
<link rel="stylesheet" href="../../../css/dataTables.bootstrap.min.css"> 
<script src="../../../js/nanobar.min.js" crossorigin="anonymous"></script>
<link href="../../../css/toastr.min.css" rel="stylesheet"/>
<script src="../../../js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
     
      <link rel="stylesheet" href="sockets/btcticker-master/public/css/styleGral.css" />
    <script src="/socket.io/socket.io.js"></script>
    <script defer src="js/app.js"></script>
    <script defer src="js/sparkline.js"></script>
<script id="chatBroEmbedCode">
/* Chatbro Widget Embed Code Start */
function ChatbroLoader(chats,async){async=!1!==async;var params={embedChatsParameters:chats instanceof Array?chats:[chats],lang:navigator.language||navigator.userLanguage,needLoadCode:'undefined'==typeof Chatbro,embedParamsVersion:localStorage.embedParamsVersion,chatbroScriptVersion:localStorage.chatbroScriptVersion},xhr=new XMLHttpRequest;xhr.withCredentials=!0,xhr.onload=function(){eval(xhr.responseText)},xhr.onerror=function(){console.error('Chatbro loading error')},xhr.open('GET','//www.chatbro.com/embed.js?'+btoa(unescape(encodeURIComponent(JSON.stringify(params)))),async),xhr.send()}
/* Chatbro Widget Embed Code End */
ChatbroLoader({encodedChatId: '35Bqt', 
        siteDomain: 'localbitcoinsplus.com',    
        siteUserFullName: '<?php echo $users ?>',       
              });
    
 
</script>
 <script language="javascript" type="text/javascript">
$(document).ready(function() {

 io.connect("http://localhost:1978");
 });
    </script>
 
<script>  
(function($) {
$("a.enlace").each(function() {
var value = $(this).attr('href');
value = value.replace("%20", "-");

$(this).attr('href', value);
});
})(jQuery);
</script>
  

</head> 
<body class="">
 
 <header>
 <?php
     
 include "../../../+header.php";
	 ?> 	
   </header>
   
  <br/>
  <br/>
  <div class="position_banner_col" >
      
 <div class="web-beta-bannercol" ng-if="::WebBetaCtrl.isVisible"> 
          
           <div class="alert alert-info alert-top"> 
      </div> 
      </div> 
      </div> 
       <div class="position_banner_head" > 
      <div class="web-beta-banner" ng-if="::WebBetaCtrl.isVisible"> 
            
  <div class="alert alert-info alert-top text-center"> <p style="font-size:18px;color:white; font-weight:100" >Localbitcoins Plus just got better! 0.50% trading commissions, low deposit/withdrawal fees, and 100% easier to use.</p> </div></div>
        </div>
           
     <div  class="position_banner_header" > 
       <div class="web-beta-banner1" ng-if="::WebBetaCtrl.isVisible"> 
 
<!-- HTML -->
 <h1 style="color:white;padding: 10 50 20 10" class="float" >
</h1>  
           <div  class="alert alert-info alert-top charte">
                  
  <?php
include "engine/bitstamp_chart.php"; 
?>    
 
      </div> 
   </div>
            </div> 
     <center> 
    <section>
      <h2>BTC CURRENCY EXCHANGE TICKER</h2>
      <table id="btcticker" class="table-striped">
        <thead>
          <tr>
            <th>Currency</th>
            <th>Price</th>
            <th>Volume</th>
            <th>Change</th>
            <th>Price Trend (5 sec interval)</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="5" data-currency="">Fetching data...Please wait for 5 sec</td>
          </tr>
        </tbody>
      </table>

      <div id="tickertape" class="ticker-tape"></div>
    </section>
        
 	 <div class=" container-fluid animate__heartBeat">
  
     </div>
   <h4 class="text-center" style="color:black" >You can create a maximum of 3 advertisement.</h4>   
        </center>  
         
<div class="p_cr_n">  
       
  
<button  type="submit" onclick="delay1()" class="bubbly-button hvr-glow" id="create_new" enabled>Create New trade&nbsp; 
 
   </button> 
               
          </div>
        
    
    <hr> 
     <div class="position_banner_dash" >   
 
<div class="web-beta-banner_table" ng-if="::WebBetaCtrl.isVisible"> 
            
  <div class="alert alert-info alert-top  ">
       
            &nbsp; &nbsp;<i class="fa fa-sliders-h pos_ads_m" ></i> <h1 class="ad_manager pos_ads_m_h1" style="color:gray">Ad Manager </h1> 
 
 </div> </div>
      </div>
    
    
    <div class="container_tables">
        
        <div id="table_dash"></div>  
  
    </div>
  <div class="position_currencys" >   
 
<div class="web-beta-banner_table" ng-if="::WebBetaCtrl.isVisible"> 
            
  <div class="alert alert-info alert-top  ">
       
            <i class="fa fa-bolt pos_ads_n" ></i> <p class="ad_manager pos_ads_m_h1" style="color:white;font-weight:100;font-size:20">176 currencies supported - more of 150 methods of payments available. Localbitcoins Plus+ offer more for you!!</p> 
 
 </div> </div>
      </div>  
    
 
        <div class="position_banner_news" >   
 
<div class="web-beta-banner_table" ng-if="::WebBetaCtrl.isVisible"> 
            
  <div class="alert alert-info alert-top  ">
       
              &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<i class="fa fa-bolt pos_ads_n" ></i> <h1 class="ad_manager pos_ads_m_h1" style="color:gray">Latest ads published</h1> 
 
 </div> </div>
      </div>  
    
      <div class="container_table_news">
      
        <div id="newsrow"></div>
    
    </div>
    
             <div class="container_table_news_b">
      
        <div id="newsrowsB"></div>
    
    </div>
    
    
 
  <div class="position_banner_summary2" >   
 
<div class="web-beta-banner_table" ng-if="::WebBetaCtrl.isVisible"> 
            
  <div class="alert alert-info alert-top  ">
       
            <i class="fa fa-chart-bar pos_ads_n2" ></i> <h1 class="ad_manager pos_ads_m_h1" style="color:gray">Recent transactions</h1> 
 
 </div> </div>
      </div>   
    
    <div class="container_table">  
        
        <div id="ts"></div>
      
    </div>
      
 
      <?php

include "php/connect_PDO_MR.php";  

    try {

  $pdo = new PDO("mysql:host=$servername;dbname=$database", "$username", "$password");
}
catch(PDOException $e) {
    echo $e->getMessage();
}

$query = $pdo->query("SELECT * FROM `buy_sell` WHERE trader = '$users '")->fetchall();

foreach($query as $row){
    
    $ad_number= $row['id'];
    
    $pdo=null;
} 
  ?>     
<div class="modal fade animate__animated " id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      </div>
      <div class="modal-body">
         
          
              <hr>
           <div class="form-group">
<input type="text"  id="iduser" class="form-control input_center_move hidden"  disabled name="">
        <label>Price</label>
               
<input   name="" id="priceu" class="form-control input_center" pattern="^[0-9]+"
         autocomplete="off" min="0">
<input type="hidden" value= "" name="price_tempu" id="price_tempu" >
        <label>Margin</label>
<input onkeyup="mayus(this)" type="text" name="" id="mgnu" class="form-control input_center" pattern="^[0-9]+"
         autocomplete="off" min="0">	
    
          <label>Fiat</label>
<input onkeyup="mayus(this)" type="text" name="" id="curru" class="form-control input_center" pattern="^[0-9]+"
         autocomplete="off" min="0">
               
 <label>Bank-Message</label>
<textarea onkeyup="mayus(this)" type="text" name="" id="msgu" class="form-control input-sm" pattern="[A-Za-z]{4-16}"  maxlength="55"> </textarea>
               
<div class="min_max">
     <label>Min</label>
<input  type="text" name="" id="minu" class="form-control input_center" pattern="^[0-9]+"
         autocomplete="off" min="0"> 

<label>Max</label>
<input  type="text" name="" id="maxu" class="form-control input_center" pattern="^[0-9]+"
         autocomplete="off" min="0">
    
    <div class="position_list_currencies">
      
                <li  style="font-size:9">Currencies supported: AED AFN ALL AMD ANG AOA ARS AUD AWG AZN BAM BBD BDT BGN BHD BIF BMD BND BOB BRL BSD BTC BTN BWP BYN BZD CAD CDF CHF CLF CLP CNH CNY COP CRC CUC CUP CVE CZK DJF DKK DOLARTODAY DOP DZD EGP ERN ETB EUR FJD FKP GBP GEL GGP GHS GIP GMD GNF GTQ GYD HKD HNL HRK HTG HUF IDR ILS IMP INR IQD IRR ISK JEP JMD JOD JPY KES KGS KHR KMF KPW KRW KWD KYD KZT LAK LBP LKR LRD LSL LYD MAD MDL MGA MKD MMK MNT MOP MRU MUR MVR MWK MXN MYR MZN NAD NGN NIO NOK NPR NZD OMR PAB PEN PGK PHP PKR PLN PYG QAR RON RSD RUB RWF SAR SBD SCR SDG SEK SGD SHP SLL SOS SRD SSP STN SVC SYP SZL THB TJS TMT TND TOP TRY TTD TWD TZS UAH UGX USD USD UYU UZS VES VND VUV WST XAF XAG XAR XAU XCD XDR XOF XPD XPF XPT YER ZAR ZMW ZWL</li>
              
           </div>    
                 
           </div>      
      </div>        
      </div>
<div class="btn_edit_modal">
<button type="button" class="fa fa-pen config  btn_edit_M " id="actualizadatos" data-dismiss="modal"></button>
   
      </div>
    </div>
  </div> 
<div class=" f_sgl text-center">
       <span id="copyright" >&copy; 2020 Localbitcoins Plus+ </span> 
       </div>    
 
  
 
 <div id="bstmIn" > </div>
        
<?php

 

    try {

  $pdo = new PDO("mysql:host=$servername;dbname=$database", "$username", "$password");
}
catch(PDOException $e) {
    echo $e->getMessage();
}

$query = $pdo->query("SELECT * FROM `price_live`")->fetchall();

foreach($query as $row){
    
    $last_price_update= $row['last_price'];
    $high_price_update= $row['high_price']; 
    $pdo=null;
} 
        
        //echo $last_price_update;
  ?>    
 
 
  
                <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
                <script>
                $("#main").click(function() {
  $("#mini-fab").toggleClass('hidden');
});
 

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();  
});

             </script>   
<script type="text/javascript">
	$(document).ready(function(){
		$('#table_dash').load('engine/table_dash.php');
	});
</script>
    
     <script>   
     $('document').ready(function(){
         refreshData();
     }
     );
     function refreshData(){
       $('#container_bal').load("engine/core/bal_test.php", function(){
           setTimeout(refreshData, 10000);
   }); 
};
     </script>
    
         <script>   
     $('document').ready(function(){
         refreshDataHidden();
     }
     );
     function refreshDataHidden(){
       $('#HiddenBal').load("engine/core/bal_test.php", function(){
           setTimeout(refreshDataHidden, 30000);
   }); 
};
     </script>
    
    
        <script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          rank=$('#rank').val();
          name=$('#name').val();
          progress_ban=$('#progress_ban').val();
            agregardatos(rank,name,progress_ban);
        });
        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });
</script>
    <script>
     //return true if char is a number
function isNumber (text) {
  if(text) {
    var reg = new RegExp('[0-9]+$');
    return reg.test(text);
  }
  return false;
}

function removeSpecial (text) {
  if(text) {
    var lower = text.toLowerCase();
    var upper = text.toUpperCase();
    var result = "";
    for(var i=0; i<lower.length; ++i) {
      if(isNumber(text[i]) || (lower[i] != upper[i]) || (lower[i].trim() === '')) {
        result += text[i];
      }
    }
    return result;
  }
  return '';
}
 </script>   

     <script>
        $(document).ready(function() {
            $('#submit').click(function() {
              
                $.ajax({
                    url: "engine/status.php",
                    method: "POST",
                    data: {$id: $id, $status: $status
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            });
        });
    </script>
   <script type="text/javascript">
	$(document).ready(function(){
            $('#ts').load('engine/tab_sell_dash.php');
	});
</script>
   

         <script>   
     $('document').ready(function(){
         refreshbstm();
     }
     );
     function refreshbstm(){
       $('#bstm').load("engine/bitstamp_live.php", function(){
           setTimeout(refreshbstm, 5000);
   }); 
};
     </script>
             
<script>   
     $('document').ready(function(){
         refreshIn();
     }
     );
     function refreshIn(){
       $('#bstmIn').load("engine/bitstampInput.php", function(){
           setTimeout(refreshIn, 5000);
   }); 
};
    
</script>
    
    
    
  <script>  
    function updateChart(){
			jQuery.ajax({
				url:'engine/bitstamp_chart.php',
				success:function(){
					
				}
			});
		}

		setInterval(function(){
			updateChart();
		},3000);
		
</script>
    

             
      <script>   
     $('document').ready(function(){
         refreshTabS();
     }
     );
     function refreshTabS(){
       $('#ts').load("engine/tab_sell_dash.php", function(){
           setTimeout(refreshTabS, 15000);
   }); 
};
     </script>
    
  
             <script>   
     $('document').ready(function(){
         refreshdashinf();
     }
     );
     function refreshdashinf(){
       $('#das_info').load("dash_info.php", function(){
           setTimeout(refreshdashinf, 8000);
   }); 
};
     </script>
    
                 <script>   
     $('document').ready(function(){
         refreshdashMgr();
     }
     );
     function refreshdashMgr(){
       $('#table_dash').load("engine/table_dash.php", function(){
           setTimeout(refreshdashMgr, 5000);
   }); 
};
     </script>

        
  <script>   
    $(document).ready(main);

var contador = 1;

function main(){
	$('.menu_bar').click(function(){
		// $('nav').toggle(); 

		if(contador == 1){
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}

	});

};
       </script>
       <script>
   var animateButton = function(e) {

  e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');
  
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}
     </script>  
    <script>   
    $(document).ready(main);

var contador = 1;

function main(){
	$('.menu_bar').click(function(){
		// $('nav').toggle(); 

		if(contador == 1){
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}

	});

};
       </script>
       <script>
   var animateButton = function(e) {

  e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');
  
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button_new");

for (var i = 0; i < bubblyButtons.length; i++) {
  bubblyButtons[i].addEventListener('click', animateButton, false);
}
     </script>   
    
    
   
  <script>
$(document).ready(function() {
$("#create_new").click(function () {
$(this).text("Working....");
var delay = 2000;
var url = "+ads";
setTimeout(function () {
window.location = url;
}, delay);
});
});
</script>
    

  
   <script>
var options = {
	classname: 'my-class',
    id: 'my-id'
};
var nanobar = new Nanobar( options );
nanobar.go( 30 );
nanobar.go( 76 );
nanobar.go(100);
</script> 
    
 
<script>   
     $('document').ready(function(){
         refreshPrice();
     }
     );
     function refreshPrice(){
       $('#newsrow').load("engine/tabla_sell_news.php", 
            function(){
           setTimeout(refreshPrice, 5000);
   }); 
};
     </script>
 
<script>   
     $('document').ready(function(){
         refreshPriceB();
     }
     );
     function refreshPriceB(){
       $('#newsrowsB').load("engine/tabla_buy_news.php", 
            function(){
           setTimeout(refreshPriceB, 8000);
   }); 
};
     </script>  
    
   <script>  
$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').finish().delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').finish().delay(200).fadeOut(500);
});    
   </script>  
    <script>    
    function mayus(e) {
    e.value = e.value.toUpperCase();
}
          
</script>  
    <script>
  function letters(e) {
    var key = e.keyCode || e.which,
      key1 = String.fromCharCode(key).toLowerCase(),
      letters = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890",
      specials = [8, 37, 39, 46],
      key_special = false;

    for (var i in specials) {
      if (key == specials[i]) {
        key_special = true;
        break;
      }
    }

    if (letters.indexOf(key1) == -1 && !key_special) {
      return false;
    }
  }
</script> 
<script> 
var size = 150,
    thickness = 20;

var color = d3.scale.linear()
     
.domain([0, 15, 45, 60, 75, 100, <?php echo $highPrice ?> ])
.range(['red', '#db7f29', '#d1bf1f', 'yellow', '#48ba17', '#12ab24', '#0f9f59']);

var arc = d3.svg.arc()
    .innerRadius(size - thickness)
    .outerRadius(size)
    .startAngle(-Math.PI / 2);

var svg = d3.select('#chart').append('svg')
    .attr('width', size * 2)
    .attr('height', size + 20)
    .attr('class', 'gauge');
 
var chart = svg.append('g')
    .attr('transform', 'translate(' + size + ',' + size + ')')

var background = chart.append('path')
    .datum({
        endAngle: Math.PI / 2
    })
    .attr('class', 'background')
    .attr('d', arc);

var foreground = chart.append('path')
    .datum({
        endAngle: -Math.PI / 2
    })
    .style('fill', '#db2828')
    .attr('d', arc);

var value = svg.append('g')
    .attr('transform', 'translate(' + size + ',' + (size * .9) + ')')
    .append('text')
    .text(<?php echo $lowPrice ?>)
    .attr('text-anchor', 'middle')
    .attr('class', 'value');

var scale = svg.append('g')
    .attr('transform', 'translate(' + size + ',' + (size + 15) + ')')
    .attr('class', 'scale');

scale.append('text')
    .text(<?php echo $highPrice ?>)
    .attr('text-anchor', 'end')
    .attr('x', (size - thickness / 2)); 

scale.append('text')
    .text(<?php echo $lowPrice ?>)
    .attr('text-anchor', 'start')
    .attr('x', -(size - thickness / 2));

setInterval(function() {
    update(<?php echo $high_price_update ?> - <?php echo $last_price_update ?> + Math.random() * 50);
}, 1500);

function update(v) {
    v = d3.format('.1f')(v);
    foreground.transition()
        .duration(2000)
        .style('fill', function() {
            return color(v);
        })
        .call(arcTween, v);

    value.transition()
        .duration(2000)
        .call(textTween, v);
}

function arcTween(transition, v) {
    var newAngle = v / 100 * Math.PI - Math.PI / 2;
    transition.attrTween('d', function(d) {
        var interpolate = d3.interpolate(d.endAngle, newAngle);
        return function(t) {
            d.endAngle = interpolate(t);
            return arc(d);
        };
    });
}

function textTween(transition, v) {
    transition.tween('text', function() {
        var interpolate = d3.interpolate(this.innerHTML, v),
            split = (v + '').split('.'),
            round = (split.length > 1) ? Math.pow(10, split[1].length) : 1;
        return function(t) {
            this.innerHTML = '<tspan>±&nbsp;</tspan>' + d3.format('.1f')(Math.round(interpolate(t) * round) / round) + '<tspan>&nbsp;$</tspan>';
        };
    });
}

</script>

   
    <script type="text/javascript">
	$(document).ready(function(){
		$('#ntf').load('Notifications/fetch.php');
	});
</script>
<script>   
     $('document').ready(function(){
         refreshntf();
     }
     );
     function refreshntf(){
       $('#ntf').load("Notifications/fetch.php", 
            function(){
           setTimeout(refreshntf, 5000);
   }); 
};
     </script>   
    
<script type="text/javascript">
	$(document).ready(function(){
		$('#badge').load('Notifications/badge.php');
	});
</script>
<script>   
     $('document').ready(function(){
         refreshnbdg();
     }
     );
     function refreshnbdg(){
       $('#badge').load("Notifications/badge.php", 
            function(){
           setTimeout(refreshnbdg, 5000);
   }); 
};
</script>    
     <script>
         
     $('document').ready(function(){
 
     toastr["success"]("Welcome <?php echo $users ?> ");
     }
   );  
     
 toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "600",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
                         
</script>   
    
 
    
</body>
 </html> 