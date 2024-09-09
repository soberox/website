# Mock company website
  this project is trying to emulate a internal company website that; assists its employees, promotes communication, and centralizes daily operations. The company in question is inspired by a courrier delivery company that books loads, manages drivers, and has relations with brokers. To fully try out my webiste run these files on a localserver, but you can try a restricted demo [here](https://soberox.github.io/website/website-static/guayan%20site/login/login_page.html).
## Login in
  You'll first be greeted by the login page, a popup should appear once you click the login page. The loging-popup will prompt you to login, create an account or reset password. If your credentials are right then you login to the dashboard with your username in the top-right corner. If you decide to register, the page will take you to the registration page, where you must provide an appropriate email, and unique email, username, and password. Another option is to reset the password of an existing user, **for right now I dont recommend this option as the password will be changed but im still working on sending an email detailing the password**.
## Logged in
  Once logged in, depending on the account level set by the admin you'll get access to different pages. The administrator level gets access to the dashboard, drivers list, and software in use; the office level will have access to the same pages albiet with a restricted dashboard. The broker level will only get access to the driver's list, as they are not part of the company. On top of eachpage will be a banner with the company logo and name. If logged in, the banner will display the user's name on the top-right corner; when clicked a dropdown will show two options, logging out which will take you to the log in page, or delete user which will take to the delete user page. below the banner will be the operations tab, which when clicked will dropdown a menu that would help you navigate between pages.
## Operations
  Operations are the main pages that aids in assisting everyday operations of a logistic-delivery company. 
### Dashboard
- The dashboard aids in showing relevent information company goals, and coordination. There are three table; tasks, notes, and report. Tasks can be seen by both administrator and office worker, but only the administrator could add a new taks that should be focused on. The notes table can be viewed and added to by both administrator, and officeworker; the notes table is used for quick and short reminders or information readibly accessable.
- Below the tables is the report section, that display statistic relevent to the company's standing. Only accesable by the administrator
### Driver
- The driver list is accessible to all users, and mainly display information about the drivers. Each driver droptdown-box displays their name, vehicle measurements, phone, location and notes; above each box is a profile circle that is supposed to house a picture of their van. This tab aims to easily identify a relevant driver by their vehicle, and location, which is important for brokers and office workers trying to book a load.
### Software
- The software page centralizes and catagorizes needed tools, and websites for business orperations. Only the administrator and office workers have access to this page.
## Function
  All pages are php files, with the demo versions being html only. The pop-ups required thier respective js file, that would change flip their apperence on and off. The tables, users, and drivers pulls from a database that mainly interacts with the login php file. Each data in the full version is generated and manipulated by several php files.
## Sources
  here are some sources and tutorials where I might have pulled some influence from. If I did not credit a source, then I would humbly ask to comment downbelow so I could quickly add them. Thank you to these awesome creators who would made this project possible
  - https://www.youtube.com/watch?v=cbwLMSNkul0
  - https://www.youtube.com/watch?v=ai7T1p3Xj8A
  - https://www.youtube.com/watch?v=NbGdabN5B5M&t=3s
  - https://www.youtube.com/watch?v=pdsfCLtNqus
  - https://www.youtube.com/watch?v=NqP0-UkIQS4
  - https://stackoverflow.com/questions/37153877/grant-all-privileges-to-all-users-on-a-host-in-mysql
  - https://stackoverflow.com/questions/9766014/connect-to-mysql-on-amazon-ec2-from-a-remote-server
  - https://stackoverflow.com/questions/13968494/how-to-delete-a-column-from-a-table-in-mysql
  - https://stackoverflow.com/questions/20738329/how-to-call-a-php-function-on-the-click-of-a-button
  - https://stackoverflow.com/questions/16056591/font-scaling-based-on-size-of-container
  - https://stackoverflow.com/questions/31178653/how-to-keep-active-css-style-after-click-a-button

