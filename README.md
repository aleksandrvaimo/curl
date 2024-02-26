Send a POST request to https://cv.microservices.credy.com/v1 in JSONx format with the required fields that are listed below:

* first_name | string 255 - your first name
* last_name | string 255 - your last name
* email | string 255, must be a valid email address - your email address we can contact you by
* bio | free text - introduction about yourself and why you would be a great fit for the position
* technologies | array - the technologies you master ex. PHP, HTML, docker
* timestamp | integer - current unix timestamp, deviation of +/-10 seconds is allowed
* signature | string 255 - SHA1 hash of concatenation of current unix timestamp and the word "credy"
* vcs_uri | string 255 - public git repository url where the solution to the puzzle is hosted
