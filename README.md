CSE370: Database Systems
Project Report
Project Title: PC Component Shop




Group No:03, CSE370 Lab Section: 09, Spring 2024
	ID
	Name
	Contribution
	24141185
	MD FAHIM
	Registration, Login and Homepage
	24141156
	MD ASIF HASAN
	Cart, Add Admin and Admin List page
	21301261
	RAFI SIDDIKI
	Product browsing page, Product filtering, Product Review
	24141246
	ARABINDA PAUL TURJA
	Tier browsing page, Tier filtering
	21301035
	OMAR NASIF CHOWDHURY
	Product/Tier add and modification page
	































Table of Contents




Section 
No
	Content
	Page No
	1
	Introduction
	3
	2
	Project Features 
	4
	3
	ER/EER Diagram
	5
	4
	Schema Diagram
	6
	5
	Frontend Development 
	7
	6
	Backend Development
	16
	7
	Source Code Repository
	34
	8
	Conclusion 
	34
	9
	References
	35
	



























































Introduction


The name of our project is Pc Component Shop. It's an e-commerce website for PC components. In this project, we offer a variety of features on the website. A buyer will be able to visit our website and browse from a broad category of products and custom-built PC tiers. Our buyers will be able to add their desired product/tier to their cart and confirm their purchase.






































Project Features


Separate Login for Customers and Admins: Our platform provides separate login portals for customers and administrators. Customers can access their accounts to browse products, make purchases, and manage their profiles, while admins have access to a dedicated admin panel for managing products, users, and other aspects of the platform.
Homepage with Newly Arrived Products Showcase: The homepage of our website features a curated selection of newly arrived products, allowing users to stay up-to-date with the latest additions to our inventory. This showcase highlights the most exciting and sought-after components, making it easy for customers to discover new items of interest.
Browse and Filter Components: Users can easily browse through our extensive collection of PC components, including processors, graphics cards, RAM, storage solutions, and more. Our intuitive filtering system allows customers to refine their search results based on specific criteria such as component type, brand, price range, and more, enabling them to find exactly what they're looking for with ease.
Admin Panel for Product and User Management: Administrators have access to a comprehensive admin panel where they can perform various tasks such as adding new admins to the system, managing product listings, updating product details, adding or modifying product tiers, and overseeing user accounts. This panel provides admins with the tools they need to effectively manage the platform and ensure smooth operation.
Budget-Based Best Build Suggestions: Our platform offers a unique feature that provides users with personalized build suggestions based on their budget and performance requirements. By inputting their budget constraints and desired specifications, users can receive tailored recommendations for the best components to create their ideal PC build, helping them make informed purchasing decisions.
User Cart: Customers can easily add products to their cart as they browse our selection, allowing them to conveniently compile a list of items for purchase. Our user-friendly cart system enables users to review their selected products and show the total price. 
Product Reviews: We encourage user engagement and feedback by allowing customers to add reviews for products they have purchased or used. This feature enables users to share their experiences, opinions, and recommendations with the community, helping fellow customers make informed decisions when selecting products.




ER/EER Diagram




  





































Schema Diagram






  





































Frontend Development 


A brief discussion about Frontend Development and add Screenshots  by mentioning Individual Contributions




Contribution of ID: 21301035, Name: Omar Nasif Chowdhury


  

  

  

  

For my part, I had finished four pages. I designed the front-end portion using HTML and CSS. The administrator can enter the product's name, price, and other details in the "add product" area. The data will appear on the right side of the page once it has been filled out. Upon selecting the “Edit” button, the "modify product" page will now open. We can change the product details here. The "add product" page will reload after selecting the "confirm" button, but this time the modifications are visible on the right side of the page. The administrator can enter details about the tier in the "add tier" section. The data will appear on the right side of the page once it has been filled out. Upon selecting the edit button, the "modify tier" page will now open. We can change the tier information here. The "add tier" page will reload after selecting the "confirm" button, but this time the modifications are visible on the right side of the page.












Contribution of ID: 24141156, Name: MD ASIF HASAN


Admin page where only admin can add new admins.
  











Page after successful admin adds an option to go back to the admin list page or again add a new admin.
  















Current admin list page where only admins can see the list. 
  

Cart page for individual users. Where users can remove products and see total items and costs. Confirm your order on the order confirmation page or continue shopping to go to the home page.
  























After confirming order placement order confirmation page will be displayed to go back to the home page when the continue shopping button is clicked. 
  

All pages are designed with HTML and CSS.






Contribution of ID: 24141185, Name: Md.Fahim


Registration page where a new user can be registered. His information will be stored in the database along with a unique user ID. If a user does not match the password and confirm the password section an error message will be displayed saying ‘The two passwords do not match’. The user also must enter all the details or he will not be able to register.
  













Login Page where the registered users will be able to log in via their email and password. If the user enters the wrong email or password an error message will be displayed. Otherwise, the user will be logged in successfully and will be taken to the homepage. If the login credentials are for the admins then they will be taken to the admin page. Each user will have their login session


  



The Homepage. Here the newly arrived latest products and top tiers will be displayed. The user will also be able to go to different pages using the navigation bar. Upon clicking the logout button the user session will be terminated and the user will be redirected to the login page.


  



All the pages are designed using HTML and CSS.






Contribution of ID: 21301261, Name: Rafi Sddiki


Shoppers have the opportunity to explore their preferred items within our selection of available products.
  



Shoppers have the opportunity to filter out the product according to their preferences.
  





Buyers can access details about each product as well as reviews from other customers. Additionally, they have the option to submit their reviews for products.
A customer can submit a review for a single product only once.
  









Contribution of ID: 24141246, Name: Arabinda Paul Turja


