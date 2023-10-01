import io.github.meili.search.client.MeiliSearchClient;
import io.github.meili.search.client.MeiliSearchConfig;
import io.github.meili.search.client.api.documents.MeiliSearchIndex;

public class MeiliSearchExample {
    public static void main(String[] args) {
        MeiliSearchConfig config = new MeiliSearchConfig.Builder("http://localhost:7700")
            .apiKey("YOUR_API_KEY") // Optional: if you have an API key
            .build();

        MeiliSearchClient client = new MeiliSearchClient(config);

        String indexName = "example_index";
        MeiliSearchIndex index = client.getIndex(indexName);

        // Load data
        String data = "[{\"id\": 1, \"name\": \"John Doe\"}, {\"id\": 2, \"name\": \"Jane Smith\"}]";
        index.addDocuments(data);

        // Search data
        String query = "John";
        String searchResponse = index.search(query);
        System.out.println(searchResponse);
    }
}
