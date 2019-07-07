# *Food-Lover*

This is a database management project that uses MySQL, XAMPP Server, PHP, HTML, CSS and JavaScript.

 Navigation begins from home.php. file. All images used are stored in images folder. # User View

**Login Page**<br>
This is the first page that appears as soon as the webpage is loads.<br>
Anyone who has already registered can login. If not they can click register that redirects them to the registration form.<br><br>
<img src="images/login.PNG" width=750px align=center><br><br>

**Registration Page**<br>
This is the registration form. Anyone can register by providing their details as specified.<br>
After registeration, they are redirected to the login page as above. During registration, the user has to specify a unique username.<br><br>
<img src="images/register.PNG" width=750px><br><br>

**Incorrect username or password. Register if not registered yet ALERT**<br>
This alert appears if you try to login before registering.<br>
This also appears if you provide the username or password during login.<br><br>
<img src="images/register_alert.PNG" width=500px><br><br>

**Home Page**<br>
This is the main page of the website. It gives the overview of the website on what it does.<br>
<img src="images/home.PNG" width=750px><br><br>

**Profile Page**<br>
This page displays the details of the user and gives an option to the user to edit their user information that they had provided earlier during registration.<br>
It also includes the user's order history and their current status.<br><br>
<img src="images/profile.PNG" width=750px><br><br>

**Edit Profile Page**<br>
It allows you to edit your information and save the changes.<br><br>
<img src="images/edit_profile.PNG" width=750px><br><br>

**Profile Updated ALERT**<br>
The alert is displayed when the user information is updated.<br><br>
<img src="images/profile_update_alert.PNG" width=500px><br><br>

**Wallet Page**<br>
This displays the current balance in your wallet. The wallet initially initializes with 500Rs.<br><br>
<img src="images/wallet.PNG" width=750px><br><br>

**Menu Page**<br>
It has all the food items that are in the menu along with the price and the averyage rating provided by all users.<br>
There is a checkout button that takes you to the cart.<br><br>
<img src="images/menu.PNG" width=750px><br><br>

**Item added ALERT**<br>
The alert shows that the specified item has been added to the cart.<br><br>
<img src="images/item_added_alert.PNG" width=500px><br><br>

**Cart Page**<br>
All the items chosen by the user with the quantity and the total (quantity * price) of the list of items is displayed.<br>
There are 2 buttons in the page - one for cancelling the order and the other to confirm the order.<br><br>
<img src="images/cart.PNG" width=750px><br><br>

**Order Cancelled ALERT**<br>
When the user cancels the order, this alert is displayed.<br><br>
<img src="images/order_cancelled_alert.PNG" width=500px><br><br>

**Order Confirmation Page**
Here the user can choose the payment option (wallet or cash on delivery) and confirm the order.<br><br>
<img src="images/order_confirm.PNG" width=750px><br><br>

**Order Confirmed ALERT**<br>
When the user confirms his order, this alert is displayed.<br><br>
<img src="images/order_confirmed_alert.PNG" width=500px><br><br>

**Wallet Update ALERT**<br>
When the user chooses to pay with the wallet, and if the wallet has enough balance, the wallet balance is decremented by the total order value.<br><br>
<img src="images/wallet_update_alert.PNG" width=500px><br><br>

**Food Rating Page**<br>
This page has only those items that the user recently ordered and have already received the food but have not rated the food.<br><br>
<img src="images/rate_food.PNG" width=750px><br><br>


# Admin/Delivery Boy View

**Admin Login ALERT**<br>
This is an alert for logging-in as an admin.<br><br>
<img src="images/admin_login_alert.PNG" width=500px><br><br>

**Admin Home Page**<br><br>
<img src="images/admin_home.PNG" width=750px><br><br>
This page consists of 4 buttons:<br>
**1. Viewing and editing the menu**<br><br>
<img src="images/admin_menu.PNG" width=750px><br><br>
**2. Viewing the user details.**<br><br>
<img src="images/admin_user_info.PNG" width=750px><br><br>
**3. Viewing the orders to be delivered.**<br>
   This page also consists of a field to be filled with the order ID specifying the order that was delivered.<br><br>
<img src="images/admin_order.PNG" width=750px><br><br>
**4. Viewing the food rating to improve the quality of the food.**<br><br>
<img src="images/admin_rate.PNG" width=750px><br><br>
