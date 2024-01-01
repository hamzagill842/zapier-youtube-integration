<?php
require __DIR__ . '/vendor/autoload.php'; // Include Google API Client Library
include_once 'token.php';

$youtube = new Google_Service_YouTube($client);


// Replace 'YOUR_PLAYLIST_ID' and 'VIDEO_ID' with actual values
$playlistId = $_POST['play_list_id'];
$videoId = $_POST['video_id'];

$resourceId = new Google_Service_YouTube_ResourceId();
$resourceId->setVideoId($videoId);
$resourceId->setKind('youtube#video');

$playlistItemSnippet = new Google_Service_YouTube_PlaylistItemSnippet();
$playlistItemSnippet->setPlaylistId($playlistId);
$playlistItemSnippet->setResourceId($resourceId);

$playlistItem = new Google_Service_YouTube_PlaylistItem();
$playlistItem->setSnippet($playlistItemSnippet);

$youtube->playlistItems->insert('snippet,contentDetails', $playlistItem);

echo 'Video added to the playlist successfully.';
