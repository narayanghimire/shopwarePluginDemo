Simple plugin to display random product in shopware.


To use this plugin follow the following instruction to use my plugin


Install shopware &  activate plugin.
===
`bin/console sw:plugin:SwagTestWidget install —activate`

After installation finished, please follow below step.
===
 Open the following url to display random product

http://yourdomain/frontend/index `

Or simply

`http://yourdomain/`

You will see 4 product on main page 

Check plugin basic configuration  by opening the backend url of the shopware`
===
http://yourdomain/backend

	a) Login with your username and password
	        
    b) After login , click on Widgets  and click on Task
    
Now, you will see default configuration of this test plugin

Default Configuration :
==
    Widget Name            : Recent Product
    Redirect to checkout   : No

* If Redirect to checkout is : YES 

        A)It means on the frontend if you will click on Buy button of product then you will be redirect directly to checkout page of application   
	
* If Redirect to checkout is :  NO 

        A)There will be Details button which will perform behaviour according to CMS 
         


If you want to change the Default configuration of the plugin then follow following step:
===
        1) Click on Basic Configuration Menu
        2) Click on the Additional Setting
        3) Click on pluginName(In my case swagTestWidget)
        4) you will see new dailog box where you can change the setting of this plugin .


