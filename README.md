# Cosmos Eventboard
### Installation Instructions
#### Setting up your Environment
1. Download Git from https://git-scm.com/downloads
2. Install Docker. 
- If you are not familiar with virtualization and containerization, we recommend Googling for the basics. 

- For Windows: Docker has great documentation on how to get set up on Windows. Follow these instructions: https://docs.docker.com/docker-for-windows/ Ensure you perform the steps in the section about 'Shared drives', as files will need to be shared from your Drive into the Docker container.
 
#### Setting up the Eventboard
1. Clone this repository:
`git clone https://github.com/CosmosTUe/cosmos-eventboard.git`
2. Navigate to the folder you cloned the repository into. Open a Terminal here.
3. Ensure Docker is running. In your terminal, start the container: `docker-compose up -d`
4. Using your web-browser, navigate to `https://localhost/`. If you get a "Your connection is not private" error, go to *Advanced", and proceed to the website. The app show be visible!
5. When done developing, remember to shut down your Docker container: `docker-compose down`