# docker-php-project-template
A containerized PHP application running on Docker with mailer functionality

To get started
  - clone the repository locally onto your machine using powershell or from the VS Code terminal and cd into the new project - git clone [URL of repository]
  - run docker run --rm -v $(pwd):/app composer install **if using powershell run** docker run --rm -v ${pwd}:/app composer install
  - create a .env file in your project root and set your database values. The variables are listed in the docker-compose.yml file - **mariadb: environment:**  config section
  - run docker-compose up --build

To send an email
  - set the SMTP server values in the .env file
  - change the recipient email in the sent-test-email.php script
  - run docker-compose down and then run docker-compose up --build 
  - load the send-test-email.php script in your browser
