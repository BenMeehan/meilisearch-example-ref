const { MeiliSearch } = require('meilisearch');

// Connect to MeiliSearch
const client = new MeiliSearch({
  host: 'http://localhost:7700', // Replace with your MeiliSearch server URL
  apiKey: 'YOUR_API_KEY',       // Optional: if you have an API key
});

// Load data
const index = client.index('example_index');
const data = [
  { id: 1, name: 'John Doe' },
  { id: 2, name: 'Jane Smith' },
];
index.addDocuments(data);

// Search data
const query = 'John';
index
  .search(query)
  .then((searchResponse) => {
    console.log(searchResponse.hits);
  })
  .catch((error) => {
    console.error('Error searching data:', error);
  });
