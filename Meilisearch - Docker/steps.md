Docker is the easiest way to get started with meilisearch.
---

# MeiliSearch Docker Image

This Docker image is based on `getmeili/meilisearch:v1.3` and allows you to quickly set up and run MeiliSearch, an open-source search engine, within a Docker container. This README provides step-by-step instructions on how to build and run the container.

## Prerequisites

Before you begin, ensure that you have Docker installed on your system. You can download and install Docker from the [official Docker website](https://www.docker.com/get-started).

## Building the Docker Image

To build the MeiliSearch Docker image, follow these steps:

1. Clone this repository (if you haven't already):

   ```bash
   git clone https://github.com/your/repo.git
   cd repo
   ```

2. Build the Docker image using the provided Dockerfile:

   ```bash
   docker build -t my-meilisearch:v1.3 .
   ```

   Replace `my-meilisearch:v1.3` with your preferred image name and tag.

## Running the MeiliSearch Container

After building the Docker image, you can run the MeiliSearch container with the following command:

```bash
docker run -d -p 7700:7700 my-meilisearch:v1.3
```

Replace `my-meilisearch:v1.3` with the image name and tag you used during the build process.

### Configuration

By default, MeiliSearch runs with default settings, but you can customize its behavior by providing a configuration file. To do so:

1. Create a `config.toml` file with your desired configuration options. For example:

   ```toml
   [database]
   path = "/data/meilisearch"
   
   [http]
   address = "0.0.0.0:7700"
   ```

2. Mount the `config.toml` file to `/data/config.toml` in the container:

   ```bash
   docker run -d -p 7700:7700 -v $(pwd)/config.toml:/data/config.toml my-meilisearch:v1.3
   ```

### Accessing the MeiliSearch Dashboard

You can access the MeiliSearch dashboard by navigating to `http://localhost:7700` in your web browser.

## Stopping and Removing the Container

To stop and remove the MeiliSearch container, use the following commands:

```bash
docker stop <container_id>
docker rm <container_id>
```

Replace `<container_id>` with the ID or name of your running container.

## Additional Resources

- [MeiliSearch Documentation](https://docs.meilisearch.com/)
- [MeiliSearch GitHub Repository](https://github.com/meilisearch/MeiliSearch)

Enjoy using MeiliSearch within a Docker container!