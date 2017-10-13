# LumenDingo API Skeleton

**Simple Lumen API Skeleton, for quick and easy API setup**

**Usage**

### Where to create an endpoint
- Endpoints are defined in **app/Api/Endpoints**
- Example endpoints are available: **resources.php** and **users.php**

### For an endpoint to be available and read by Lumen you need to do the following
_The available factory will then automatically determine which endpoint service is needed by its binded name_

- Add the endpoint in the bootstrap/app.php file as a binded object in the container
- Add the route in the routes/web.php file

### One central point of location
The app/Api/Http/Controllers/Api/IndexController is the main handler for incoming requests.
It will determine the endpoint requested, the available query parameters and then execute the required binded endpoint.

