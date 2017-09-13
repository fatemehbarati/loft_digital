# loft_digital
This is a repository for recording steps of Loft Digital coding project. The goal of this project is to sort unorder delivery notes. 

A delivery note is a document accompanying a shipment of goods that lists the description, and
quantity of the goods delivered. A copy of the delivery note, signed by the buyer or consignee, is
returned to the seller or consignor as a proof of delivery.

## Files map
```
|--src
    |--Classes
        |--DeliveryCompanyClass.php
        |--DeliveryNoteClass.php
        |--LocationClass.php
        |--TransportationTypeClass.php
    |--Test
        |--index.php
    |--Utils
        |--App
            |--ConstClass.php
            |--DeliveryNotesSortClass.php
            |--Message.php
            |--OutputClass.php
        |--Interfaces
            |--OutputInterface.php
            |--SortInterface.php
    |--composer.json
```

## Installation
To use these codes, you can just get `src` folder and extends its classes.

## Usage
You can send yor delivery notes as an array which has to have below structure:

<pre>
    array( 
        array(
            <b>'transportationType'</b> => 'Flight',
            <b>'source'</b> => array(
                <b>'countryName'</b> => 'Brazil',
                <b>'placeName'</b> => 'São Paulo–Guarulhos International Airport'
            ),
            <b>'destination'</b> => array(
                <b>'countryName'</b> => 'Portugal',
                <b>'placeName'</b> => 'Porto International Airport'
            ),
            <b>'deliveryCompany'</b> =>'LATAM'
        ),
        array(
            <b>'transportationType'</b> => 'Truck',
            <b>'source'</b> => array(
                <b>'countryName'</b> => 'Brazil',
                <b>'placeName'</b> => 'Fazenda São Francisco Citros'
            ),
            <b>'destination'</b> => array(
                <b>'countryName'</b> => 'Brazil',
                <b>'placeName'</b> => 'São Paulo–Guarulhos International Airport'
            ),
            <b>'deliveryCompany'</b> =>'Correios'
        ),
    )
</pre>

After that, you have to rearrange the array of arrays into the 'array of DeliveryNoteClass' Objects.
Then you can call `DeliveryNoteClass::sort` and pass the proper parameter in order to sort that.
Finally, you can call `OutputClass::manageOutput` with above result, and get an output string as below:

```

Truck from Fazenda São Francisco Citros, Brazil to São Paulo–Guarulhos International Airport, Brazil. With delivery company Correios
Flight from São Paulo–Guarulhos International Airport, Brazil to Porto International Airport, Portugal. With delivery company LATAM
Van from Porto International Airport, Portugal to Adolfo Suárez Madrid–Barajas Airport, Spain. With delivery company AnyVan
Flight from Adolfo Suárez Madrid–Barajas Airport, Spain to London Heathrow, UK. With delivery company DHL
Van from London Heathrow, UK to our final final destination, Loft Digital, London, UK. With delivery company City Sprint

```

In addition to what is mentioned above, you can write your sorting method just by implementing `SortInterface`. Also you can
manage the output in your required format just by implementing `outputInterface` and override manageOutput method.

Moreover, there is an `index.php` file programmed to run with an example which returns an output. 