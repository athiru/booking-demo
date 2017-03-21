# Doctor Appointment Booking Management

This application allows you to **add, remove and update doctor's appointments**.

Table of Contents:
1. Overview
2. Features
3. Installation
4. Requirements
5. Limitations (Known Issues)

Overview
========
Doctor Appointment Booking Management is a simple web-based application to **add, remove and update doctor's appointment** from a set of **available time-slots in a calendar**. For demo purposes, all bookings are stored in AWS RDS free tier account. The bulk of the code is written in PHP and JavaScript. 

**File Structure:**<br>
*config/* (configuration file)<br>
*css/*(CSS files)<br>
*js/* (JS functions)<br>
*php/* (PHP functions & include files)<br>
*index.php*<br>
*add_appt_page.php* (add appointment page)<br>
*list_all_appt_page.php* (list all appointments page)<br>
*update_appt_page.php* (update an appointment page)<br>

**Database Structure:**
1. Table 1: name{APPOINTMENTS}, fields{REG_DATE, USERNAME^, REASON, APPT_DATE^, APPT_TIME^}
2. Table 2: name{REASONS_FOR_VISIT}, fields{ID^, REASON}
3. Table 3: name{TIME_SEGMENTS}, fields{ID^, TIME_SEGMENTS}<br>
(^ denotes primary key)


Features
=========
* There are 3 main operations. Add Appointment, Update Appointment and Remove Appointment.
* Before and after an operation, the user is alerted with a **confirmation**.
* When viewing all appointments, data is put into an efficient (sortable/searchable) html table. 

* The user can **book an appointment from an available time slot**.
* After booking an appointment, this time slot becomes unavailable. Pass dates also become unavailable.
* The user can at anytime **remove or update the appointment**.

* A booking has 4 inputs: username, reason for visit, appointment date and time.
* "Reasons to visit" are predefined. Time slots are also predefined as weekdays, 9am to noon, 1pm to 4pm with a 1/2 time slot). Both informations are stored in the DB.


Installation
=============
**This is a web-based application. You will need a server. As for the DB access, you can use AWS RDS that I've created. The DB details will be sent seperately via email.**
1. Upload the zip file from GitHub to your server
2. After unzipping the file, go to **config** folder and update the DB username and password that was sent via email. 
3. Run index.php from a browser.


Requirements
=============
* PHP 4.7+


Limitations (Known Issues)
==========================
* Pass appointment dates are disabled in the calender however the timings can be still be updated. 
