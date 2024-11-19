<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> -->

## About Sakkarin News

Sakkarin News is a news aggregation platform designed to provide users with news from authors that register on the platform and news from external sources like NewsCatcher News API.

## Texh Stack

- **Frontend**: Blade template and Tailwindcss.(not implemented yet)
- **Backend**: Laravel 11
- **Database**: MySQL
- **API**: NewsCatcher News API

## How to run the project

<!-- will be done after coding is done -->
1. Install php and composer on your local machine or follow step in [laravel documentation](https://laravel.com/docs/11.x/installation)
2. Clone the Repository
git clone https://github.com/Asia-Pacific-International-university/final-project-laravel-Sakkarinna.git
3. Install the dependencies
cd final-project-laravel-Sakkarinna
composer install
npm install
4. Set Up Environment Variables:
Copy the .env.example file to .env and update the necessary fields such as database credentials and NewsCatcher API key.
5. Run Migrations
php artisan migrate --seed
if it doesn't work
run:
php artisan migrate:fresh
php artisan db:seed
6. Start the server
php artisan serve
npm run dev(in another terminal)(not neccessary for now becasue I'm not using tailwind yet)

## Plan

 - [Figma](https://www.figma.com/design/f8toJfdBVJL2EC2R4Z5sgR/Sakkarin-News?node-id=0-1&t=AZ8jqd3WcBuDy73q-1).  not done yet


## Presentation

 - [Canva](https://https://www.canva.com/design/DAGWIoyTikI/SrR22nnhVvYg9eSNbcozfA/edit?utm_content=DAGWIoyTikI&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton). not done yet


