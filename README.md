# aotca

README.md

***Production to Development***
1.	Install MAMP 4.1.1 (Downloading the free version will be suffice. MySQL and PHP will automatically be installed)

2.	Once it has installed, open the application and click “Preferences” then “Ports” on the navigation bar. If Apache Port and MySQL Port is not 8888 and 8889 respectively, change it so it is

3.	Next click “Start Servers” (MySQL and Apache Server should both be checked on the upper right hand corner)

4.	Navigate to the MAMP application folder
<br /> a.	eg. It should be in the directory /Applications/MAMP/

5.	Delete the htdocs folder

6. Git clone the repository into the MAMP folder by navigating to the directory in terminal and pasting the following command.
<br /> a.	```Git clone https://github.com/altitudelabs/aotca.git htdocs```

7.	Next go to localhost:8888/phpmyadmin

8.	Create a new database by clicking on the “New” button in the top left hand corner and name it “aotca”.

9.	Next click on the “aotca” database you just created on the left sidebar and click import on the navigation bar

10.	Click choose file and navigate to the htdocs folder. Look for a file called “aotca.sql” and click open

11.	Click “Go” at the bottom. If everything went well, you should be greeted with a green status message

12.	Next click on the database and navigate to a table on the left sidebar called “wp_options”. Click on “Browse” near the top and change the option_values of option_id 1 and option_id 2 to http://localhost:8888/ by double clicking it

13.	Next navigate to http://localhost:8888/ (It should prompt you to a wordpress configuration setup page)

14.	When prompted to enter in details, enter the following details
<br /> a.	Database: aotca
<br /> b.	Username: root
<br /> c.	Password: root

15.	Click next and run the installation.

16.	Login with the following details
<br /> a.	Username: dev
<br /> b.	Password: Altitude123!

# END WordPress

***Deploying from Development to Production***

*staging*
```
  cd <Project>
  bash deploy/staging.sh
```
*export database*
* Navigate to http://localhost:8888/phpmyadmin and login
* Click on the "**"aotca"** database on the left sidebar then the **"Export"** button followed by **"Go"** at the bottom.
* Save the .sql file somewhere safe.

*import database*
* Navigate to production phpmyadmin page.
* If **"aotca"** database already exists, click on the **"SQL"** tab on the navigation bar.
  * Paste and run the following command:
  ```
    DROP DATABASE aotca;
  ```
* Click **"New"** on the left sidebar to create a new database and name it "***aotca***".
* Click **"Import"** on the top navigation bar, upload the .sql file just now and press **"Go"**.


## ***Content Management***

*Go to “website name”/wp-admin and login with username and password*

