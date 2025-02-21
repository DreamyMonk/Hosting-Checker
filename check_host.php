<?php
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to validate domain name
function isValidDomain($domain) {
    return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain)
            && preg_match("/^.{1,253}$/", $domain)
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain));
}

// Get domain from query parameter
$domain = isset($_GET['domain']) ? $_GET['domain'] : '';

// Remove http:// or https:// if present
$domain = preg_replace('#^https?://#', '', $domain);

// Validate domain
if (!$domain || !isValidDomain($domain)) {
    echo json_encode(['error' => 'Please enter a valid domain name']);
    exit;
}

try {
    // Get IP address
    $ip = gethostbyname($domain);
    
    if ($ip === $domain) {
        echo json_encode(['error' => 'Could not resolve domain']);
        exit;
    }

    // Use ipapi.co to get location and organization info
    $details = file_get_contents("http://ip-api.com/json/" . $ip);
    $details = json_decode($details, true);

    // Prepare response
    $response = [
        'ip' => $ip,
        'city' => $details['city'] ?? null,
        'region' => $details['regionName'] ?? null,
        'country' => $details['country'] ?? null,
        'hosting' => $details['isp'] ?? null,
        'org' => $details['org'] ?? null
    ];

    echo json_encode($response);
} catch (Exception $e) {
    echo json_encode(['error' => 'Failed to fetch domain information']);
}
?>
