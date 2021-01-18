
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong><!--CCI Heritage Risk Management Database.--></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.11
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>
<!-- jQuery -->

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.12/sorting/date-eu.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
	   "order": [[ 0, "desc" ]]
    });
	$('#tblProject').DataTable({
	 "columns": [
      null,
      null,
      null,
      null,
      { "type": "date-eu" },
      null,
      null
	  ],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
	   "order": [[ 4, "desc" ]]
    });
  });
</script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="dist/js/charts.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script >

'use strict';

window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};

(function(global) {
	var MONTHS = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
	];

	var COLORS = [
		'#4dc9f6',
		'#f67019',
		'#f53794',
		'#537bc4',
		'#acc236',
		'#166a8f',
		'#00a950',
		'#58595b',
		'#8549ba'
	];

	var Samples = global.Samples || (global.Samples = {});
	var Color = global.Color;

	Samples.utils = {
		// Adapted from http://indiegamr.com/generate-repeatable-random-numbers-in-js/
		srand: function(seed) {
			this._seed = seed;
		},

		rand: function(min, max) {
			var seed = this._seed;
			min = min === undefined ? 0 : min;
			max = max === undefined ? 1 : max;
			this._seed = (seed * 9301 + 49297) % 233280;
			return min + (this._seed / 233280) * (max - min);
		},

		numbers: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 1;
			var from = cfg.from || [];
			var count = cfg.count || 8;
			var decimals = cfg.decimals || 8;
			var continuity = cfg.continuity || 1;
			var dfactor = Math.pow(10, decimals) || 0;
			var data = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = (from[i] || 0) + this.rand(min, max);
				if (this.rand() <= continuity) {
					data.push(Math.round(dfactor * value) / dfactor);
				} else {
					data.push(null);
				}
			}

			return data;
		},

		labels: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 100;
			var count = cfg.count || 8;
			var step = (max - min) / count;
			var decimals = cfg.decimals || 8;
			var dfactor = Math.pow(10, decimals) || 0;
			var prefix = cfg.prefix || '';
			var values = [];
			var i;

			for (i = min; i < max; i += step) {
				values.push(prefix + Math.round(dfactor * i) / dfactor);
			}

			return values;
		},

		months: function(config) {
			var cfg = config || {};
			var count = cfg.count || 12;
			var section = cfg.section;
			var values = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = MONTHS[Math.ceil(i) % 12];
				values.push(value.substring(0, section));
			}

			return values;
		},

		color: function(index) {
			return COLORS[index % COLORS.length];
		},

		transparentize: function(color, opacity) {
			var alpha = opacity === undefined ? 0.5 : 1 - opacity;
			return Color(color).alpha(alpha).rgbString();
		}
	};



	// INITIALIZATION

	Samples.utils.srand(Date.now());

	// Google Analytics
	/* eslint-disable */
	if (document.location.hostname.match(/^(www\.)?chartjs\.org$/)) {
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-28909194-3', 'auto');
		ga('send', 'pageview');
	}
	/* eslint-enable */

}(this));

</script>



<!--
<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						10,
						70,
						20
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Frequency / Rate',
					'Loss to each item affected',
					'Items affecteds'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					fontSize:20,
					text: 'Mourisco - incêndio'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
		
		//---------------------///
		var config2 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						42,
						12,
						46
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Frequency / Rate',
					'Loss to each item affected',
					'Items affecteds'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					fontSize:20,	
					text: 'Museu - Flutuação de UR'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
		
		//--------------------///
		var config3 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						15,
						50,
						35
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Frequency / Rate',
					'Loss to each item affected',
					'Items affecteds'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					fontSize:20,	
					text: 'Museu - Danos por insetos'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
//--------------------///
		var config4 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						5,
						15,
						80
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Frequency / Rate',
					'Loss to each item affected',
					'Items affecteds'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					fontSize:20,	
					text: 'Danos por projéteis'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
//--------------------///
		var config5 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						35,
						35,
						30
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Frequency / Rate',
					'Loss to each item affected',
					'Items affecteds'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					fontSize:20,	
					text: 'Museu - Roedores'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};
