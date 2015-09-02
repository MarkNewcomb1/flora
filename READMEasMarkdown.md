CONTENTS OF THIS FILE
---------------------
   
 * Introduction
 * Database Outline
 * Maintainers
 
 INTRODUCTION
------------
The purpose of this application is to gather information on local flora in the state of Colorado via user-submitted data, with an emphasis on ease of use for the end-user submitting information through the use of a form on a responsive site, most likely on a smartphone in the field. The information gathered includes an optional name of the user, a unique non-sequential identifier for the record, a timestamp, name of the plant, soil conditions, weather conditions, location, and a notes field for any other relevant information. 

A privileged user will then have access to the database through a password-protected login and be able to view the information in a browser, with the option to download the information in a report form (CSV file) that can then be imported into a Microsoft Excel spreadsheet. This user will  be able to add users and edit entries. The end-user will not have access to this information, but rather a user with administrative privileges. 


 DATABASE OUTLINE
-------------
+--------------------+--------------+
|       Field        |  Data Type   |
+--------------------+--------------+
| Observer Name      | VARCHAR(50)  |
| Unique Identifier  | INT          |
| Name of Plant      | VARCHAR(100) |
| Soil Conditions    | ARRAY        |
| Weather Conditions | VARCHAR(50)  |
| Date/Time          | TIMESTAMP    |
| Location           |  VARCHAR(50) |
| Notes              | VARCHAR(200) |
+--------------------+--------------+



 FORM OUTLINE
-------------
+--------------------+------------+
|       Field        | Form Field |
+--------------------+------------+
| Observer Name      | text       |
| Unique Identifier  | hidden     |
| Name of Plant      | text       |
| Soil Conditions    | select     |
| Weather Conditions | text       |
| Date/Time          | datetime   |
| Location           |  text      |
| Notes              | textarea   |
+--------------------+------------+
   
 MAINTAINERS
-----------
Current maintainers:
 * Mark Newcomb - https://github.com/MarkNewcomb1

This project has been sponsored by:
 * Weblab Backend Development Boot Camp