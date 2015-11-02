# TABLE OF CONTENTS
---------------------
   
### [Introduction] (#a1)
### [Database Outline] (#a2)
### [Form Outline] (#a3)
### [Client-side Outline] (#a4)
### [Optional Features] (#a5)
### [Maintainers] (#a6)

<a name="a1"/>
# INTRODUCTION
------------
![] (http://goldenarmor.com/storage/JUMBOAUDREY2.jpg?__SQUARESPACE_CACHEVERSION=1380715610070)

The purpose of this application is to gather information on local flora in the state of Colorado via user-submitted data, with an emphasis on ease of use for the end-user submitting information through the use of a form on a responsive site, most likely on a smartphone in the field. Flora is defined as the plants of a particular region, habitat, or geologic period. For this database, flora is defined
as plants currently found growing in the state of Colorado. The information gathered includes an optional name of the user, a unique non-sequential identifier for the record, a timestamp, name of the plant, soil conditions, weather conditions, location, and a notes field for any other relevant information. This website and database are being used to gather a current status of the Flora in Colorado, as well as to detect changes in the flora over time.

A privileged user will then have access to the database through a password-protected login and be able to view the information in a browser, with the option to download the information in a user-generated report form (CSV file) that can then be imported into a Microsoft Excel spreadsheet. This user will  be able to add users and edit entries. The end-user will not have access to this information, but rather a user with administrative privileges. 


<a name="a2"/>
# DATABASE OUTLINE
-------------
| Field              | Data Type    |
|--------------------|--------------|
| Observation ID     | INT(11)      |
| Observer Name      | NVARCHAR(50) |
| Plant Name         | NVARCHAR(100)|
| Soil Conditions    | NVARCHAR(100)|
| Weather Conditions | NVARCHAR(50) |
| Date/Time          | TIMESTAMP    |
| Location           | NVARCHAR(200)|
| Latitude           | DECIMAL(9,6) |
| Longitude          | DECIMAL(9,6) |
| Notes              | NVARCHAR(255)|
<a name="a3"/>
# FORM OUTLINE
-------------
|Field               | Form Field |
|--------------------|------------|
| Unique Identifier  | hidden     |
| Person's Name      | text       |
| Plant Name         | text       |
| Soil Conditions    | text       |
| Weather Conditions | text       |
| Date/Time          | timestamp  |
| Location           |  text      |
| Latitude           |  hidden    |
| Longitude          |  hidden    |
| Notes              | textarea   |
| Submit             | submit     |

<a name="a4"/>
# CLIENT-SIDE OUTLINE   [coloradoflorafinders.com]


Welcome to Colorado Flora Finders.  Thank you for helping us in our efforts to catalog all the Flora (aka Plants)
currently found growing in the state of Colorado.

You may enter as many Plants from as many locations as you like.  The Plants entered must be planted in the ground and
be growing outside.  They may be perennials or annuals.

### DATA FIELDS

Each data field to have an explanation of what data is to be entered in that field, either on the web page and/or in a
hover text box.

1.  Enter your name:  *[Enter the name of the Plant, if known.  Otherwise enter a brief description of the Plant.]*
    - Text Box
    - Datatype is VARCHAR(50)
    
2. Plant Name: *[Enter the name of the Plant, if known. Otherwise enter a brief description of the Plant.]*
    - Text Box
    - Datatype is VARCHAR(100)

3.  Soil Conditions  *[Enter any combination of Clay, Loam, Peat, Rocky, Sand, or Silt descriptors as well
    as Soil Color.]*
    - Text Box
    - Datatype is VARCHAR(100)

4.  Weather Conditions  *[Enter the weather conditions while observing the Plant.  Enter any combination
    of Sunny, Partly Sunny, Cloudy, Raining, Snowing, Fog, Misting, Windy, etc.  Also enter an estimate of
    the Temperature.]*
    - Text Box
    - Datatype is TBD

5.  Date/Time 
    - Text Box
    - Datatype is TBD

6.  Location  *[Enter the location where the Plant was seen. If you have connectivity and you allow us to determine your location, we will enter in this field for you.]*
    - Text Box
    - Datatype is TBD

7.  Additional Notes     *[Add any additional notes and observations.]*
    - Text Box
    - Datatype is VARCHAR(255)

### BUTTONS

1.  Submit Button

    Checks that all user entered fields contain valid data.  If not, then returns the user to the Main Page
      with the missing data field(s) highlighted in red.  If correct, goes to Data Submitted Page.


### DATA SUBMITTED PAGE    [coloradoflorafinders.com/thankyou]


Thank you (Name of person entering the record from Main Page) for submitting this Plant data.

Please enter as many Plants as you wish.

- Optional Feature - Button to Enter another plant.

### BUTTONS

1.  Enter Another Plant Button
    
    Return to Main Page but keep the person's Name, Soil Conditions, Weather Conditions, and Location
      fields.



## **REPORT PASSWORD PAGE**     [coloradoflorafinders.com/report]

This page allows you to generate a report of all the Flora records currently in the Flora Finders database ordered by
the Date and Time they were entered.

### DATA FIELDS

1.  Password     [To generate the report enter your password.]

    Text Box

Validate password.  If not valid, generate error message and focus cursor on the text box.  If correct, activate the
Generate Report button.

### BUTTONS

1.  Generate Report     [List all items in the Flora database sorted by date and time entered.]
    - button to generate report on screen
    - Optional Feature - button to create pdf report.
    
<a name="a5"/> 
# OPTIONAL FEATURES
-----------
- access weather api to gather weather conditions when observation is taken.
- access geocoding api to get latitude and longitude of location when observation is taken.

<a name="a6"/>   
# MAINTAINERS
-----------
### Current maintainers:
* Mark Newcomb - https://github.com/MarkNewcomb1
----------------------
This project has been sponsored by:
 * Weblab Backend Development Boot Camp