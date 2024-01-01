<?php
require __DIR__ . '/vendor/autoload.php';
include_once 'googleConfig.php';
include_once 'config.php';

function getAccessTokenFromDatabase($conn)
{
    try {

        $stmt = $conn->query("SELECT access_token, refresh_token FROM tokens ORDER BY created_at DESC LIMIT 1");


        if ($stmt) {
            $result = $stmt->fetch_assoc();
            $stmt->close();
            return $result;
        }

    } catch (Exception $e) {
        // Handle other exceptions
        echo "Error: " . $e->getMessage();
        return null;
    }
}

$tokens = getAccessTokenFromDatabase($conn);
$client->setAccessToken($tokens['access_token']);
// Set the access token in the Google API client
if ($client->isAccessTokenExpired()) {
    // Refresh the access token

    $newAccessToken = $client->fetchAccessTokenWithRefreshToken($tokens['refresh_token']);

    // Update the database with the new access token
    updateAccessTokenInDatabase($newAccessToken);
} else {
    echo "Access token is still valid.\n";
}

function updateAccessTokenInDatabase($newAccessToken)
{
    // Assuming you have a database connection stored in $conn
    global $conn;

    $access_token = $newAccessToken['access_token'];
    $refreshToken = isset($newAccessToken['refresh_token']) ? $newAccessToken['refresh_token'] : null;
    $expiresIn = $newAccessToken['expires_in'];

    // Update the database with the new access token
    $stmt = $conn->prepare("UPDATE tokens SET access_token = ?, refresh_token = ?, expires_in = ?, created_at = NOW() WHERE service = 'google'");
    $stmt->bind_param("ssi", $access_token, $refreshToken, $expiresIn);
    $stmt->execute();

    // Close the statement
    $stmt->close();
}
