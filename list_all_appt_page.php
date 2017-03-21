<?php
/* 
This page displays all appointments as well as to update and cancel them. Using DataTable jQuery functions, all appointments are sorted in an organized manner.
The update operation is done in a seperate page (light-box) hence its function is not called in this page.
*/
?>


<!-- custom script to do front-end cancel booking validation and call DELETE SQL operation -->
<script type="text/javascript" src="js/cancel_appt_script.js"></script>


<?php

echo '<div style="position:relative; top:0px; padding:0 20px;">
   <table id="ManageAppointmentsTable" class="display" >
	<thead>
	   <tr>
		<th></th>
		<th>Reg. Date</th>
                <th>Appt. Date</th>
                <th>Appt. Time</th>
		<th>Username</th>
                <th></th>            
            </tr>
        </thead>
   </table>
   <div class="cleaner h5"></div>
</div>';

?>


<!-- read all appointments from DB and load it into html table via json srray -->
<script src="js/datatable_custom_script.js"></script>

