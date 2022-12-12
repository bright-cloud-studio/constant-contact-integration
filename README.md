# Bright Cloud Studio's Constant Contact Integration
This package connects Contao's Forms to Constant Contact's API. Create a Form and select which List to import data into. Add fields to the form and link them to specific Constant Contact fields. Add a checkbox to make sure the user gives express permission to be added to the contact list.

## Setup Directions

- Step One:
First things first, you will need to establish a connection with Constant Contact. To do this you will need to set up a page specifically for authorizing the connection. On Contao, set up a page for this purpose and copy its unique URL. This will be our Redirect URL.

![Get our Redirect URL](https://raw.githubusercontent.com/bright-cloud-studio/constant-contact-integration/main/images/step_1.png)

- Step Two:
Now, with a developer account for Constant Contact, we need to see up our Application. Create a new app and use the Redirect URL we got from Step One. Copy our API Key, Secret and Redirect URL and move onto Step Three.

![Create our Application](https://raw.githubusercontent.com/bright-cloud-studio/constant-contact-integration/main/images/step_2.png)

- Step Three:
Within Contao, create a new "Constant Contact - Authorize" frontend module and fill in the API Key, Secret and Redirect URL.

![Authorize Module](https://raw.githubusercontent.com/bright-cloud-studio/constant-contact-integration/main/images/step_3.png)
