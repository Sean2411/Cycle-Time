This is a web application project for predicting the best service provider for clients.

Created by Sean Lu, Jet Liu, and Yi Wang.


Descriptions:  
The project include two systems:  
Admin System 
Client System

- Admin System is primarily focus on loading client Data and mapping into JVA database. Besides when clients don't want to use tool by himself,  Admin System can also help them to predict.  

- Client System is primarily focus on fetch data from the database which is already set up, then use those data to accomplish prediction.

The main functionalities of System.  

1. SignUp (Admin side):  

- The administer should signup before log into the system.  
- The administer should help client to signup their UserID and Password after the administer log into the system.
- Clients can not signup by themselves.  

2. Reset Password (Admin side):  

- The administer can reset their Password by following steps:  
I. Enter the E-mail address that used to signup;  
II. Answer the secret question;  
III. Receive E-mail;  
IV. Use the URL in the E-mail to reset Password.  

- Clients can not reset Password by themselves, if they want, they need contact us.  

3. Loading and Mapping Data (Admin side):   

- This model allows administer to mapping both Event detail and Cycle into JVA database.  

4. Process Map (Admin side & Client side):  

- This model allows clients to choose Cycle Time, which have created in the mapping step, and to create new combined sets (default combined number is two) into Process Map.  

5. Get Champion (Admin side & Client side):  

The model generates finial report for clients. There will be 3 best results (customers) displayed by ranking. And the contents include customers information, time cost, campaign information and subtype information.  



Notice:   

* About the password reset  

We already created into Admin side.  


* About the form validation  

We tried to add form validation to protect Malicious Injection by using both javascript and php. But we realize these two ways is not compatible. Therefore, we did comment all part of php about form validation so that we can use them in the future.  





Primary files detail:
Database —— local.sql  


Client side (folder name: client_final):  

- login_usr.php —— login page for entering username;  

- login_pw.php —— login page for entering password;  

- check_pw.php —— for confirming username and password are right or not;  

- CT.php —— for clients to confirm existing Cycle Time and create new Cycle Times;  

- cycletime.php —— for confirming all the information of client in the database;  

- processmap.php —— Process Map model that mentioned above;  

- process_create.php —— for creating a new process  

- set_create.php —— for creating a new set  

- processanalysis.php —— for selecting campaign type and subtype  

- process_champion.php —— for the final calculate  


Admin side (folder name: final):  

- admin.php —— login page;  

- signup.php —— signup page;  

- findpw_*.php —— all the files that has a name start with “findpw_” are for reset password;  

- adminsystem.php —— home page for admin side;  

- client.php —— for set client profile to database;  

- CT.php —— for clients to confirm existing Cycle Time and create new Cycle Times;  

- cycletime.php —— for confirming all the information of client in the database;  

- processmap.php —— Process Map model that mentioned above;  

- process_create.php —— for creating a new process;  

- set_create.php —— for creating a new set;  

- processanalysis.php —— for selecting campaign type and subtype;  

- process_champion.php —— for the final calculate.
