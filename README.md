# Mock company website
  This project emulates an internal company website that assists employees, promotes communication, and centralizes daily operations. It is inspired by a courier delivery service that books loads, manages drivers, and maintains relationships with brokers. To get started, clone the repository and run the files on a local server to fully explore the project, or try out the restricted demo version for a quick preview [here](https://soberox.github.io/website/website-static/guayan%20site/login/login_page.html).
## Login in
  You’ll first be greeted by the login page, and a popup should appear once you click the login button. The login popup will prompt you to log in, create an account, or reset your password. If your credentials are correct, you’ll be logged in to the dashboard with your username displayed in the top-right corner. If you decide to register, the page will take you to the registration form, where you must provide a valid and unique email, username, and password. Another option is to reset the password of an existing user; however, I don’t recommend this option right now, as the password will be changed but I’m still working on sending an email with the updated password.
## Logged in
  Once logged in, the pages you can access will depend on the account level set by the admin. The administrator level has access to the dashboard, drivers list, and software in use. The office level has access to the same pages, albeit with a restricted dashboard. The broker level only has access to the drivers list, as they are not part of the company.

At the top of each page is a banner with the company logo and name. If logged in, the banner will also display the user’s name in the top-right corner. Clicking on the name opens a dropdown with two options: logging out, which returns you to the login page, or deleting the user, which takes you to the delete user page.

Below the banner is the operations tab, which, when clicked, drops down a menu to help you navigate between pages.
## Operations
  Operations are the main pages that aids in assisting everyday operations of a logistic-delivery company. 
### Dashboard
- The dashboard displays relevant information about company goals and coordination. There are three tables: tasks, notes, and reports. Tasks can be viewed by both administrators and office workers, but only administrators can add new tasks that should be prioritized. The notes table can be viewed and updated by both administrators and office workers; it is used for quick reminders or information that should be readily accessible.

Below the tables is the reports section, which displays statistics relevant to the company’s performance. This section is only accessible to administrators.
### Driver
- The driver list is accessible to all users and primarily displays information about the drivers. Each driver dropdown box shows their name, vehicle measurements, phone number, location, and notes. Above each box is a profile circle intended to display a picture of their van. This tab is designed to help quickly identify a relevant driver by their vehicle and location, which is especially important for brokers and office workers when booking a load.
### Software
- The software page centralizes and catagorizes needed tools, and websites for business orperations. Only the administrator and office workers have access to this page.
## Function
  All pages are PHP files, while the demo versions are HTML-only. The popups require their respective JavaScript files, which control their appearance and toggling. The tables, users, and drivers are pulled from a database that primarily interacts with the login PHP file. In the full version, all data is generated and manipulated by several PHP files.
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

