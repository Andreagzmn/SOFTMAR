
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://momentjs.com/downloads/moment.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.3/fullcalendar.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.3/lang-all.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.3/fullcalendar.min.css">


	<script>
		$(document).ready(function(){
			$("#agenda").fullCalendar({ 
				lang: 'es',
				businessHours: true,

				header:{
					left: 'prev, next today',
					center: 'title',
					right:'month, basicWeek, basicDay'
				},
				events: [
					{
						title:'Día del aprendiz',						
						start: '2016-06-17'
					},
					{
						title:'Partido de Colombia vs Perú',						
						start: '2016-06-17T19:00:00',
						end: '2016-06-17T21:00:00'
					}
				],
				dayClick: function(view){
					alert('' + localhost)
				}
			});
		});


	</script>
</head>
<center><body>
	
	<div id="agenda" class="bgcontent center" style="width: 60%; height: 10%;"></div>
	
</body></center>
</html>