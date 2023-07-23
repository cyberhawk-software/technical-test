## About Software Development @ Cyberhawk

need some content for this section

## The task

We've designed this task to try and give you the ability to show us what you can do and hopefully flex your technical and creative muscles. You can't show off too much here, show us you at your best and wow us!

To make things as simple as we could, we've opted to use [Laravel Sail](https://laravel.com/docs/8.x/sail) to provide a quick and convenient development environment, this will require you to install
[Docker Desktop](https://www.docker.com/products/docker-desktop) before you can start the test. We've provided [some more detailed instructions](#setting-everything-up) below in case this is your first time using Docker or Sail.

We'd like you to build an application that will display an example wind farm, its turbines and their components.
We'd like to be able to see components and their grades (measurement of damage/wear) ranging between 1 - 5.

For example, a turbine could contain the following components:

-   Blade
-   Rotor
-   Hub
-   Generator

Don't worry about using real names for components or accurate looking data, we're more interested in how you structure the application and how you present the data.

Don't be afraid of submitting incomplete code or code that isn't quite doing what you would like, just like your maths teacher, we like to see your working.
Just Document what you had hoped to achieve and your thoughts behind any unfinished code, so that we know what your plan was.

### Requirements

-   Display a list of turbine inspections
-   Each Turbine should have a number of components
-   A component can be given a grade from 1 to 5 (1 being perfect and 5 being completely broken/missing)
-   Use Laravel Models to represent the Entities in the task.

### Bonus Points

-   Great UX/UI
-   Use of React JS
-   Use of Tailwind CSS
-   Use of 3D
-   Use of a web map technology in the display of the data
-   Automated tests
-   API Authentication
-   Use of coding style guidelines (we use PSR-12 and AirBnb)
-   Use of git with clear logical commits
-   Specs/Plans/Designs

### Submitting The Task

We're not too fussy about how you submit the task, providing it gets to us and we're able to run it we'll be happy however here are some of the ways we commonly see:

-   Fork this repo, work and add us as a collaborator on your GitHub repo and send us a link
-   ZIP the project and email it to us at nick.stewart@thecyberhawk.com

## Setting Everything Up

As mentioned above we have chosen to make use of Laravel Sail as the foundation of this technical test.

-   If you haven't already, you will need to install [Docker Desktop](https://www.docker.com/products/docker-desktop).
-   One that is installed your next step is to install this projects composer dependencies (including Sail).
    -   This will require either PHP 8 installed on your local machine or the use of [a small docker container](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects) that runs PHP 8 that can install the dependencies for us.
-   If you haven't done so already copy the `.env.example` file to `.env`
    -   If you are running a local development environment you may need to change some default ports in the `.env` file
        -   We've already changed mysql to 33060 and NGINX to 81 for you
-   It should now be time to [start Sail](https://laravel.com/docs/8.x/sail#starting-and-stopping-sail) and the task

### Installing Composer Dependencies

https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

## Your Notes

Hello Cyberhawk team.

I have finished my task and wanted to leave some notes about this task.

You should be able to run this application without any problems. just run php artisan migrate and that should be it.

1.Location
To start reviewing this task just follow to /dashboard and start from there.
In the dashboard you will be able to add location. Name of the location and its postcode.
On the back end I am using myptv api that is offering 500 free requests per day. It will return the latitude and longtitude that will be used for mapbox to show the location in the next page.
So once you created location with its postcode you can press edit button and you will be taken to component page.

2.Object
At the top of the page you will see a simple mapbox window showing approximate location.
In there you can add objects like "windmill" etc. and its image url if you have one. Currently image url is not nullable so you will need to add any image url to proceed.

3.components
In the components page you will be able to add component like blade or anything else. and on save it will show its name and the last grade of it (or N/A if no inspections were done)

4.Inspections
Once you edit window element you will be able to add inspections and grades.
This page is pretty simple with nothing extra.

My notes.

-   I was struggling to start my sail as it was crashing on apt update stage saying that it can't get to any ubuntu.com provided links in dockerfile. After some unsuccessful research I just checked docker compose file differences with my personal projects and only managed to make it work once updated php version from 8.1 to 8.2. Not sure if any of your other candidates were struggling with it or if my case is just unique. But if in the future somebody will do the same test I would recommend maybe to change it to 8.2 if Im not the only one that was struggling with it.

-   currently none of my modals have nullable elements, but it would be beneficial to add it in the future for inputs like image_url and update my xhr js file to not check every field values.
-   Would be nice also to add media library feature so its not dependant on the image url.
-   Would be nice to add additional form validation and error messaging. I currently have only worked on when everything is going well and haven't added error messages if something is wrong.
-   I wanted to add OAuth or Sanctum API validation, but I was very short on time so skipped this part, but it would be beneficial as it would be much more safe for user.
-   would be nice to add more styling, currently I was just taking some inspiration from your website.
-   Because I was short on time I wasn't feeling confortable doing frontend with React as I am not yet advanced with it, but if its something you would like to see just let me know and I will work on this.

Thank you for giving me this oportunity, I had a lot of fun. Even if the project is not big, but it still allowed me to learn more about laravel.
Hope to hear from you soon.
