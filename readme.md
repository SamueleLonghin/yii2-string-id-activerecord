
### Global Component

Per far configurare la lunghezza degli id in modo globale è necessario aggiungere il componente all'applicazione 

```php
// ...
'components' => [
    // altri componenti...

    'stringIdActiveRecord' => [
        'class' => samuelelonghin\db\assets\StringIdActiveRecord,
        'stringIdLenght' => function () {
                return 15;
        }
    ]
]
```



o in maniera statica:


```php
// ...
'components' => [
    // altri componenti...

    'stringIdActiveRecord' => [
        'class' => samuelelonghin\db\assets\StringIdActiveRecord,
        'stringIdLenght' =>  15,
    ]
]
```