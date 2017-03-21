# Doctor Appointment Booking Management

Appointment Booking Application allows you to add, remove and update appointments from a set of available time-slots in a calendar.

Table of Contents:
1. Overview
2. Features
3. Requirements
4. Limitations (Known Issues)

Overview
========
Doctor Appointment Booking Management is a web-based application to **add, remove and update doctor's appointment** from a set of **available time-slots in a calendar**. For demo purposes, all bookings are stored in AWS RDS free tier account. The bulk of the code written in PHP and JavaScript. 

File Structure:
config/       				configuration file            
css/          				CSS files
js/           				JS functions
php/          				PHP functions & include files
index.php
add_appt_page.php			add appointment page
list_all_appt_page.php		list all appointments page
update_appt_page.php		update an appointment page


Database Structure:
1. Table 1: name{APPOINTMENTS}, fields{REG_DATE, USERNAME^, REASON, APPT_DATE^, APPT_TIME^}
2. Table 2: name{REASONS_FOR_VISIT}, fields{ID^, REASON}
3. Table 3: name{TIME_SEGMENTS}, fields{ID^, TIME_SEGMENTS}
(^ denotes primary key)