Buyers can search tiers from the tier list by clicking on the tier part
  






Buyers also can filter tiers according to their suitable tier type
  





After clicking on any specific tier they can see the tier’s description which contains the tier’s details and components
  



All pages are designed with HTML, CSS, and Javascript. 






























Backend Development 


A brief discussion about Backend Development and add Screenshots  by mentioning Individual Contributions




Contribution of ID: 21301035, Name: Omar Nasif Chowdhury 
  
  





I used HTML and CSS to design the page on the front end. I had to carry out a "CRUD" action in the backend section. I used PHP to link the pages to the database. With MYSQL, I created the database. I had to designate a primary key when I created the tables "tier" and "product" in my database named "pcshop". "Product_id" and "tier_id" are my primary keys. I also implemented the function auto increment. Now, if I fill in the name, brand, and other details in the "Add Product" area, this data will be kept in our "pcshop" database and the "Product" table. Additionally, "product_id" was automatically set as the primary key. In essence, it involves entering the information into the database. The code is below:


  



On the right side of the page, I will only see the “Name” and “Price” of the product. Here  I am reading the information. Now there is a button named “Delete”. if I press the button It will delete the product details from the “Product” table. First, it will take the “Product_id” and will delete the rest of the information with the same product ID. Here product_id is the primary key. And the code is below:


  

Suppose I need to edit product details, I can click on the button named “Edit”. This “Edit” button will open the page “Modify Product” where I can change the details of our product. Now if I update the product details, our updated product details will appear on the “Add product” page. We can see the changes in the name and price. To perform this operation I had to use the code below:


  



Secondly, in the “Add Tier” section first I wrote the code to store the information in our “pcshop” database and the “tier” table. The code is below
  



After I press “ Confirm” the details will be stored in my database and in the table named “tier”. We can now see the type and price. Now if I need to edit or update any information, I will press the “edit” button. The “Modify Tier” will appear. If I update the type or price it will also update in my database. To perform the task I wrote the code below:  
  





Now if I want to delete information from the database, On my webpage I just need to press “Delete”. First, it will take the “Tier_id” and will delete the rest of the information with the same tier ID. This information will just not be deleted from the webpage but also the database. To perform this I wrote the code below:


  







Contribution of ID: 24141156, Name: MD ASIF HASAN
  



  

  

In this code, I first select the product ID and type using SQL query from the table and insert the name, and price in the cart_items table and cart_id, tier_id to the added_to table.
  

  

  

For the user table, I added the admin information in the user first then used the user ID and inserted values NID, user_id, and phone_number in the admin table.
The following codes are written using PHP for CRUD operations on the corresponding tables of pc component database










Contribution of ID: 24141185, Name: Md.Fahim
  

  

  
  

The following screenshots represent the backend part of the registration page. I used PHP to register the users in the user table and buyer table.
  
  



  
  

  

The following screenshots represent the backend part of the login page. The PHP codes fetch information from the user, buyer, and admin table. If the information matches with the admin then they will be taken to the admin page otherwise they are buyers and will be taken to the homepage.
  

  

  



The following screenshots represent the backend part of the homepage. I used MySQL commands to fetch the latest products according to their registration date from the product table and displayed them on the website. Similarly, I used MySQL commands to fetch the highest-priced tiers from the tier table and displayed them on the website.


Contribution of ID: 21301261, Name: Rafi Siddiki


  

Datatable of the products.


  



The webpage incorporates essential JavaScript and CSS files, including jQuery, jQuery UI, Bootstrap, and customized stylesheets.


  



I have used PHP to dynamically take distinct product types from the database to make the filter checkboxes.


  

Implementing JavaScript enables the website to respond dynamically to checkbox selections, facilitating product filtering without requiring users to navigate away from the current page.


  



Dynamically retrieved product information is displayed on the product page, including both price and name.


  

Retrieved reviews for each product and provided users with the option to submit their own reviews for each respective product.




Contribution of ID: 24141246, Name: Arabinda Paul Turja




  

  

  



Used JavaScript and CSS files necessary for the webpage, such as jQuery, jQuery UI, Bootstrap, and custom stylesheets.


  



By using PHP code here I’ve fetched distinct tier types from the database and dynamically generated checkboxes for each type within the filter section


  



Used Javascript to define functions for filtering tier data and handling Ajax requests which initializes the filtering process on the page load when checkboxes are clicked.




  



After initializing variables, it checks whether the ID parameter is set or not in the URL. If ‘id’ is set it fetches tier details from the database based on provided ‘id’. If the query returns rows, it assigns the fetched tier details to the $row variable and extracts the tier name to $TierName. After documenting HTML it includes links to external javascript and CSS files.


  



Statements are used for checking valid parameters if the query returns one or more rows a while loop fetches each row as an array using functioning mysqli_num_rows() and if no rows are returned by the query a message ‘No Data Found’ is assigned to the output variable








































Source Code Repository


https://github.com/asifhasan007/CSE370-Project-Group3.git
 














Conclusion 
The PC Component Shop project offers a versatile solution for both PC enthusiasts and casual users. It features separate login portals for customers and administrators, a dynamic homepage displaying new products, and easy-to-use browsing and filtering options, ensuring a smooth and enjoyable shopping experience.
















































References


Complete Mobile Shopee E-Commerce Website Course - PHP & MySQL
Create A Responsive E-Commerce Product Admin Panel With CRUD Using HTML - CSS - PHP - MySQL
Create Login & Registration Form PHP MySQL With Logout & Login Session | Login & Signup Page In PHP
Advance Ajax Product Filters in PHP
How to create Website Page Layout in HTML CSS | using Float - Web Layout Design Tutorial 01
PHP View Product Details and Check Stock From database
