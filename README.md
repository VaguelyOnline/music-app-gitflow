# To configure HTTPS using Letsencrypt certificate authority (CA):

## Connect to your EC2 instance
1. Select EC2 service in your AWS service explorer
2. Click the instance you wish to connect to (there is probably only one) 
3. Click **Connect** in the menu

## Install Certbot

1. Allow Linux to install from the extended package repo (where Certbot is found)

`# sudo amazon-linux-extras install epel`

2. Install certbot using the *yum* package manager

`# sudo yum install python2-certbot-nginx`


## Get a HTTPS certificate
1. Ensure that your domain (e.g., example.com) resolves to your AWS environment
* Just load example.com in your browser - does it access your site?
2. Execute:

`# certbot --nginx -d example.com`

3. Follow the steps in the wizard

## Enable HTTPS traffic to reach your EC2 Instance

1. Select EC2 service in your AWS service explorer
2. Click the instance you wish to connect to (there is probably only one)
3. Scroll down, and select the **Security** tab
4. Click on the link in the **Security groups**
5. Under **Inbound rules**, click **Edit inbound rules**
6. Add a rule for:
- Type = HTTPS (protocol & port will default to TCP / 443 - the well-known HTTP port)
- Source = 'Anywhere IPv4
7. Click **Save**

## Test!
Your website should now be available at: *https://example.com*

## Next application deployment?
Certbot has overwritten the webserver (likely nginx) configuration file (/etc/nginx/nginx.conf) so that the web server knows the location of your HTTPS certificate files. However, on the next deployment of your application, your application bundles' *.platform/nginx/nginx.conf* file will overwrite the changes made by Certbot. To ensure that your app continues to serve traffic on HTTPS, update your nginx.conf file as per the example in this project. The changes are summarized below - but be sure to check the example nginx.conf file to check where to add them.

*Of course, your-domain-here.com would need to be changed to your domain - E.g., example.com.*

    # The following changes are needed to ensure the application continues to serve on HTTPS
    server_name your-domain-here.com;

    listen 443 ssl;
    ssl_certificate /etc/letsencrypt/live/your-domain-here.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/your-domain-here.com/privkey.pem;
    include /etc/letsencrypt/options-ssl-nginx.conf;
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;