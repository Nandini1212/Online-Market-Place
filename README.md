# Online-Market-Place
Features :
User Creation for Whole marketplace using a signup place
Login - Handles Invalid Password
Tracking of where the user has visited within the market place
Add review and rating for all products
Presentation of the top five products in each member company
Presentation of the top five products in the whole market place

Extra Features :
User Password Encryption for Security using SHA-512, Salt
First we use Salt on the password and then we did a hash of the salted password and then insert that value in the database. 
While login we did the same thng with it. 
Add to Cart

CMPE 272 - CROSS DOMAIN ENTERPRISE ONLINE MARKETPLACE Market place 
Test Case: 1 Title: User Creation 
Description: A user should be able to register himself/ herself in the marketplace using the user form. 
Test Steps: 
1. Navigate to http://mugglemarket.com/ 2. On the bottom left corner click on New User. 3. Click on the Create New User 4. Enter the Firstname, Lastname, Email-id, password. 
5. Click on Sign up. 
Expected Result: Redirect to Sign In 
Result: Redirect to Sign In 
Test Case: 2 Title: Login 
Description: A user should be able to login with the registered username/ password in the marketplace. 
Test Steps: 
1. Navigate to http://mugglemarket.com/ 2. Enter registered email and password 3. Click on Login. 
Expected Result: The user should land on the home page. 
Result: User able to land on the home page, showing “Hello PotterHeads” as the welcome-message middle of the page. 
Test Case: 3 
Title: Display all products of individual websites(Fancy UI). 
Description: A user should be able to view all the products of individual websites. 
Test Steps: 
1. Navigate to Products tab at the top of the page. 2. Click on any of the 4 options to see products on vendor website “Robots, Retails Products, Multi Products, HarryPotter Collectibles”. 
Expected Result: The user should land on the respective product page of the selected store and should be able to view products of the respective product company. 
Result: The user should land on the respective product page of the selected store and should be able to view products of the respective product company. 
Test Case: 4 Title: Recently Visited and most visited Products for HarryPotterCollectibles 
Description: A user should be able to view recently visited and most visited products for HarryPotterCollectibles 
Test Steps: 
1. Navigate to http://mugglemarket.com/ and login and click on ‘Products’ tab 
2. Click on HarryPotterCollectibles 
3. Click on a particular product say ‘badges and wand’. 4. Click on ‘Back’ under the product image. This will take you Step 2 page. 5. Click on ‘Viewed Products’ at the top of the page 
Expected Result: The user should see the product he recently visited products under ‘Viewed Products’ title 
Result: The user should see the product he recently visited products under ‘Viewed Products’ title Note: Click on the back button on browser or product page will take you back to all vendor product page. 
Test Case: 5 Title: Adding review and ratings to the products across the MarketPlace. 
Description: A user should be able to add review and rating for each product from across the MarketPlace. 
Assumption: User should be logged in to the marketplace 
Test Steps: 
1. Navigate to http://mugglemarket.com/ and login and click on ‘Products’ tab 2. Click on any one of the stores(Robots, Retails Products, Multi Products, HarryPotter Collectibles), Example: Multi Products. 3. Click on a particular product say ‘Screen Cleaner’. 4. On the right hand side, write a review in the box under ‘Review the product’ and rate the product using a number one to 5 in the scroll box under ‘Rate the product’. 5. Enter on your keyboard, or press ‘Add Review’ button 
Expected Result: The user if logged in should get a ‘Product name updated review’ message. User can go back to Selected Products page by clicking back on webpage 
Result: The user if logged in should get a ‘Product name updated review’ message. User can go back to Selected Products page by clicking back on webpage. 
Note: Click on the back button on browser or product page will take you back to all vendor product page. 
Test Case: 6 
Title: Top Rated Products from individual websites. 
Description: A user should be able to view all the top rated products in each website. 
Test Steps: 
1. Navigate to http://mugglemarket.com/ and login and click on ‘Products’ tab 2. Click on MultiProducts or Retails Products. You will see the top 5 products on the page directly. 3. For other Product tabs(Robots, HarryPotter Collectibles) Click on ‘Top Rated Products’ to view the top rated products 
Expected Result: The user should be able to see the Top 5 rated products of the visited individual site under “Product Name”. 
Result: The user able see the Top 5 rated products of the visited individual site under “Product Name”. 
Note: Click on the back button on browser or product page will take you back to all vendor product page. 
Test Case: 7 
Title: Top Rated Products from across the MarketPlace. 
Description: A user should be able to view all the top rated products from across the MarketPlace. 
Test Steps: 
1. Navigate to http://mugglemarket.com/ and login and click on ‘Products’ tab 
2.Click on “Top Rated Products across Marketplace’ 
Expected Result: The user should be able to see the Top 5 rated products in the entire marketplace. 
Result: User able to see the Top 5 rated products in the entire. 
Note: Click on the back button on browser or product page will take you back to all vendor product page. 
Test Case:8 Title: Adding products to cart. Description: A user should be able to add single or multiple products to the cart. 
Test Steps: 
1. Navigate to http://mugglemarket.com/ and login and click on ‘Products’ tab 
2. Click on any one of the stores(Robots, Retails Products, MultiProducts, 
HarryPotter Collectibles), Example: MultiProducts. 3. Click on ‘Add to Cart’ button under any product you want. 4. Scroll to top of the vendor product page. Click on Cart. 
5. Click on + or - sign to add or subtract quantity of items to/from cart. 
product page. 
6. Click on ‘-’ to 0, to remove a product from cart 
Expected Result: The user should be able to view all the products added to cart, see an increase in quantity of products updated on cart, and the cart should get updated if you removed a product from the cart. 
Result: The user is able to view all the products added to cart, see an increase in quantity of products updated on cart, and the cart should get updated if you removed a product from the cart. 
Note: Click on the back button on browser or product page will take you back to all vendor product page. 
Test Case:9 Title: Tracking the user’s visited pages. 
Assumption: User is logged in. Description: User should be able to see what pages they visited. 
Test Steps: 
1. Navigate to http://mugglemarket.com/ and login and click on ‘Products’ tab 2. Click on tracking pages 
Expected Result: User should be able to see the pages they visited. Result: User able to see a table called ‘Pages’ with the path they travelled on the website. 
Note: Click on the back button on browser or product page will take you back to all vendor product page. 
Test Case:10 Title:Logout 
Assumption: User is logged in. Description: User should be able to logout. 
Test Steps: 
1. Navigate to http://mugglemarket.com/ and login and click on any tabs at the top 
of the window (Home tab, About , ‘Products’) , say Products tab 2. Click on LOGOUT page at the top tab bar. 
Expected Result: User should be able to go back to home page before signing in Result: User is taken to a page with the message logged out, and then clicking on ‘back’ button shows ‘Logout 'successful’ , and takes you back to Login Page. 
Note: Click on the back button on browser or product page will take you back to all vendor product page. 

Team Members :
Harshada 
Mayura Dhivya Nehruji 
Rajakumari Chouta - http://myretaildesign.net/
Sheethal Mathew 

YouTube link to Project Demo : https://youtu.be/PRLWAVZvwO8

