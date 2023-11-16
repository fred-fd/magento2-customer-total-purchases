
## Freddev Customer Total Purchases Info

**Customer Total Purchases** for Magento 2 show in checkout success page and success order email template, the total amount of purchases in the store by email customer

## Highlight Features

- Customers can see total amount purchases on success page

- customer estimated your site purchases.

## How to use Customer Total Purchases extension
Before you continue, ensure you meet the following requirements:

  * You have installed magento2
  
### Install Customer Total Purchases extension:

### Step 1 : Download Freddev Customer Total Purchases Extension

#### Install via app/code 
Extract the extension from freddev_customertotalpurchases.tar.gz

Create Dir vendor Freddev in app/code/

Put the CustomerTotalPurchases in Freddev directory, and run the next commands:
```
php bin/magento module:enable Freddev_CustomerTotalPurchases
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:clean
```

### Step 2: User guide
  #### Key features of Magento 2 Infinite scroll Extension:
  * Enable and disable the feature from store > configuration
  * Insert the {{var TotalPurchasesAmount|raw}} in the custom email order template from magento admin too.

  ### 2.1. General configuration

  `Login to Magento admin > Stores > Configuration > FREDDEV EXTENSIONS > Customer Total Purchases > General > Choose Yes to enable the module.`
  
  