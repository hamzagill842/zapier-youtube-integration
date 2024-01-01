<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube API Example</title>
</head>
<body>

<!-- Include the YouTube Iframe API -->
<script src="https://www.youtube.com/iframe_api"></script>

<!-- Create a container for the player -->
<div id="player"></div>

<script>
    // Your YouTube API key
    const apiKey = 'AIzaSyBduEoB_ZTYPjoInutxs5PlA9viWTTlNus';

    // Initialize the YouTube API
    function onYouTubeIframeAPIReady() {
        const player = new YT.Player('player', {
            height: '360',
            width: '640',
            videoId: 'VIDEO_ID',  // Replace with an initial video ID
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.PLAYING) {
            // Get the current video ID
            const currentVideoId = event.target.getVideoData().video_id;
            console.log('Current Video ID:', currentVideoId);

            // Get the current playlist ID
            const currentPlaylistId = event.target.getPlaylist();
            console.log('Current Playlist ID:', currentPlaylistId);
        }
    }
</script>

</body>
</html>
