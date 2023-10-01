$meilisearchUrl = 'http://localhost:7700'; // Replace with your MeiliSearch server URL
$apiKey = 'YOUR_API_KEY'; // Optional: if you have an API key
$indexName = 'example_index';

// Load data
$data = json_encode([
    ['id' => 1, 'name' => 'John Doe'],
    ['id' => 2, 'name' => 'Jane Smith'],
]);

$ch = curl_init("$meilisearchUrl/indexes/$indexName/documents");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'X-Meili-API-Key: ' . $apiKey, // Include if you have an API key
]);
curl_exec($ch);

// Search data
$query = 'John';
$searchUrl = "$meilisearchUrl/indexes/$indexName/search?q=$query";

$searchResponse = file_get_contents($searchUrl, false, stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => 'X-Meili-API-Key: ' . $apiKey, // Include if you have an API key
    ],
]));

$searchResponse = json_decode($searchResponse, true);
print_r($searchResponse['hits']);