# Github-issue-tracker
A task to maintain git issues in two way sync using Laravel

## Prerequisites
- Composer
- Laravel ^9
- NPM
- XAMPP / MySQL
- PHP ^8

## Application setup
-   Clone this repo using ``` git clone https://github.com/muthukumaran-m/Github-issue-tracker.git ```
- Install the required packages using ``` npm install ``` and ``` composer update ```
- Create a database as ``` laravel ```
- Add the following properties in *.env*
    - GITHUB_WEBHOOK_SECRET=``ooooooooooo``
    - GITHUB_TOKEN=```'token  xxxxxxxxxxxxxxxxxxxx'```
    - GITHUB_REPO=```https://api.github.com/repos/[username]/[repo name]```
- Start the php server using ``` php artisan serve ```
- Run the migration and seeders using ``` php artisan migrate:fresh --seed ```
- Start the queues, jobs and event listeners using `` php artisan queue:work `` or `` php artisan queue:listen ``
- Start the ngrok using ``` ngrok http 127.0.0.1.:8000 ```
- Configure the ngrok url into your Github webhook url. *Example:* ``` https://0000-aaa-bb-xxx.in.ngrok.io/github-webhook ```

### Note
- I didn't commited the .env and any other configuration details here. Ping me to get the .env and git repository used for development.
- Feel free to contact if any issues arises while doing the application setup **Email: kumaranpassion2work@outlook.in**

