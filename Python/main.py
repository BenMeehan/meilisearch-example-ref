import meilisearch

# Connect to MeiliSearch
client = meilisearch.Client('http://localhost:7700', 'YOUR_API_KEY') # Replace with your MeiliSearch server URL and API key

# Load data
index = client.index('example_index')
data = [
    {"id": 1, "name": "John Doe"},
    {"id": 2, "name": "Jane Smith"},
]
index.add_documents(data)

# Search data
query = 'John'
search_response = index.search(query)
print(search_response['hits'])
