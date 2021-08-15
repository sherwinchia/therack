![banner](https://banners.beyondco.de/The%20Rack.png?theme=light&packageManager=&packageName=https%3A%2F%2Fgithub.com%2Fsherwinchia%2Ftherack&pattern=rain&style=style_1&description=Laravel+7+Ecommerce+Website&md=0&showWatermark=0&fontSize=125px&images=shopping-cart&widths=250&heights=250)

This my first project with laravel. It's not the best but worth sharing. The website have three type of users with different functionality.

Guest
1. View Product
2. Register
3. Add product to cart

Customer
1. Login
2. Add product to cart
3. Checkout (No payment gateway implemented, all checkout status=PAID)
4. View purchase history

Admin 
1. Login to admin panel
2. CRUD product
3. CRUD size
4. Manage order
5. View user
6. Notes

### Installation

1. Clone the repository using the command "git clone [link]"
2. Create database in MySql
3. Configure the .env file accordingly
4. Run command 
```
$composer install
$php artisan migrate
$php artisan db:seed
$php artisan serve
$php artisan storage:link
```

## Built With

* Bootstrap- CSS framework
* JQuery- Javascript framework
* Laravel - PHP framework
* MySql- Databse
