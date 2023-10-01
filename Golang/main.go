package main

import (
	"fmt"

	"github.com/meilisearch/meilisearch-go"
)

func main() {
	client := meilisearch.NewClient(meilisearch.Config{
		Host:   "http://localhost:7700", // Replace with your MeiliSearch server URL
		APIKey: "YOUR_API_KEY",          // Optional: if you have an API key
	})

	indexName := "example_index"
	index := client.Index(indexName)

	// Load data
	data := []map[string]interface{}{
		{"id": 1, "name": "John Doe"},
		{"id": 2, "name": "Jane Smith"},
	}

	_, err := index.AddDocuments(data)
	if err != nil {
		fmt.Println("Error loading data:", err)
		return
	}

	// Search data
	query := "John"
	searchResponse, err := index.Search(query, nil)
	if err != nil {
		fmt.Println("Error searching data:", err)
		return
	}

	fmt.Println(searchResponse.Hits)
}
