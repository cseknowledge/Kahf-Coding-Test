# Kahf Yazılım A.Ş. Codind Test - CVR

## Prerequisites

-   **PHP** >= 8.2
-   **Composer**
-   **MySQL**
-   **Node.js & npm/yarn**
-   **Laravel 11**
-   **MeiliSearch**

## Features

### 1. User Registration

Users can register by providing their personal details and selecting a preferred vaccine center.

### 2. User Scheduling

-   Users are assigned to vaccine centers based on availability.
-   Appointments are scheduled in a first-come, first-served manner.
-   Serial numbers are assigned based on the order of registration.

### 3. Status Updates

The system automatically updates user statuses based on their progress. The statuses include:

-   Not Scheduled
-   Scheduled
-   Vaccinated

### 4. Email Notifications

-   Daily email reminders are sent to users with upcoming vaccination appointments.
-   Emails are sent at **9 PM** the day before the scheduled appointment.

### 5. Background Job Processing

Long-running tasks, such as sending email notifications, are processed using **Laravel's queue system** for better performance.

### 6. Scheduled Tasks

Daily system tasks, such as updating user statuses, are managed using **Laravel's scheduling system**.

### 7. Timezone Handling

All scheduling and notifications are aligned with the **Asia/Dhaka** timezone.

### 8. Daily Vaccination Limits

Vaccine centers have a predefined daily limit on how many users they can serve.

### 9. Weekday Scheduling

Vaccination appointments are only scheduled on weekdays (**Sunday to Thursday**), excluding holidays.

### 10. Search Functionality

A search page allows users to check their vaccination status by entering their **National ID (NID)**. The possible statuses include:

-   Not Registered
-   Not Scheduled
-   Scheduled
-   Vaccinated

### 11. Pre-populated Vaccine Center Data

The system is pre-loaded with vaccine centers, and there is no need for CRUD operations on center data.

## Installation

**Step 1: Clone the Repository**

    git clone https://github.com/cseknowledge/Kahf-Coding-Test.git
    cd Kahf-Coding-Test

**Step 2: Install Dependencies**

    composer install

**Step 3: Copy the .env.example file to .env:**

    cp .env.example .env

**Step 4: Generate the application key:**

    php artisan key:generate

**Step 5: Configure the Database**

    - Create a database into your MySQL
    - Update the .env file with your database details:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

**Step 6: Set Up Mail Configuration**

    MAIL_DRIVER=smtp
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your_username
    MAIL_PASSWORD=your_password
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=no-reply@example.com
    MAIL_FROM_NAME="${APP_NAME}"

**Step 7: Run Migrations and Seeders**

    php artisan migrate --seed
    or
    php artisan migrate:fresh --seed

**Step 8: To create more sample data**

    php artisan create:users --number=n --schedule=boolean

    Options:
        --number         Number of users to create (default: 10)
        --schedule       Boolean flag to set if users should be scheduled (default: true)

    Examples:
        Create 10 users with default settings:
            php artisan create:users

        Create 20 users, setting schedule to true:
            php artisan create:users --number=20 --schedule=true

    Note: Please exercise caution, as the system will automatically send email notifications to all users. There is a high likelihood that the free quota on Mailtrap will be exhausted.

**Step 9: MeiliSearch as the Scout driver:**

    - Install Meilisearch Locally:
    curl -L https://install.meilisearch.com | sh

    - Set Master Key:
    meilisearch --master-key=Your Key

    - Update .env
    SCOUT_DRIVER=meilisearch
    MEILISEARCH_HOST=http://127.0.0.1:7700
    MEILISEARCH_KEY=Your Key

    - Add the search indexing command to your setup process:
    php artisan scout:import "App\Models\User"

**Step 10: Install frontend dependencies and compile assets:**

    npm install && npm run dev

**Step 11: Use Queue for Sending Emails**

    QUEUE_CONNECTION=database

**Step 12: Run the queue worker to send email notifications:**

    php artisan queue:work

**Step 13: To schedule users for vaccination, run the following command:**

    php artisan schedule:work

**Step 14: Serve the Application**

    php artisan serve

## Additional Command

**1. To schedule vaccination**

    php artisan schedule:users

**2. To Vaccinated**

    php artisan vaccinate:users

**3 To test vaccination reminder email**

    - You can change the schedule time

    Path: routes/console.php

    - Change dailyAt time

    Schedule::command('send:vaccination-reminder')->dailyAt('21:00');

## Future Enhancements

-   Appointment Reminders via SMS (e.g., Twilio, Nexmo)
-   Vaccination History Records
-   Vaccine Type Selection
-   Community Outreach and Education
-   Tracking Missed Appointments
-   Caching Mechanisms
-   Rate Limiting
-   QR Code Generation for Appointments
-   Data Analytics Dashboard for Administrators
-   etc.

## Testing

Regrettably, due to time limitations, I couldn't create tests for this project. However, moving forward, I intend to write both unit and feature tests using Pest.
