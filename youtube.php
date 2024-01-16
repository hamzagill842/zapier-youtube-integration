<?php
require __DIR__ . '/vendor/autoload.php'; // Include Google API Client Library
include_once 'token.php';

$youtube = new Google_Service_YouTube($client);


$videoTitle = $_POST['Title'];
$videoDescription = $_POST['Description'];
$videoTags = [];

$video = new Google_Service_YouTube_Video();
$videoSnippet = new Google_Service_YouTube_VideoSnippet();
$videoSnippet->setTitle($videoTitle);
$videoSnippet->setDescription($videoDescription);
$videoSnippet->setTags($videoTags);
$video->setSnippet($videoSnippet);

// Set video status
$videoStatus = new Google_Service_YouTube_VideoStatus();
$videoStatus->setPrivacyStatus('unlisted'); // Change privacy status if needed
$videoStatus->setMadeForKids(false);
$video->setStatus($videoStatus);

// Specify the video file
$data = file_get_contents($videoPath);

// Upload the video
$uploadedVideo = $youtube->videos->insert('snippet,status', $video, ['data' => $data, 'mimeType' => 'video/*']);

// Get the video ID
$videoId = $uploadedVideo->getId();
// Replace 'YOUR_PLAYLIST_ID' and 'VIDEO_ID' with actual values
$playlistId = 'PLovCHGmFDjYUvS3WCrpMy2i_MgYPK0HQy';
//$playlistId = $_POST['play_list_id'];

$resourceId = new Google_Service_YouTube_ResourceId();
$resourceId->setVideoId($videoId);
$resourceId->setKind('youtube#video');

$playlistItemSnippet = new Google_Service_YouTube_PlaylistItemSnippet();
$playlistItemSnippet->setPlaylistId($playlistId);
$playlistItemSnippet->setResourceId($resourceId);

$playlistItem = new Google_Service_YouTube_PlaylistItem();
$playlistItem->setSnippet($playlistItemSnippet);

$youtube->playlistItems->insert('snippet,contentDetails', $playlistItem);

unlink($videoPath);
echo 'Video added to the playlist successfully.';
