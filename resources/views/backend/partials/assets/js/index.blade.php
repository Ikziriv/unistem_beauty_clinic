    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{url('_backend/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/wickedpicker@0.4.3/dist/wickedpicker.min.js"></script>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    
    <script src="{{url('_backend/assets/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('_backend/assets/js/custom.js')}}"></script>
    {{-- <script>
	    window.onload = function () {
        	var chart1 = document.getElementById("line-chart").getContext("2d");
        	window.myLine = new Chart(chart1).Line(lineChartData, {
        	responsive: true,
        	scaleLineColor: "rgba(0,0,0,.2)",
        	scaleGridLineColor: "rgba(0,0,0,.05)",
        	scaleFontColor: "#c5c7cc"
        	});
        };
	</script> --}}
    <script type="text/javascript">
      $('.time_picker').timepicker({
          timeFormat: 'h:mm p',
          interval: 60,
          minTime: '6',
          maxTime: '9:00pm',
          defaultTime: '6',
          startTime: '06:00',
          dynamic: false,
          dropdown: true,
          scrollbar: true
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bs4_table').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function () {
            $('.timepicker').wickedpicker('time');
        });
    </script>
    <script type="text/javascript">
      $('#bs-example-navbar-collapse-1').on('show.bs.collapse', function() {
        $('.nav-pills').addClass('nav-stacked');
      });

      //Unstack menu when not collapsed
      $('#bs-example-navbar-collapse-1').on('hide.bs.collapse', function() {
          $('.nav-pills').removeClass('nav-stacked');
      });
    </script>
    <script type="text/javascript">
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>