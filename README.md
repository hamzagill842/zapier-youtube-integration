# Zapier and YouTube Integration Project

## Overview:

This repository contains a PHP-based solution to enhance the YouTube integration with Zapier. The primary goal is to enable the uploading of YouTube videos directly to a specified playlist, a feature currently unavailable in the standard Zapier YouTube integration. Custom code has been implemented to handle this functionality through Zapier Webhooks.

## Prerequisites:

Before setting up the integration, ensure you have completed the following steps:

1. **Enable Google Calendar API and Google Drive API:**
   - Go to the [Google Cloud Console](https://console.cloud.google.com/).
   - Create a new project or select an existing project.
   - Enable the Google Calendar API and Google Drive API for your project.
   - Create credentials (OAuth client ID) for the application.

2. **Configure API Credentials in Your Project:**
   - Obtain the client ID and client secret from the Google Cloud Console.
   - Add these credentials to your project's configuration file.

## Integration with Zapier and YouTube:

Enhance your workflow by integrating with Zapier and YouTube to automatically add videos to a specified playlist. Follow these steps to set up the integration:

1. **Enable YouTube Data API:**
   - Go to the [Google Cloud Console](https://console.cloud.google.com/).
   - Select your project.
   - Enable the YouTube Data API for your project.

2. **Create API Credentials for YouTube:**
   - Obtain the API key from the Google Cloud Console.

3. **Configure YouTube API Credentials in Your Project:**
   - Open the `config.php` file.
   - Add the YouTube API key and playlist ID to the configuration.

    ```php
    <?php
    // config.php

    // ...

    // YouTube API credentials
    const YOUTUBE_API_KEY = "YOUR_YOUTUBE_API_KEY";
    const YOUTUBE_PLAYLIST_ID = "YOUR_YOUTUBE_PLAYLIST_ID";

    // ...
    ?>
    ```

4. **Set Up Zapier Integration:**
   - Create a new Zap in Zapier.
   - Choose a trigger app (e.g., File storage in Google Drive).
   - Configure the trigger event (e.g., New File in Folder).
   - Choose an action app (e.g., YouTube).
   - Configure the action event to add a video to the specified playlist.

## Installation:

To get started with the project, follow these steps:

1. **Clone the Repository:**
   - Clone this repository to your local machine using the following command:
     ```bash
     git clone https://github.com/your-username/your-repository.git
     ```

2. **Install Composer Dependencies:**
   - Navigate to the project directory:
     ```bash
     cd your-repository
     ```
   - Install Composer dependencies:
     ```bash
     composer install
     ```

3. **Set Up Google Calendar and Google Drive API Credentials:**
   - Follow the instructions in the "Prerequisites" section to enable and configure the Google Calendar and Google Drive APIs.

4. **Configure the `config.php` File:**
   - Open the `config.php` file and update the database connection details, Google Calendar and Google Drive API credentials, YouTube API credentials, and any additional configuration details.

    ```php
    <?php
    // config.php

    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "calendar";

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);
    global $conn;

    // Google Calendar and Google Drive API credentials
    const GOOGLE_Client_ID = "4560468dfdf07463-jqed90d72efocnd3756q1gtj353temi7.apps.googleusercontent.com";
    const GOOGLE_Client_SERECT = "GOCSddffdPX-EEWkFNX0wBPoboAupucJzL3I8CBQ";
    const GOOGLE_REDIRECT_URI = "https://7f89-2400-adc5-15d-da00-1546-cc9e-7b6e-a58d.ngrok-free.app";

    // YouTube API credentials
    const YOUTUBE_API_KEY = "YOUR_YOUTUBE_API_KEY";
    const YOUTUBE_PLAYLIST_ID = "YOUR_YOUTUBE_PLAYLIST_ID";

    // Additional configuration details
    const PLAY_LIST_ID = 'PLpt6gOTzg2dffd33RKs3x7ner8ShF15j2enQ8';
    ?>
    ```

## PHP Version Compatibility:

This project requires PHP version 8.1 or higher. Ensure that your development environment is using a compatible PHP version.

Follow these steps to check your PHP version:

```bash
php --version
