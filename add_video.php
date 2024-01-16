<?php
$videoUrl = $_POST['video'];

//$videoUrl = "https://us02web.zoom.us/rec/download/YfkKRwgVB-oxcsnAI-zNd9-GwbsQ0nHWrXrcQjj-DqQ5i4HRKPE7dzqqVIrJmICIgM58GqPyaesIQ0wb.rSyUhLCAHv5Mx_1d";

$localFolder = "uploads/";

// Generate a random name for the video with a ".mp4" extension
$fileName = uniqid('video_') . ".mp4";

// Construct the local path
$videoPath = $localFolder . $fileName;

// Initialize cURL session
$ch = curl_init($videoUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10); // Maximum number of redirects to follow

// Execute cURL session
$videoContent = curl_exec($ch);

// Get HTTP response code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Close cURL session
curl_close($ch);

// Check if the HTTP request was successful (status code 2xx)
if ($httpCode >= 200 && $httpCode < 300) {
    if (!file_exists($localFolder)) {
        mkdir($localFolder, 0777, true); // Create the folder if it doesn't exist
    }

    // Save the video content to a local file with a random name and ".mp4" extension
    file_put_contents($videoPath, $videoContent);

//    include 'youtube.php';
    include_once 'youtube.php';

    echo "Video downloaded and saved successfully at: " . $videoPath;
} else {
    echo "Failed to download or save the video. HTTP response code: " . $httpCode;
}
?>