![Wordpress Login](https://raw.githubusercontent.com/altitudelabs/aotca/readme_update/img/wordpress_login.png)

## Table of Contents
1. [Front Page](#front-page)
2. [About AOTCA](#about-aotca)
3. [Organisation Chart of AOTCA](#organisation-chart-of-aotca)
4. [AOTCA Officers](#aotca-officers)
5. [Committees](#committees)
6. [Statutes](#statutes)
7. [Officers Detail Page](#officers-detail-page)
8. [Other Documents](#other-documents)
9. [Members](#members)
10. [Member](#member)
11. [News](#news)
12. [News Detail](#news-detail)
13. [Events](#events)
14. [Events Detail](#events-detail)
15. [Publications](#publications)
16. [Document Pages](#document-pages-opinion-statements-agenda-etc)
17. [Gallery](#gallery)
18. [Gallery Detail](#gallery-detail)
19. [Contact Us](#contact-us)
20. [Legal Page](#legal-page)



#### FRONT PAGE

Site Logo

* Edited by Themify.
* To edit, click customize on the nav bar.
* Navigate to the ***"site logo and tagline"*** section, click on ***"site logo"*** and upload an image.

Navigation Bar

* Menu links can be edited by going to Wordpress Dashboard, clicking on appearance on the left sidebar, then menus.
* When prompted to choose a menu to edit, click on “Top Nav”.
* To append a new link/page to the menu, go to the left sidebar, select a page, then click “add to menu”. After that is done, drag the link to change the order. Indent the links if you want the page to show as a listed item when hovered.

![Nav Bar Instructional Image](https://raw.githubusercontent.com/altitudelabs/aotca/readme_update/img/nav_bar_help.png)

Slider
* Slider is edited by "Smart Slider" plugin. Start editing by going to the dashboard then clicking on the “Smart Slider” plugin on the left sidebar, then clicking on AOTCA front page.
*	New slides can be added by clicking on the “New Slide” button or edited by hovering over it and clicking on the “Edit” button
*	Click on background to apply a background image or background gradient
*	Click on the green “+” button to add headers, images or texts. Text size, color, padding, and margin can all be edited when hovered.
*	To change the design on mobile phones and tablet, click on the respective buttons next to “preview” in the navigation bar


![Slider Instructional Image](https://raw.githubusercontent.com/altitudelabs/aotca/readme_update/img/smart_slider_instruction.png)

Horizontal Reel
*	Horizontal reel is edited by going to the dashboard, then clicking on Settings, then “Image Horizontal Reel Scroll Slideshow”
*	If there is a specific group of images you want to show, you can just add an image by clicking on the “add new” button, and assign it to a group. You can also configure the order, where each image links to and whether the new link opens in the same or new window.
*	The current shortcode is

```
  [ihrss-gallery type="GROUP2" w="1920" h="70" speed="1" bgcolor="#F2F3F7" gap="80" random="NO"].
```

* Width, height, speed, background color, the gap between each image and even randomness can be edited here.

![Home Page Code](https://raw.githubusercontent.com/altitudelabs/aotca/readme_update/img/home_page.png)

Our Story Section
*	Edited by Themify Builder
*	To edit, turn on the builder by clicking on the yellow button on the nav bar
*	Double click on the “Our Story” text module or the short paragraphs module to add or change content. Styling can also be adjusted by clicking on the “style” button on the top left corner of the box.
*	When done, press save on the popup box and save again on the module box.
*	By default, there are also two text modules that are images of arrows that are only displayed in mobile view.
*	Javascript interaction is managed in themify settings which can be accessed through dashboard. Currently pure javascript and not embedded by wp_enqueue function.

President Section
*	Same editing process as above

First Feature Row
*	Desktop version
*	To edit image, click on the image, click on the edit button to get prompted to a list of options you can change including caption, image dimensions, and image link.

Second Feature Row
*	Mobile version (By default hidden in desktop view)
*	Same as “First Feature Row”

[Back to Table of Contents](#table-of-contents)


#### ABOUT AOTCA
*	Edited by Themify
* Turn builder on by hovering over ***"Themify Builder"*** then clicking turn builder on.
*	Double click to add and change styling.

![About Page Instructions](https://raw.githubusercontent.com/altitudelabs/aotca/readme_update/img/about_page_instruction.png)

[Back to Table of Contents](#table-of-contents)


#### ORGANISATION CHART OF AOTCA
*	Edited by Themify
*	Double click to add and change styling.

[Back to Table of Contents](#table-of-contents)

#### AOTCA OFFICERS
*	Edited by Themify
*	To add, click on the text with the styling you want to replicate and press the duplicate button. Double click to change the content. Drag to change position and order.
*	To change links, click on the edit button, then the settings button. There you can edit both link text and url

[Back to Table of Contents](#table-of-contents)

##### COMMITTEES
*	Edited by Themify
*	To add, click on the text with the styling you want to replicate and press the duplicate button. Double click to change the content. Drag to change position and order.
*	To change links, click on the edit button, then the settings button. There you can edit both link text and url

[Back to Table of Contents](#table-of-contents)

#### STATUTES
*	Edited by Themify
*	Double click to add and change styling.
*	To add, click on the text with the styling you want to replicate and press the duplicate button. Double click to change the content. Drag to change position and order.
*	Alternatively, could also copy a particular module and paste it in another module’s spot if drag and reorder distance is too far.

[Back to Table of Contents](#table-of-contents)

#### OFFICERS DETAIL PAGE
* Edited by ACF Custom Fields
* To add a new officer page, go to dashboard, pages then add new officer. Critical to set ***page parent equal to AOTCA Officers page or Committees page***. otherwise input fields for adding a new officer will not show. Finally click publish.
* To edit an existing officer,choose the officer page you want to change and edit the respective fields.

***Keywords***

*To access data, first retrieve using get_fields(get_the_ID()) on any officer detail page*

**Fields include:**

* image
* name
* position
* professional_status
* memberships
* academic_background

[Back to Table of Contents](#table-of-contents)

#### OTHER DOCUMENTS
* Edited by ACF Custom Fields
* To add new documents for Other Documents section, go to dashboard, pages then ***other documents***.
* Click on the "+" button and input new name and file.

***Keywords***

*To access data, first retrieve using get_fields(get_the_ID()) on any publication detail page*

**Fields include:**

* documents
  * title
  * date
  * file
  * protected

[Back to Table of Contents](#table-of-contents)

#### MEMBERS
* Edited by Themify
* To add a new member in members, click ***add a new row*** at the bottom of each member type.
* Add the respective fields.

[Back to Table of Contents](#table-of-contents)

#### MEMBER
* Edited by Themify
* To add a new individual member page, go to dashboard and create a new page by clicking on "pages" on the left, followed by "add new"
* Go to the page attributes box on the right and set ***page parent is equal to Members page***. Finally click publish.
* Copy the editable part of the permalink given for that particular member, you will need it for later.
* Once created, click on view page. Drag the ***"member module"*** on the page and populate the respective member information.
* To add or edit map for a particular member, drag or double click the ***"map module"***. There you have the option to input the address you want to show in Google Maps.
* Finally navigate back to the *Members page*. Turn on the builder, double click on the ***members module*** and paste the link you copied earlier for the respective member.

[Back to Table of Contents](#table-of-contents)

#### NEWS
* Edited by Themify
* To add a new news event in the news page, click ***add a new row*** at the bottom.
* Add the respective fields.

[Back to Table of Contents](#table-of-contents)

#### NEWS DETAIL
* Edited by Themify
* To add a new individual news page, go to dashboard and create a new page by clicking on "pages" on the left, followed by "add new".
* Go to the page attributes box on the right and set ***page parent is equal to News page***. Set the title. Finally click publish.
* Once created, copy the editable part of the permalink to your clipboard. You will need it for later.
* Click on view page and drag the ***"news-detail module"*** on the page and populate the respective news information.
* Navigate back to the *News page*, turn the builder on, double click on the ***"news module"*** and paste the link for the respective news event.

[Back to Table of Contents](#table-of-contents)

#### EVENTS
* Edited by Themify
* To add a new event in the event page, click ***add a new row*** at the bottom.
* Add the respective fields.

#### EVENTS DETAIL
* Edited by Themify and Advanced Custom Fields
* To add a new individual event page, go to dashboard and create a new page by clicking on "pages" on the left, followed by "add new".
* Go to the page attributes box on the right and set ***page parent is equal to Events page***. Set the title. Finally click publish.
* Once created, copy the editable part of the permalink to your clipboard. You will need it for later.
* Click on view page and drag the ***"event-detail module"*** on the page and populate the respective events information.
* To add documents and event photographs for a particular event, click "edit page". Scroll down to the bottom to add information.
* Navigate back to the *Events page*, turn the builder on, double click on the ***"events module"*** and paste the link copied earlier for the respective event.

***Keywords***

*To access data, first retrieve using get_fields(get_the_ID()) on any event detail page*

**Fields include:**

* itinerary_document
* general_information_documents
* conference_documents
* council_agenda_documents
* council_minutes_documents
* meeting_agenda_documents
* meeting_minutes_documents
* sgatar_documents
* event_photographs

**All documents aside from itinerary have subfields:**
* title
* file
* protected

[Back to Table of Contents](#table-of-contents)

#### PUBLICATIONS
* Edited by Themify
* To add a new event in the publications page, click ***add a new row*** at the bottom and add the respective fields.
* To edit, double click and edit the respective fields.

[Back to Table of Contents](#table-of-contents)

#### DOCUMENT PAGES (Opinion Statements, Agenda, etc.)
* Edited by Advanced Custom Fields
* To add a new individual event page, go to dashboard and create a new page by clicking on "pages" on the left, followed by "add new".
* Go to the page attributes box on the right and set ***page parent is equal to Publications page***. Set the title. Finally click publish.
* Once created, copy the editable part of the permalink to your clipboard. You will need it for later.
* To add documents and event photographs for a particular event, scroll down to the bottom to add information.

[Back to Table of Contents](#table-of-contents)

#### GALLERY
* Edited by Themify
* Double click on the ***"AOTCA gallery module"***. Click ***"add a new row"*** to add a new event for gallery.
* Fill in the respective information for image, date, title and link.

[Back to Table of Contents](#table-of-contents)

#### GALLERY DETAIL
* Edited by Themify
* To add a new individual gallery detail page, go to dashboard and create a new page by clicking on "pages" on the left, followed by "add new".
* Go to the page attributes box on the right and set ***page parent is equal to Gallery page***. Set the title. Finally click publish.
* Once created, copy the editable part of the permalink to your clipboard. You will need it for later.
* Click on view page, turn on the builder and drag the ***"gallery module"*** on the page and select which images you want to show for that particular gallery event by pressing the upload or browse library button. To select multiple images, press ***shift*** and click.
* Navigate back to the *Gallery page*, turn the builder on, double click on the ***"AOTCA gallery module"*** and paste the link for the respective gallery event.

[Back to Table of Contents](#table-of-contents)

#### CONTACT US
* Edited by Themify
* Double click module to edit fields and email address you want to send to

[Back to Table of Contents](#table-of-contents)

#### LEGAL PAGE
* Edited by Themify
* Double click module to edit content

[Back to Table of Contents](#table-of-contents)