//--------------------///
		var config6 = {
			type: 'doughnut',
			data: {
				datasets: [{
					data: [
						42,
						12,
						46
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.blue,
						window.chartColors.yellow
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Frequency / Rate',
					'Loss to each item affected',
					'Items affecteds'
				]
			},
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					fontSize:20,	
					text: 'Museu - Colisão'
				},
				animation: {
					animateScale: true,
					animateRotate: true
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myDoughnut = new Chart(ctx, config);
			
			var ctx2 = document.getElementById('chart-area2').getContext('2d');
			window.myDoughnut = new Chart(ctx2, config2);		
			
			var ctx3 = document.getElementById('chart-area3').getContext('2d');
			window.myDoughnut = new Chart(ctx3, config3);
			
			var ctx4 = document.getElementById('chart-area4').getContext('2d');
			window.myDoughnut = new Chart(ctx4, config4);
			
			var ctx5 = document.getElementById('chart-area5').getContext('2d');
			window.myDoughnut = new Chart(ctx5, config5);
			
			var ctx6 = document.getElementById('chart-area6').getContext('2d');
			window.myDoughnut = new Chart(ctx6, config6);
		};

	</script>-->

<script>

	/*Função Pai de Mascaras*/
	function Mascara(o,f){
			v_obj=o
			v_fun=f
			setTimeout("execmascara()",1)
	}

	/*Função que Executa os objetos*/
	function execmascara(){
			v_obj.value=v_fun(v_obj.value)
	}

	/*Função que Determina as expressões regulares dos objetos*/
	function leech(v){
			v=v.replace(/o/gi,"0")
			v=v.replace(/i/gi,"1")
			v=v.replace(/z/gi,"2")
			v=v.replace(/e/gi,"3")
			v=v.replace(/a/gi,"4")
			v=v.replace(/s/gi,"5")
			v=v.replace(/t/gi,"7")
			return v
	}

	/*Função que permite apenas numeros*/
	function Integer(v){
			return v.replace(/\D/g,"")
	}

	/*Função que padroniza telefone (11) 4184-1241*/
	function Telefone(v){
			v=v.replace(/\D/g,"")                            
			v=v.replace(/^(\d\d)(\d)/g,"($1) $2") 
			v=v.replace(/(\d{4})(\d)/,"$1-$2")      
			return v
	}	
	
	function mtel(v){
		v=v.replace(/D/g,"");                 //Remove tudo o que não é dígito
		v=v.replace(/^(d{2})(d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
		v=v.replace(/(d)(d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
		return v;
	}

	/*Função que padroniza telefone (11) 41841241*/
	function TelefoneCall(v){
			v=v.replace(/\D/g,"")                            
			v=v.replace(/^(\d\d)(\d)/g,"($1) $2")   
			return v
	}

	/*Função que padroniza CPF*/
	function Cpf(v){
		
		v=v.replace(/\D/g,"")                                   
		v=v.replace(/(\d{3})(\d)/,"$1.$2")         
		v=v.replace(/(\d{3})(\d)/,"$1.$2")         
		v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
		
		return v
	}
	
	function Cnpj(v){
		
		v=v.replace(/\D/g,"")                              
		v=v.replace(/^(\d{2})(\d)/,"$1.$2")      
		v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") 
		v=v.replace(/\.(\d{3})(\d)/,".$1/$2")              
		v=v.replace(/(\d{4})(\d)/,"$1-$2")                        
		
		return v  	
	}
		
	

	/*Função que padroniza CEP*/
	function Cep(v){
			v=v.replace(/D/g,"")                            
			v=v.replace(/^(\d{2})(\d{3})(\d)/,"$1.$2-$3") 
			return v
	}
	 

	/*Função que padroniza DATA*/
	function Data(v){
			v=v.replace(/\D/g,"") 
			v=v.replace(/(\d{2})(\d)/,"$1/$2") 
			v=v.replace(/(\d{2})(\d)/,"$1/$2") 
			return v
	}


	/*Função que padroniza RG*/        
	function Rg(v){
		v=v.replace(/\D/g,"");
			v=v.replace(/(\d{2})(\d)/,"$1.$2")         
			v=v.replace(/(\d{3})(\d)/,"$1.$2")         
			v=v.replace(/(\d{3})(\d{1,1})$/,"$1-$2")			
			return v;
	}
	
	
</script>	
<script language="javascript">   
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
 </script>
 <script language="javascript">   
function moeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
 </script>  
<!-- InputMask -->

</body>
</html>