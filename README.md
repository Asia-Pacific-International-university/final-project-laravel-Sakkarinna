
# Sakkarin News


Sakkarin News is a news aggregation platform designed to provide users with news from authors that register on the platform and news from external sources like [NewsCatcher News API](https://www.newscatcherapi.com/).
## Tech stack

- **Frontend**: Blade template, Tailwindcss, Livewire
- **Backend**: Laravel 11, php
- **Database**: MySQL
- **API for news**: [NewsCatcher News API](https://www.newscatcherapi.com/)
- **API for profile**: [Avatar Placeholder](https://avatar-placeholder.iran.liara.run/)
- **Libraries**: Chart.js

## How to run the project

1. Install php and composer on your local machine or follow step in [laravel documentation](https://laravel.com/docs/11.x/installation)

2. Clone the Repository
git clone https://github.com/Asia-Pacific-International-university/final-project-laravel-Sakkarinna.git

3. Install the dependencies
`cd final-project-laravel-Sakkarinna`
`composer install`
`npm install`

4. Set Up Environment Variables:
Copy the .env.example file to .env and update the necessary fields such as database credentials and NewsCatcher API key.

5. Run Migrations
`php artisan migrate --seed`
if it doesn't work
run
`php artisan migrate:fresh`
`php artisan db:seed`
`php artisan storage:link`

6. Start the server
run `php artisan serve` and `npm run dev` in another terminal

## Plan

 - [Figma](https://www.figma.com/design/f8toJfdBVJL2EC2R4Z5sgR/Sakkarin-News?node-id=0-1&t=AZ8jqd3WcBuDy73q-1).  


## Presentation

 - [Canva](https://www.canva.com/design/DAGYKGS1GnQ/Nu4gwq_f9TZj2yq1bAKTVA/edit?utm_content=DAGYKGS1GnQ&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton). 
