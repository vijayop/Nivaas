# Nivaas

Society management has daily challenges to fulfill. Our day to day needs such as Water supply, Electricity, Security and many more things which directly or indirectly plays vital role in residential life, comes under Society Management. In most of the cases, Society management practices a traditional way of communication. This certainly has some limitations and disadvantages. Daily notices, monthly meetings, cultural events, miscellaneous contacts for daily needs, security alerts, high priority communication and many others which may not be conveyed properly in current scenario as most of the things are getting handled manually. It lacks transparency. To overcome the problems occurring due to this time lagging manual system, an automated system needs to be developed.

Steps to run this project on your pc : 
1) Install Xampp sever in your pc 
2) go to - local disc C => Xampp => htdoc , and paste Nivaas_website there
3) you can keep python code folder wherever you want in your pc 
4) while running python code , make sure you have necessary libraries installed (opencv , easyocr, mysql.connector)
5) run xampp and start Apache and MySQL servers
6) write "localhost/phpmyadmin/" in searchbar and phpmyadmin will be opened 
7) create a new database called "nivaas"
8) click on nivaas and then click on "export" and then export the sql file given in this github repository. 
9) now write "localhost/Nivaas_website" in the searchbar and then open "login.php" file 
10) if we login using name admin , then we will get admin privillages such as editing and deleting any requests
11) if we login using name other than admin, then we can send request to the admin
12) run python code and scan a number-plate of a vehicle using any camera , when the frame is still press "S" to capture a picture 
13) the numberplate and arrival time of the vehicle will be noted, if the same numberplate is scanned again then that time will be noted as departure time 
